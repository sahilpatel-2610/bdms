
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
<div id="header" >
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active="pages";
 include 'sidebar.php'; ?>

</div>
<div id="content" >
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Manage Page Data</h1>

        </div>

      </div>
      <hr>
      <?php
      $count=1;
        $sql= "select * from pages ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)   {
       ?>

       <div class="table-responsive">
      <table class="table table-bordered" style="text-align:center">
          <thead style="text-align:center">
          <th style="text-align:center">S.no</th>
          <th style="text-align:center">Page Name</th>
          <th style="text-align:center">Page Type</th>
          <th style="text-align:center">Page Data</th>
          <th style="text-align:center">Edit Page</th>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td ><?php echo  $count++; ?></td>
                  <td ><?php echo $row['page_name']; ?></td>
                  <td ><?php echo $row['page_type']; ?></td>
                  <td id="example" style="text-align:left"><div style="width:100%; max-height:110px; overflow:auto"><?php echo $row['page_data']; ?></div></td>
                    <td id="he" style="width:100px;">
                    <a style="background-color:aqua" href='update_page_details.php?page_id=<?php echo $row['page_id'];?>'> <span class="glyphicon glyphicon-edit"></span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
    <?php }} ?>

    
 
  </div>
</div>

</body>
</html>
