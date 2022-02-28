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
          <h1>Update Branch</h1>
          <br />
          <?php
          $br_id=$_GET['Br_id'];
          $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
          $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
          $sql = "SELECT branches.Br_id,branches.Br_name,branches.Loc,branches.Mgr_id,branch_phone.Phone_no,branch_facilities.Facilities
           FROM branches,branch_phone,branch_facilities WHERE branches.Br_id = branch_phone.Br_id and  branches.Br_id=branch_facilities.Br_id";
           $res = mysqli_query($conn,$sql);
           if($res==TRUE )
           {
               $count = mysqli_num_rows($res);
               if($count == 1)
               {
                   $row = mysqli_fetch_assoc($res);
                   $br_id = $row['Br_id'];
                   $br_name = $row['Br_name'];
                   $loc = $row['Loc'];
                   $mgr_id = $row['Mgr_id'];
                   $pno = $row['Phone_no'];
                   $fac = $row['Facilities'];

               }
               else{
                   header('location:'.SITEURL.'Admin/branchesad.php');
               }
           }
          ?>



          <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Branch ID:</td>
                      <td><input type="number" name="br_id" value="<?php echo $br_id;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Branch Name</td>
                      <td><input type="text" name="br_name" value="<?php echo $br_name;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Location</td>
                      <td><input type="text" name="br_loc" value="<?php echo $loc;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Manager ID:</td>
                      <td><input type="number" name="mgr_id" value="<?php echo $mgr_id;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                   <tr>
                      <td>Phone No:</td>
                      <td><input type="tel" name="br_phone" value="<?php echo $pno;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Facilities:</td>
                      <td><input type="text" name="br_fac" value="<?php echo $fac;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr> 
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Update Branch" class="btn-up" style="height:40px;width:280px;font-size:18pt">
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


            $sql="UPDATE branches SET
                    Br_name='$br_name',
                    Loc='$br_loc',
                    Mgr_id='$mgr_id' 
                    WHERE Br_id =  '$br_id'
                    ";

            $sql2 = "UPDATE branch_phone SET
                    Phone_no = '$br_phone'
                    WHERE Br_id = '$br_id' 
            
                    ";        

            $sql3 = " UPDATE branch_facilities SET
                        Facilities = '$br_fac'
                        WHERE Br_id = '$br_id'
            
                        ";

            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));

            if($res == TRUE )
            {
                $_SESSION['update'] = "Branch updated successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/branchesad.php');

            }

            else
            {
                $_SESSION['update'] = "Failed to update branch";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/update-branch.php');

            }
            
        }
    ?>

