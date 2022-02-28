
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
          <h1>Add Employee</h1>
          <br />
          <form action="" method="POST">
              <table class="tbl-br">
                  <tr>
                      <td>Employee ID:</td>
                      <td><input type="number" name="emp_id" placeholder="Enter Employee ID" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Employee Name:</td>
                      <td><input type="text" name="emp_name" placeholder="Enter Employee Name" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                 <tr>
                      <td>Phone No:</td>
                      <td><input type="tel" name="emp_ph" placeholder="Enter Phone No" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Address:</td>
                      <td><input type="text" name="add" placeholder="Enter Address" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>E-mail:</td>
                      <td><input type="email" name="e_mail" placeholder="Enter E-mail" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Position:</td>
                      <td><input type="text" name="pos" placeholder="Enter Position" style="height:40px;width:280px;font-size:18pt"></td>
                  </tr>
                  <tr>
                      <td>Branch ID:</td>
                      <td><input type="number" name="br_id" placeholder="Enter Branch ID" style="height:40px;width:280px;font-size:18pt"></td>
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
            $emp_id = $_POST['emp_id'];
            $emp_name = $_POST['emp_name'];
            $emp_ph = $_POST['emp_ph'];
            $add = $_POST['add'];
            $e_mail = $_POST['e_mail'];
            $pos = $_POST['pos'];
            $bran_id = $_POST['br_id'];


            $sql1="INSERT INTO employee SET
                    Emp_id='$emp_id',
                    Emp_name='$emp_name',
                    Phone_no='$emp_ph',
                    Address ='$add',
                    E_mail = '$e_mail',
                    Position = '$pos',
                    Br_id = '$bran_id'
                    ";

            
            $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
            $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
            $res1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

            if($res1 == TRUE)
            {
                $_SESSION['add'] = "Employee added successfully";
                header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/employee.php');

            }

            else
            {
                $_SESSION['add'] = "Failed to add Employee";
                header("location:".'http://localhost/CoffeeShop/CoffeShop/Admin/add-emp.php');

            }
            

            
        }
    ?>

