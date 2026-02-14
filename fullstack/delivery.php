<?php
include 'config.php';
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'delivery') {
    header("Location: login.php");
    exit();
}

$del_id = $_SESSION['user_id'];

if(isset($_POST['update_status'])){
    $oid = $_POST['order_id'];
    $new_status = $_POST['status'];
    mysqli_query($conn, "UPDATE orders SET status='$new_status', assigned_to='$del_id' WHERE order_id='$oid'");
    header("Location: delivery.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>ZapRent | Unified Delivery</title>
</head>
<body class="store-body">
    <nav>
        <div class="nav-content">
            <span class="logo"><b>Zap</b>Rent | DELIVERY</span>
           
        </div>
    </nav>

    <div class="main-wrapper">
        <h2>Consolidated Tasks</h2>
        <div class="grid">
            <?php
            // Using GROUP BY to merge multiple items from the same order into one box
            $sql = "SELECT o.*, u.email as cust_email, 
                    GROUP_CONCAT(p.name SEPARATOR ', ') as all_products 
                    FROM orders o 
                    JOIN users u ON o.user_id = u.user_id 
                    JOIN products p ON o.product_id = p.product_id
                    WHERE o.status != 'Delivered' 
                    AND (o.assigned_to IS NULL OR o.assigned_to = '$del_id')
                    GROUP BY o.order_id 
                    ORDER BY o.order_id DESC";
            
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="card" style="padding:25px; border-left: 8px solid #3b82f6;">
                <div style="display:flex; justify-content:space-between;">
                    <h3 style="color:#1e293b;">Order #<?php echo $row['order_id']; ?></h3>
                </div>
                
                <p style="margin-top:10px;"><b>Items:</b> <span class="highlight"><?php echo $row['all_products']; ?></span></p>
                
                <hr style="margin:15px 0; opacity:0.1;">
                
                <p><b>Customer:</b> <?php echo $row['cust_email']; ?></p>
                <p><b>Phone:</b> <?php echo $row['contact_no']; ?></p>
                <p><b>Address:</b> <?php echo $row['address']; ?></p>
                
                <div style="background:#f1f5f9; padding:10px; border-radius:8px; margin: 15px 0;">
                    <p>Status: <b><?php echo $row['status']; ?></b></p>
                </div>

                <form method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                    <select name="status" class="input-field" style="width:100%; margin-bottom:10px;">
                        <option value="Picked Up">I'm Picking this up</option>
                        <option value="On the Way">On the Way</option>
                        <option value="Delivered">Deliver (Close Order)</option>
                    </select>
                    <button type="submit" name="update_status" class="zap-primary-btn">Update Fleet</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>