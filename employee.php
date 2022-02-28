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
          <h1>Manage Employees</h1>
          <br /><br />
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

          <a href="add-emp.php" class="btn-branches">Add Employee</a>
          <br /><br /><br />
          <table class="tbl-prop">
              <tr>
                  <th>Emp ID</th>
                  <th>Br ID</th>
                  <th>Emp name</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>E-mail</th>
                  <th>Position</th>
                  <th>Actions</th>
                
              </tr>
              <?php
               $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
               $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
              $sql1 = "SELECT Emp_id,Br_id,Emp_name,Phone_no,Address,E_mail,Position FROM employee";
              $res = mysqli_query($conn,$sql1);
              if($res ==TRUE)
              {
                  $count = mysqli_num_rows($res);
                  if($count > 0)
                  {
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $emp_id = $rows['Emp_id'];
                          $br_id = $rows['Br_id'];
                          $emp_name = $rows['Emp_name'];
                          $pno =$rows['Phone_no'];
                          $address = $rows['Address'];
                          $mail =$rows['E_mail'];
                          $pos =$rows['Position'];
                          ?>
              <tr>
                  <td><?php echo $emp_id;?></td>
                  <td><?php echo $br_id;?></td>
                  <td><?php echo $emp_name;?></td>
                  <td><?php echo $pno;?></td>
                  <td><?php echo $address;?></td>
                  <td><?php echo $mail;?></td>
                  <td><?php echo $pos;?></td>
                  <td>
                      <a href="<?php echo SITEURL;?>Admin/update-emp.php?Emp_id=<?php echo $emp_id;?>" class="btn-up">Update Employee</a>
                      <a href="<?php echo SITEURL;?>Admin/delete-emp.php?Emp_id=<?php echo $emp_id;?>" class="btn-del">Delete Employee</a>
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