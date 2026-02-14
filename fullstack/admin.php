
<?php 
include 'config.php'; 
session_start();
if($_SESSION['role'] != 'admin') { header("Location: login.php"); }

$sql = "SELECT orders.order_id, users.email, products.name, orders.address, orders.status 
        FROM orders 
        JOIN users ON orders.user_id = users.user_id 
        JOIN products ON orders.product_id = products.product_id";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>ZapRent | Admin Master</title>
</head>
<body>
<nav>
    <div class="nav-content"><span class="logo"><b>ZapRent</b> Admin</span></div>
</nav>
<div class="container">
    <h2>All Rental Requests</h2>
    <div class="card" style="width:100%; overflow-x:auto;">
        <table width="100%" cellpadding="15">
            <tr style="text-align:left; border-bottom:1px solid #eee;">
                <th>ID</th><th>Customer</th><th>Product</th><th>Address</th><th>Status</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td>#<?php echo $row['order_id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><span class="badge"><?php echo $row['status']; ?></span></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<footer>
    
        
    </div>

</body>
</html>