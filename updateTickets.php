<?php 

	include_once('config.php');

	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$from = $_POST['from_location'];
		$to = $_POST['to_location'];
		$depurture = $_POST['departure_date'];
        $return = $_POST['return_date'];
		$trip = $_POST['trip_type'];


		$sql = "UPDATE ticket_orders SET id=:id, from_location=:from_location, to_location=:to_location, departure_date=:departure_date, return_date=:return_date, trip_type=:trip_type WHERE id=:id";

		$prep = $conn->prepare($sql);
		$prep->bindParam(':id',$id);
		$prep->bindParam(':from_location',$from);
		$prep->bindParam(':to_location',$to);
		$prep->bindParam(':departure_date',$depurture);
        $prep->bindParam(':return_date',$return);
		$prep->bindParam(':trip_type',$trip);

		$prep->execute();
		header("Location: tickets.php");
	}
 ?>