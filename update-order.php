<?php
    session_start();

?>

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
          <h1>Update Order</h1>
          <br />
          <?php
          $o_no=$_GET['Order_no'];
          $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
          $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
          $sql = "SELECT orders.Order_no,just_item_emp_order.Cust_id,Customer.Cust_name,Customer.Phone_no,
          orders.Item_name,orders.Qty,just_item_emp_order.Subtotal,just_item_emp_order.Taxes,just_item_emp_order.Total,
          just_item_emp_order.Date,just_item_emp_order.Time FROM customer,just_item_emp_order,orders WHERE 
          customer.Cust_id=just_item_emp_order.Cust_id AND orders.Order_no=just_item_emp_order.Order_no";
           $res = mysqli_query($conn,$sql);
           if($res==TRUE )
           {
               $count = mysqli_num_rows($res);
               if($count == 1)
               {
                $rows = mysqli_fetch_assoc($res);
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

               }
               else{
                   header('location:'.SITEURL.'Admin/order.php');
               }
           }
          ?>



<form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Order NO:</td>
                      <td><input type="number" name="o_no" value="<?php echo $o_no;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Customer ID:</td>
                      <td><input type="number" name="cust_id" value="<?php echo $c_id;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Customer name:</td>
                      <td><input type="text" name="cust_name" value="<?php echo $c_name;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Phone No:</td>
                      <td><input type="tel" name="phno" value="<?php echo $phno;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Item name:</td>
                      <td><input type="text" name="i_name" value="<?php echo $i_name;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Quantity</td>
                      <td><input type="number" name="qty" value="<?php echo $qty;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Subtotal</td>
                      <td><input type="number" name="sub" value="<?php echo $stot;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Taxes</td>
                      <td><input type="number" name="tax" value="<?php echo $tax;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Total</td>
                      <td><input type="number" name="tot" value="<?php echo $tot;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Date</td>
                      <td><input type="date" name="dt" value="<?php echo $dt;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                  <tr>
                      <td>Time</td>
                      <td><input type="time" name="tm" value="<?php echo $tm;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Update Order" class="btn-up" style="height:40px;width:280px;font-size:18pt">
                      </td>
                  </tr>
              </table>
          </form>
      </div>
    </section>
    <?php
       
       if(isset($_POST['submit']))
        {
            $order_no = $_POST['o_no'];
            $cust_no = $_POST['cust_id'];
            $cust_name = $_POST['cust_name'];
            $phno = $_POST['phno'];
            $item_name = $_POST['i_name'];
            $qty = $_POST['qty'];
            $subtot = $_POST['sub'];
            $tot = $_POST['tot'];
            $date = $_POST['dt'];
            $time = $_POST['tm'];
            $tax = $_POST['tax'];

            $sql1="UPDATE orders SET
                    Item_name='$item_name',
                    Qty='$qty'
                   WHERE Order_no='$order_no'
                    ";
            $sql2="UPDATE customer SET
                   Cust_name='$cust_name',
                   Phone_no='$phno'
                   WHERE Cust_id='$cust_no'
                   ";
            $sql3="UPDATE just_item_emp_order SET
                   Subtotal='$subtot',
                   Taxes='$tax',
                   Total='$tot',
                   Date ='$date',
                   Time='$time'
                   WHERE Cust_id='$cust_no' AND
                   Item_no='$item_no'AND
                   Emp_id='$emp_no' AND
                   Order_no='$order_no'
                   ";

            
            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            if($res1 == TRUE )
            {
                $_SESSION['update'] = "Order updated successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/order.php');

            }

            else
            {
                $_SESSION['update'] = "Failed to update Order";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/update-order.php');

            }
            
        }
    ?>

