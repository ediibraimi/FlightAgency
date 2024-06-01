<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['phone_number'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $number = $_POST['phone_number'];
 
        $sql = "INSERT INTO contact_messages (name, email, message,phone_number) VALUES (:name,:email, :message ,:phone_number)";

        $insertQuery = $conn->prepare($sql);

        $insertQuery->bindParam( "name",$name);
        $insertQuery->bindParam( "email",$email);
        $insertQuery->bindParam( "message",$message);
        $insertQuery->bindParam("phone_number", $number);


        if ($insertQuery->execute() === TRUE) {
            echo "Your message has been sent successfully. We will get back to you soon!";
            header("Location: index.php"); 
            exit(); 
        } else {
            echo "Oops! Something went wrong and we couldn't get your message.";
        }

        
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Form not submitted!";
}
?>
