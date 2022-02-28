
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
          <h1>Add Supplier</h1>
          <br />
          <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Sup no</td>
                      <td><input type="number" name="s_no" placeholder="Enter Sup ID" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Sup Name:</td>
                      <td><input type="text" name="s_name" placeholder="Enter Sup Name" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Sup item</td>
                      <td><input type="text" name="s_item" placeholder="Enter Supplier Item" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Branch ID</td>
                      <td><input type="number" name="br_id" placeholder="Enter Br id" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Item no</td>
                      <td><input type="number" name="i_no" placeholder="Enter Item no" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Phone no</td>
                      <td><input type="tel" name="pno" placeholder="Enter Pno" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Add Supplier" class="btn-up" style="height:40px;width:280px;font-size:18pt">
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
            $br_id = $_POST['br_id'];
            $item_no = $_POST['i_no'];
            $pno = $_POST['pno'];
            


            $sql1="INSERT INTO supplier SET
                    Sup_id='$sup_no',
                    Sup_name='$sup_name',
                    Phone_no='$pno'
                    ";
            $sql2="INSERT INTO supplier_item SET
                    Sup_id='$sup_no',
                    Sup_item='$sup_item'
                    ";
            $sql3 ="INSERT INTO sup_branch_item SET
                    Sup_id='$sup_no',
                    Br_id='$br_id',
                    Item_no='$item_no'
                    ";

            
            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            if($res1 == TRUE)
            {
                $_SESSION['add'] = "Supplier added successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/supplier.php');

            }

            else
            {
                $_SESSION['add'] = "Failed to add Supplier";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/add-supplier.php');

            }
            
            
        }
    ?>

