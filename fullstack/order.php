<?php 
include 'config.php'; 
session_start();

if(!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit();
}

$u_id = $_SESSION['user_id'];
$u_email = $_SESSION['email'];

if(isset($_POST['final_checkout'])){
    $product_ids = explode(',', $_POST['p_ids']);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $ph = mysqli_real_escape_string($conn, $_POST['phone']);

    foreach($product_ids as $pid) {
        if(!empty($pid)){
            mysqli_query($conn, "INSERT INTO orders (user_id, product_id, address, contact_no) VALUES ('$u_id', '$pid', '$addr', '$ph')");
        }
    }
    header("Location: order.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZapRent | Tech Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="store-body">

    <nav>
    <div class="nav-content">
        <div class="nav-left"></div> 
        
        <span class="logo"><b>ZAP</b>RENT</span>
        
    
        </div>
    </div>
</nav>

    <div class="main-wrapper">
        <header class="hero">
            <h1>Select Your <span class="highlight">Tech Bundle</span></h1>
        </header>

        <div class="selection-summary" id="summary-bar" style="display:none;">
            <div class="summary-text">
                <span id="item-count">0</span> Items Selected | <b>Total: ₹<span id="price-sum">0</span>/day</b>
            </div>
            <button class="checkout-trigger-btn" onclick="openCheckoutModal()">Confirm Order</button>
        </div>

        <div class="grid">
            <?php
            $res = mysqli_query($conn, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($res)) {
                // FIXED IMAGE MAPPING
                switch($row['name']) {
    case 'Sony WH-1000XM5':   $img = "https://images.unsplash.com/photo-1546435770-a3e426bf472b?w=500"; break;
    case 'Razer Blade 16':    $img = "https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?w=500"; break;
    case 'PlayStation 5':     $img = "https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=500"; break;
    case 'DJI Mini 4 Pro':    $img = "https://images.unsplash.com/photo-1508614589041-895b88991e3e?w=500"; break;
    case 'Canon EOS R6':      $img = "https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=500"; break;
    case 'Samsung Odyssey G7':$img = "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500"; break;
    case 'Keychron K2':       $img = "https://images.unsplash.com/photo-1595225476474-87563907a212?w=500"; break;
    case 'Meta Quest 3':      $img = "https://images.unsplash.com/photo-1622979135225-d2ba269cf1ac?w=500"; break;
    case 'Apple Watch Ultra 2':$img = "https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?w=500"; break;
    case 'USB-C Hub Adapter': $img = "https://m.media-amazon.com/images/I/61Bm+9UTP6L._AC_UF1000,1000_QL80_.jpg"; break;
    case 'Logitech MX Master':$img = "https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=500"; break;
        case 'Universal Travel Adapter': 
        $img = "https://baykron.com/cdn/shop/files/Basic-Travel-Adpt-White-HERO-1_3000x.jpg?v=1740848323&w=500"; 
        break;
    case '128GB USB Drive':   
        $img = "https://m.media-amazon.com/images/I/319U27iJkqL._SX300_SY300_QL70_FMwebp_.jpg"; 
        break;
    case 'C Type Charger': 
        $img = "https://images-cdn.ubuy.co.in/65d5158c3a4ec204a365b067-google-original-usb-c-charger-18w-pd.jpg"; 
        break;
    
    // Fixed Charger & Storage Items
    
    default:                  $img = "https://via.placeholder.com/500?text=Tech+Gear";
}
            ?>
            <div class="card" id="card-<?php echo $row['product_id']; ?>">
                <div class="price-badge">₹<?php echo $row['price']; ?></div>
                <img src="<?php echo $img; ?>" class="product-img">
                <div class="card-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <button class="add-btn" onclick="toggleItem('<?php echo $row['product_id']; ?>', <?php echo $row['price']; ?>)">Add to Order</button>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
    $status_query = "SELECT status FROM orders WHERE user_id = '$u_id' AND status != 'Delivered' ORDER BY order_id DESC LIMIT 1";
    $status_res = mysqli_query($conn, $status_query);
    if($status_row = mysqli_fetch_assoc($status_res)) {
        $current_status = $status_row['status'];
        $progress_width = ($current_status == 'On the Way') ? '66%' : '33%';
    ?>
    <div class="persistent-status-bar">
        <div class="status-content">
            <div class="status-info">
                <span class="pulse-dot"></span>
                <p>Order Status: <b><?php echo $current_status; ?></b></p>
            </div>
            <div class="status-progress-bg">
                <div class="status-progress-fill" style="width: <?php echo $progress_width; ?>;"></div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div id="checkoutModal" class="modal">
        <div class="modal-content">
            <h2>Delivery Details</h2>
            <form method="POST">
                <input type="hidden" name="p_ids" id="final-p-ids">
                <div class="input-field">
                    <label>Shipping Address</label>
                    <input type="text" name="address" required>
                </div>
                <div class="input-field">
                    <label>Contact Number</label>
                    <input type="text" name="phone" required>
                </div>
                <button type="submit" name="final_checkout" class="zap-primary-btn">Complete Rental</button>
            </form>
        </div>
    </div>

    <script>
    let selectedItems = [];
    let runningTotal = 0;
    function toggleItem(id, price) {
        const btn = document.querySelector(`#card-${id} .add-btn`);
        price = parseInt(price);
        if(selectedItems.includes(id)) {
            selectedItems = selectedItems.filter(i => i !== id);
            runningTotal -= price;
            btn.innerText = "Add to Order";
        } else {
            selectedItems.push(id);
            runningTotal += price;
            btn.innerText = "Added ✓";
        }
        document.getElementById('summary-bar').style.display = selectedItems.length > 0 ? 'flex' : 'none';
        document.getElementById('item-count').innerText = selectedItems.length;
        document.getElementById('price-sum').innerText = runningTotal;
    }
    function openCheckoutModal() {
        document.getElementById('checkoutModal').style.display = 'flex';
        document.getElementById('final-p-ids').value = selectedItems.join(',');
    }
    </script>
</body>
</html>