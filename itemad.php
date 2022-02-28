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
          <h1>Manage Items</h1>
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
          <a href="add-item.php" class="btn-branches">Add Item</a>
          <br /><br /><br />
          

          <table class="tbl-prop">
              <tr>
                  <th>Item No.</th>
                  <th>Item name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Actions</th>
              </tr>
              <?php
               $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
               $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
              $sql1 = "SELECT * FROM items";
              $res = mysqli_query($conn,$sql1);
              if($res ==TRUE)
              {
                  $count = mysqli_num_rows($res);
                  if($count > 0)
                  {
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $i_no = $rows['Item_no'];
                          $i_name = $rows['Item_name'];
                          $qty = $rows['Qty'];
                          $price =$rows['Price'];
                         
                          ?>
              <tr>
                  <td><?php echo $i_no;?></td>
                  <td><?php echo $i_name;?></td>
                  <td><?php echo $qty;?></td>
                  <td><?php echo $price;?></td>
                  <td>
                      <a href="<?php echo SITEURL;?>Admin/update-item.php?Item_no=<?php echo $i_no;?>" class="btn-up">Update Item</a>
                      <a href="<?php echo SITEURL;?>Admin/delete-item.php?Item_no=<?php echo $i_no;?>" class="btn-del">Delete Item</a>
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