
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
</section>
</body>
<?php
 $br_id = $_GET['Br_id'];
 $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
 $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
 $sql="DELETE FROM branches WHERE branches.Br_id=$br_id ";
 $sql2="DELETE FROM branch_phone WHERE branch_phone.Br_id=$br_id";
 $sql3="DELETE FROM branch_facilities WHERE branch_facilities.Br_id=$br_id";
 $res = mysqli_query($conn,$sql);
 $res2 = mysqli_query($conn,$sql2);
 $res3 = mysqli_query($conn,$sql3);
 if($res == TRUE )
 {
     $_SESSION['delete']="Branch deleted successfully";
     header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/branchesad.php');

 }
 else{
    $_SESSION['delete']="Branch deleted successfully";
    header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/branchesad.php');

}
?>