
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
 $i_no = $_GET['Item_no'];
 $conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
 $db_select=mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));
 $sql="DELETE FROM items WHERE items.Item_no=$i_no ";
 $res = mysqli_query($conn,$sql);
 if($res == TRUE )
 {
     $_SESSION['delete']="Item deleted successfully";
     header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/itemad.php');

 }
 else{
    $_SESSION['delete']="Item not deleted successfully";
    header("location:".'http://localhost/CoffeeShop/CoffeeShop/Admin/itemad.php');

}
?>