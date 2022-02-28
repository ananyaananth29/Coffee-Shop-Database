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
          <h1>Update Employee</h1>
          <br />
          <?php
          $emp_id=$_GET['Emp_id'];
          $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
          $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
          $sql = "SELECT Emp_id,Br_id,Emp_name,Phone_no,Address,E_mail,Position FROM employee ";
           $res = mysqli_query($conn,$sql);
           if($res==TRUE )
           {
               $count = mysqli_num_rows($res);
               if($count == 1)
               {
                $row = mysqli_fetch_assoc($res);
                $emp_id = $row['Emp_id'];
                $br_id = $row['Br_id'];
                $emp_name = $row['Emp_name'];
                $pno =$row['Phone_no'];
                $address = $row['Address'];
                $mail =$row['E_mail'];
                $pos =$row['Position'];

               }
               else{
                   header('location:'.SITEURL.'Admin/employee.php');
               }
           }
          ?>



            <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Employee ID:</td>
                      <td><input type="number" name="emp_id" value="<?php echo $emp_id;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Employee Name:</td>
                      <td><input type="text" name="emp_name" value="<?php echo $emp_name;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Phone No:</td>
                      <td><input type="tel" name="emp_ph" value="<?php echo $pno;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Address:</td>
                      <td><input type="text" name="add" value="<?php echo $address;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>E-mail:</td>
                      <td><input type="email" name="e_mail" value="<?php echo $mail;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Position:</td>
                      <td><input type="text" name="pos" value="<?php echo $pos;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Branch ID:</td>
                      <td><input type="number" name="br_id" value="<?php echo $br_id;?>" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                          <input type="submit" name="submit" value="Update Employee" class="btn-up" style="height:40px;width:280px;font-size:18pt">
                      </td>
                  </tr>
              </table>
          </form>
      </div>
    </section>
    <?php
       
        if(isset($_POST['submit']))
        {
            $emp_id = $_POST['emp_id'];
            $emp_name = $_POST['emp_name'];
            $emp_ph = $_POST['emp_ph'];
            $add = $_POST['add'];
            $e_mail = $_POST['e_mail'];
            $pos = $_POST['pos'];
            $bran_id = $_POST['br_id'];


            $sql1="UPDATE  employee SET
                    Emp_name='$emp_name',
                    Phone_no='$emp_ph',
                    Address ='$add',
                    E_mail = '$e_mail',
                    Position = '$pos',
                    Br_id = '$bran_id' WHERE Emp_id='$emp_id'
                    ";

            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

            if($res1 == TRUE)
            {
                $_SESSION['update'] = "Employee updated successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/employee.php');

            }

            else
            {
                $_SESSION['update'] = "Failed to update Employee";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/update-emp.php');

            }
            
        }
    ?>

