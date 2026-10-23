
<?php
$camp_name=$_POST['camp_name'];
$date=$_POST['date'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$conductedby=$_POST['conductedby'];
$organizedby=$_POST['organizedby'];
$time=$_POST['time'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "INSERT INTO `camp`(`camp_id`, `date`, `camp_name`, `address`, `contact`, `conductedby`, `organizedby`, `time`)
 VALUES ('$id','$date','$camp_name','$address','$contact','$conductedby','$organizedby','$time')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
header("Location: http://localhost/BDMS/admin/add_camp.php");

mysqli_close($conn);
 ?>
