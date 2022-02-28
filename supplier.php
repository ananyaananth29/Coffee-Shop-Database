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
          <h1>Manage Suppliers</h1>
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
          <a href="add-supplier.php" class="btn-branches">Add Supplier</a>
          <br /><br /><br />
          <table class="tbl-prop">
              <tr>
                  <th>Sup Id</th>
                  <th>Sup Name</th>
                  <th>Sup Item</th>
                  <th>Phone No.</th>
                  <th>Actions</th>
                
              </tr>
              <?php
               $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
               $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
              $sql1 = "SELECT supplier.Sup_id,supplier.Sup_name,supplier_item.Sup_item,supplier.Phone_no FROM supplier,supplier_item WHERE
              supplier.Sup_id=supplier_item.Sup_id";
              $res = mysqli_query($conn,$sql1);
              if($res ==TRUE)
              {
                  $count = mysqli_num_rows($res);
                  if($count > 0)
                  {
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $s_id = $rows['Sup_id'];
                          $s_name = $rows['Sup_name'];
                          $s_item = $rows['Sup_item'];
                          $pno =$rows['Phone_no'];
                         
                          ?>
              <tr>
                  <td><?php echo $s_id;?></td>
                  <td><?php echo $s_name;?></td>
                  <td><?php echo $s_item;?></td>
                  <td><?php echo $pno;?></td>
                  <td>
                      <a href="<?php echo SITEURL;?>Admin/update-supplier.php?Sup_id=<?php echo $s_id;?>" class="btn-up">Update Supplier</a>
                      <a href="<?php echo SITEURL;?>Admin/delete-supplier.php?Sup_id=<?php echo $s_id;?>" class="btn-del">Delete Supplier</a>
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