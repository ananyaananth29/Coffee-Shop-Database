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
          <h1>Manage Orders</h1>
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
          <a href="add-order.php" class="btn-branches">Add Order</a>
          <br /><br /><br />
          <table class="tbl-prop">
              <tr>
                  <th>Order no</th>
                  <th>Cust id</th>
                  <th>Cust name</th>
                  <th>Phone no</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                  <th>Taxes</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Action</th>
                
              </tr>
              <?php
               $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
               $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
              $sql1 = "SELECT orders.Order_no,just_item_emp_order.Cust_id,Customer.Cust_name,Customer.Phone_no,
              orders.Item_name,orders.Qty,just_item_emp_order.Subtotal,just_item_emp_order.Taxes,just_item_emp_order.Total,
              just_item_emp_order.Date,just_item_emp_order.Time FROM customer,just_item_emp_order,orders WHERE 
              customer.Cust_id=just_item_emp_order.Cust_id AND orders.Order_no=just_item_emp_order.Order_no";
              $res = mysqli_query($conn,$sql1);
              if($res ==TRUE)
              {
                  $count = mysqli_num_rows($res);
                  if($count > 0)
                  {
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $o_no = $rows['Order_no'];
                          $c_id = $rows['Cust_id'];
                          $c_name = $rows['Cust_name'];
                          $phno =$rows['Phone_no'];
                          $i_name = $rows['Item_name'];
                          $qty =$rows['Qty'];
                          $stot =$rows['Subtotal'];
                          $tax =$rows['Taxes'];
                          $tot =$rows['Total'];
                          $dt =$rows['Date'];
                          $tm =$rows['Time'];
                          ?>
              <tr>
                  <td><?php echo $o_no;?></td>
                  <td><?php echo $c_id;?></td>
                  <td><?php echo $c_name;?></td>
                  <td><?php echo $phno;?></td>
                  <td><?php echo $i_name;?></td>
                  <td><?php echo $qty;?></td>
                  <td><?php echo $stot;?></td>
                  <td><?php echo $tax;?></td>
                  <td><?php echo $tot;?></td>
                  <td><?php echo $dt;?></td>
                  <td><?php echo $tm;?></td>
                  <td>
                      <a href="<?php echo SITEURL;?>Admin/update-order.php?Order_no=<?php echo $o_no;?>" class="btn-up">Update Order</a>
                      <a href="<?php echo SITEURL;?>Admin/delete-order.php?Order_no=<?php echo $o_no;?>" class="btn-del">Delete Order</a>
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