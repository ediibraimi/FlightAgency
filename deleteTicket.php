<?php 
include_once('config.php');

$id = $_GET['id'];
$sql = "DELETE FROM ticket_orders WHERE id=:id";
$prep = $conn->prepare($sql);
$prep->bindParam(':id', $id);
$prep->execute();

header("Location: tickets.php");
?>