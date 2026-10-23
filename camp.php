<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>


<?php 
$active ='camp';
include('head.php');
?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">
<div class="row">
    <div class="col-lg-12">
        <h1 class="mt-4 mb-3">Join Camp </h1>
        <p class="text-danger">contact organized using mobile no.</p>
        <div class="row">
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
          <th style="text-align:center">Join </th>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['camp_name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><a href="tel:<?php echo $row['contact']; ?>"><?php echo $row['contact']; ?></a></td>
                  <td><?php echo $row['conductedby']; ?></td>
                  <td><?php echo $row['organizedby']; ?></td>
                  <td><?php echo $row['time']; ?></td>
                  <td><a href="camp_enroll.php?id=<?php echo $row['camp_id']?>&name=<?php echo $row['camp_name'];?>">Enroll Now</a></td>
                  
                    
                </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
        <?php } ?>
         </div>
            

    </div>
    
</div>
</div>

</div>

<?php include('footer.php')
?>
</div>
</body>

</html>
