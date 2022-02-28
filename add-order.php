
<?php
    session_start();

?>
    
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
          <h1>Add Order</h1>
          <br />
          <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Order NO:</td>
                      <td><input type="number" name="o_no" placeholder="Enter Order NO" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Customer ID:</td>
                      <td><input type="number" name="cust_id" placeholder="Enter Customer ID" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Customer name:</td>
                      <td><input type="text" name="cust_name" placeholder="Enter Customer name" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Phone No:</td>
                      <td><input type="tel" name="phno" placeholder="Enter Phone No" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Item name:</td>
                      <td><input type="text" name="i_name" placeholder="Enter name" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Item no:</td>
                      <td><input type="number" name="i_no" placeholder="Enter Item no " style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Quantity</td>
                      <td><input type="number" name="qty" placeholder="Enter  Quantity" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Emp ID</td>
                      <td><input type="number" name="e_no" placeholder="Enter Employee no " style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Subtotal</td>
                      <td><input type="number" name="sub" placeholder="Enter subtotal" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Taxes</td>
                      <td><input type="number" name="tax" placeholder="Enter tax" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Total</td>
                      <td><input type="number" name="tot" placeholder="Enter Total" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Date</td>
                      <td><input type="date" name="dt" placeholder="Enter date " style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                  <tr>
                      <td>Time</td>
                      <td><input type="time" name="tm" placeholder="Enter time" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Add Branch" class="btn-up" style="height:40px;width:280px;font-size:18pt">
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
            $item_no = $_POST['i_no'];
            $qty = $_POST['qty'];
            $subtot = $_POST['sub'];
            $tot = $_POST['tot'];
            $date = $_POST['dt'];
            $time = $_POST['tm'];
            $emp_no = $_POST['e_no'];
            $tax = $_POST['tax'];

            $sql1="INSERT INTO orders SET
                    Order_no='$order_no',
                    Item_name='$item_name',
                    Qty='$qty'
                    ";
            $sql2="INSERT INTO customer SET
                   Cust_id='$cust_no',
                   Cust_name='$cust_name',
                   Phone_no='$phno'
                   ";
            $sql3="INSERT INTO just_item_emp_order SET
                   Cust_id='$cust_no',
                   Item_no='$item_no',
                   Emp_id='$emp_no',
                   Order_no='$order_no',
                   Subtotal='$subtot',
                   Taxes='$tax',
                   Total='$tot',
                   Date ='$date',
                   Time='$time'
                   ";

            
            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            if($res1 == TRUE)
            {
                $_SESSION['add'] = "Order added successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/order.php');

            }

            else
            {
                $_SESSION['add'] = "Failed to add Order";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/add-order.php');

            }
            
        }
    ?>

