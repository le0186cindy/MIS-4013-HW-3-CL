<?php
    require "header.php";
    require_once "util-db.php";
    
    $customerID;
    if (isset($_POST['c_id'])) {
        $customerID = $_POST['c_id'];
    } else if (isset($_GET['c_id'])) {
        $customerID = $_GET['c_id'];
    }

    $orders = get_orders_by_customer($_POST['c_id']);
    $customer = get_customer_by_id($customerID);
    $customer_name = $customer['first_name'] . " " . $customer['last_name'];
?>

<html>

<body>
    <div class="m-5">
        <h1>Order for <?php echo $customer_name?></h1>
        <?php
            foreach ($orders as $order) {
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <?php
                    $order_items = get_items_by_order($order['order_id']);
                    foreach ($order_items as $item) {
                ?>
                <p><?php echo $item['quantity']?>x <?php echo $item['name']?></p><br>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>

</html>
