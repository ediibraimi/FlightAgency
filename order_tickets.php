<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['departure']) && isset($_POST['return']) && isset($_POST['trip'])) {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $departure = $_POST['departure'];
        $return = $_POST['return'];
        $trip = $_POST['trip'];

        $sql = "INSERT INTO ticket_orders (from_location, to_location, departure_date, return_date, trip_type) VALUES (:from, :to, :departure,:return ,:trip)";

        $insertQuery = $conn->prepare($sql);
        $insertQuery->bindParam(":from", $from);
        $insertQuery->bindParam(":to", $to);
        $insertQuery->bindParam(":departure", $departure);
        $insertQuery->bindParam(":return", $return);
        $insertQuery->bindParam(":trip", $trip);


        if ($insertQuery->execute() === TRUE) {
            echo "New record created successfully";
            header("Location:index.php?ordered=1");
        } else {
            echo "Error: " . $sql . "<br>";
        }
    } else {
        echo "All fields are required!";
        header("Location:index.php?ordered=2");
    }
} else {
    echo "Form not submitted!";
    header("Location:index.php?ordered=3");
}
