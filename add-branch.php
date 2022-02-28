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
          <h1>Add Branch</h1>
          <br />
          <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Branch ID:</td>
                      <td><input type="number" name="br_id" placeholder="Enter Branch ID" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Branch Name</td>
                      <td><input type="text" name="br_name" placeholder="Enter Branch Name" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Location</td>
                      <td><input type="text" name="br_loc" placeholder="Enter Branch Location" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Manager ID:</td>
                      <td><input type="number" name="mgr_id" placeholder="Enter Manager ID" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                   <tr>
                      <td>Phone No:</td>
                      <td><input type="tel" name="br_phone" placeholder="Enter Phone No" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Facilities:</td>
                      <td><input type="text" name="br_fac" placeholder="Enter Facility" style="height:40px;width:280px;font-size:18pt"></td>
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
            $br_id = $_POST['br_id'];
            $br_name = $_POST['br_name'];
            $br_loc = $_POST['br_loc'];
            $mgr_id = $_POST['mgr_id'];
            $br_phone = $_POST['br_phone'];
            $br_fac = $_POST['br_fac'];


            $sql="INSERT INTO branches SET
                    Br_id='$br_id',
                    Br_name='$br_name',
                    Loc='$br_loc',
                    Mgr_id='$mgr_id'  
                    ";

            $sql2 = "INSERT INTO branch_phone SET
                    Br_id = '$br_id',
                    Phone_no = '$br_phone' 
            
                    ";        

            $sql3 = "INSERT INTO branch_facilities SET
                        Br_id = '$br_id',
                        Facilities = '$br_fac'
            
                        ";

            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));

            if($res == TRUE)
            {
                $_SESSION['add'] = "Branch added successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/branchesad.php');

            }

            else
            {
                $_SESSION['add'] = "Failed to add branch";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/add-branch.php');

            }
            
        }
    ?>

