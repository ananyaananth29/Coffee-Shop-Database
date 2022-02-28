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
          <h1>Update Item</h1>
          <br />
          <?php
          $i_no=$_GET['Item_no'];
          $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
          $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
          $sql = "SELECT * FROM items";
           $res = mysqli_query($conn,$sql);
           if($res==TRUE )
           {
               $count = mysqli_num_rows($res);
               if($count == 1)
               {
                $rows = mysqli_fetch_assoc($res);
                $i_no = $rows['Item_no'];
                $i_name = $rows['Item_name'];
                $qty = $rows['Qty'];
                $price =$rows['Price'];

               }
               else{
                   header('location:'.SITEURL.'Admin/itemad.php');
               }
           }
          ?>



            <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Item no</td>
                      <td><input type="number" name="i_no" value="<?php echo $i_no;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Item Name:</td>
                      <td><input type="text" name="i_name" value="<?php echo $i_name;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Quantity</td>
                      <td><input type="number" name="qty" value="<?php echo $qty;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Price</td>
                      <td><input type="text" name="price" value="<?php echo $price;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Update Item" class="btn-up" style="height:40px;width:280px;font-size:18pt">
                      </td>
                  </tr>
              </table>
          </form>     
      </div>
    </section>
    <?php
       
       if(isset($_POST['submit']))
        {
            $item_no = $_POST['i_no'];
            $item_name = $_POST['i_name'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            


            $sql1="UPDATE items SET
                    Item_name='$item_name',
                    Qty='$qty',
                    Price = '$price'
                    WHERE Item_no='$item_no'
                    ";

            
            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            if($res1 == TRUE)
            {
                $_SESSION['update'] = "Item updated successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/itemad.php');

            }

            else
            {
                $_SESSION['update'] = "Failed to add Item";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/update-item.php');

            }
            

            
        }
    ?>

