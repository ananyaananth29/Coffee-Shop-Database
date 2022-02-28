<?php 
    session_start();
    ?>
<html>
<?php include('../config/constants.php');?>
    <head>
        <title>Coffee Shop Website</title>
        <link rel="stylesheet" href="stylead.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet"> 
    </head>

    <body>
    <section class="header">
      <nav>
          <p>Around the Corner Admin Panel</p>
          <div class="nav-links">
                <ul>
                    <li><a href="branchesad.php">BRANCHES</a></li>
                    <li><a href="employee.php">EMPLOYEE</a></li>
                    <li><a href="itemad.php">ITEMS</a></li>
                    <li><a href="supplier.php">SUPPLIER</a></li>
                    <li><a href="order.php">ORDER</a></li>
              </ul>
          </div>
      </nav>
      <div class="cont">
          <h1>Manage Branches</h1>
          <br /><br />
          <br>
          <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
          ?>
          <br><br>
          <a href="add-branch.php" class="btn-branches">Add Branch</a>
          <br /><br /><br />
          <table class="tbl-prop">
              <tr>
                  <th>Branch ID</th>
                  <th>Branch name</th>
                  <th>Location</th>
                  <th>Phone No.</th>
                  <th>Facilities</th>
                  <th>Actions</th>
                
              </tr>
              <?php
               $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
               $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
              $sql1 = "SELECT branches.Br_id,Br_name,Loc,Phone_no,Facilities FROM branches,branch_phone,branch_facilities 
              WHERE branches.Br_id=branch_phone.Br_id AND branches.Br_id=branch_facilities.Br_id";
              $res = mysqli_query($conn,$sql1);
              if($res ==TRUE)
              {
                  $count = mysqli_num_rows($res);
                  if($count > 0)
                  {
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $br_id = $rows['Br_id'];
                          $br_name = $rows['Br_name'];
                          $loc = $rows['Loc'];
                          $pno =$rows['Phone_no'];
                          $fac = $rows['Facilities'];
                          ?>
              <tr>
                  <td><?php echo $br_id;?></td>
                  <td><?php echo $br_name;?></td>
                  <td><?php echo $loc;?></td>
                  <td><?php echo $pno;?></td>
                  <td><?php echo $fac;?></td>
                  <td>
                      <a href="<?php echo SITEURL;?>Admin/update-branch.php?Br_id=<?php echo $br_id;?>" class="btn-up">Update Branch</a>
                      <a href= "<?php echo SITEURL;?>Admin/delete-branch.php?Br_id=<?php echo $br_id;?>"
                       class="btn-del">Delete Branch</a>
                    </td>
              </tr>
                          <?php
                      }
                  }
              }
            ?>

          </table>
      </div> 
    </section>

    </body>
</html>