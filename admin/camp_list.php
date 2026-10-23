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
}
  #he{
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align:center
  }
</style>
</head>
<?php
include 'conn.php';
  include 'session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
<body style="color:black">
<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active="camp_list"; include 'sidebar.php'; ?>

</div>
<div id="content" >
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Camp List</h1>

        </div>

      </div>
      <hr><div class="row">
          <?php
          $count=1;
            include 'conn.php';
            $sql= "SELECT `camp_id`, `date`, `camp_name`, `address`, `contact`, `conductedby`, `organizedby`, `time` FROM `camp` limit 6";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
            
           ?>
          <div class="table-responsive">
      <table class="table table-bordered" style="text-align:center">
          <thead style="text-align:center">
          <th style="text-align:center">S.no</th>
          <th style="text-align:center">Date</th>
          <th style="text-align:center">Camp Name</th>
          <th style="text-align:center">Address</th>
          <th style="text-align:center">Contact</th>
          <th style="text-align:center">Conductedby</th>
          <th style="text-align:center">Organizedby</th>
          <th style="text-align:center">Time</th>
          <th style="text-align:center">Enroll Data</th>
          <th style="text-align:center">Edit</th>
          <th style="text-align:center">Delete</th>
          </thead>
          <tbody>
            <?php
            
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['camp_name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['conductedby']; ?></td>
                    <td><?php echo $row['organizedby']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td id="he" style="width:100px;">
                    <a style="background-color:aqua" href='camp_data.php?id=<?php echo $row['camp_id'];?>'> <span class="glyphicon glyphicon-list-alt"></span></a>
                </td>
                    <td id="he" style="width:100px;">
                    <a style="background-color:aqua" href='update_camp_details.php?id=<?php echo $row['camp_id'];?>'> <span class="glyphicon glyphicon-edit"></span></a>
                </td>
                <td id="he" style="width:100px;">
                    <a style="background-color:aqua" href='delete_camp_details.php?id=<?php echo $row['camp_id'];?>'> delete</a>
                </td>
                    
                </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
        <?php }} ?>
         </div>

      </div>
      </div>
      </div>
    


</body>
</html>
