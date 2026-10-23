

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }

  #area1, #area4{
    width: 70vw;
    min-height: 50vh;
    font-family: tahoma;
  }

  .nicEdit-panel > div > * {
    opacity: 1 !important;
  }


  .nicEdit-buttonContain {
      padding: .5em;
  }
  .nicEdit-panelContain{

  }

  .nicEdit-selectContain{
  margin-top: 8px;
  padding:.5em
  }

   .nicEdit-selectTxt{
       font-family: Tahoma !important;
       font-size: 12px !important;
   }

   .nicEdit-main{
    outline: 0;
  }


}
</style>
</head>

<body style="color:black">

  <?php
  include 'conn.php';
    include 'session.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active =""; 
include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Page Details</div>
            <div class="panel-body">

           <?php include 'conn.php';
 $id=$_GET["id"];

 $sql = "SELECT * FROM `camp` WHERE camp_id='$id'";
 $result = mysqli_query($conn, $sql);  
 if (!$result){ 
    echo "query failed: "; 
   }else{
       $rows = mysqli_num_rows($result); 
 }

 if ($rows) {
    while ($row = mysqli_fetch_array($result)){
 
 ?>

            <form  method="post">
      <div class="row">
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">camp id<span style="color:red">*</span></div>
      <div><input type="text" name="camp_id" class="form-control" value="<?php echo $row['camp_id'] ?>"  readonly></div>
      </div>
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">camp name<span style="color:red">*</span></div>
      <div><input type="text" name="camp_name" class="form-control" value="<?php echo $row['camp_name'] ?>"  required></div>
      </div>
      
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Date<span style="color:red">*</span></div>
      <div><input type="date" name="date" class="form-control" required value="<?php echo $row['date']?>"></div>
      </div>
    
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Address<span style="color:red">*</span></div>
      <div><textarea name="address" id="" cols="2" rows="1" class="form-control"  required><?php echo $row['address'] ?></textarea></div>
      </div>
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
      <div><input type="tel" name="contact"  pattern="[0-9]{10}" class="form-control"  value="<?php echo $row['contact'] ?>" required></div>
      </div>
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">conducted by <span style="color:red">*</span></div>
      <div><input type="text" name="conductedby" class="form-control"  value="<?php echo $row['conductedby'] ?>" required></div>
      </div>

      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">organized by<span style="color:red">*</span></div>
      <div><input type="text" name="organizedby"  class="form-control" value="<?php echo $row['organizedby'] ?>" required></div>
      </div>

      
      </div>

     <br>
          <div class="row">

          <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Time<span style="color:red">*</span></div>
      <div><input type="time" name="time"  class="form-control" value="<?php echo $row['time'] ?>" required></div>
      </div>
      <br>
        <div class="col-lg-4 mb-4">
        <div><button class="btn btn-primary" name="submit" type="submit">Update</button></div>
        </div>
      </div>
    
    

    </form>
<?php } }?>
    </div>
    </div>
    </div>

    </div>



    <?php if(isset($_POST['submit']))
    {
        $camp_id=$_POST['camp_id'];
        $camp_name=$_POST['camp_name'];
        $date=$_POST['date'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $conductedby=$_POST['conductedby'];
        $organizedby=$_POST['organizedby'];
        $time=$_POST['time'];
      $conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
      $sql= "UPDATE `camp` SET `camp_id`='$id',`date`='$date',`camp_name`='$camp_name',`address`='$address',`contact`='$contact',`conductedby`='$conductedby',`organizedby`='$organizedby',`time`='$time' WHERE camp_id='$camp_id'";
      $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
    echo '<div class="alert alert-success"><b>Page Data Updated Successfully.</b></div>';
    }

    ?>

            </div>
          </div>
        </div>
  <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
     ?>
     <form method="post" name="" action="login.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>

</body>
</html>
