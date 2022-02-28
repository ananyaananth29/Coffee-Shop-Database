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
          <h1>Update Supplier</h1>
          <br />
          <?php
          $s_id=$_GET['Sup_id'];
          $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
          $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
          $sql = "SELECT supplier.Sup_id,supplier.Sup_name,supplier_item.Sup_item,supplier.Phone_no FROM supplier,supplier_item WHERE
          supplier.Sup_id=supplier_item.Sup_id";
           $res = mysqli_query($conn,$sql);
           if($res==TRUE )
           {
               $count = mysqli_num_rows($res);
               if($count == 1)
               {
                   $rows = mysqli_fetch_assoc($res);
                   $s_id = $rows['Sup_id'];
                   $s_name = $rows['Sup_name'];
                   $s_item = $rows['Sup_item'];
                   $pno =$rows['Phone_no'];

               }
               else{
                   header('location:'.SITEURL.'Admin/supplier.php');
               }
           }
          ?>



            <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Sup no</td>
                      <td><input type="number" name="s_no" value="<?php echo $s_id;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Sup Name:</td>
                      <td><input type="text" name="s_name" value="<?php echo $s_name;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Sup item</td>
                      <td><input type="text" name="s_item" value="<?php echo $s_item;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Phone no</td>
                      <td><input type="tel" name="pno" value="<?php echo $pno;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Update Supplier" class="btn-up" style="height:40px;width:280px;font-size:18pt">
                      </td>
                  </tr>
              </table>
          </form>
      </div>
    </section>
    <?php
       
       if(isset($_POST['submit']))
       {
           $sup_no = $_POST['s_no'];
           $sup_name = $_POST['s_name'];
           $sup_item = $_POST['s_item'];
           $pno = $_POST['pno'];
           


           $sql1="UPDATE supplier SET
                   Sup_name='$sup_name',
                   Phone_no='$pno'
                   WHERE Sup_id='$sup_no'
                   ";
           $sql2="UPDATE supplier_item SET
                   Sup_item='$sup_item'
                   WHERE Sup_id='$sup_no'
                   ";

           
           $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
           $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
           $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
           $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
           if($res1 == TRUE || $res2 == TRUE)
           {
               $_SESSION['update'] = "Supplier updated successfully";
               header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/supplier.php');

           }

           else
           {
               $_SESSION['update'] = "Failed to update Supplier";
               header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/update-supplier.php');

            }
        }
    ?>

