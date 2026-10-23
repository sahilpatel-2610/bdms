<?php
include 'conn.php';

$id = $_GET['id'];
$sql= "DELETE FROM camp where camp_id='$id'";
$result=mysqli_query($conn,$sql);
mysqli_close($conn);


header("Location: camp_list.php");

?>
