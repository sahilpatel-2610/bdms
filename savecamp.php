<?php

// echo $_GET['campid'];
$campname=$_POST['campname'];
$campid=$_POST['campid'];
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$address=$_POST['address'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "INSERT INTO camp_enroll(enroll_camp_name,enroll_name,enroll_number,enroll_email,enroll_age,enroll_gender,enroll_blood,enroll_address,camp_id) values('{$campname}','{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}','{$campid}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");

header("Location: http://localhost/BDMS/camp.php");

mysqli_close($conn);
 ?>
