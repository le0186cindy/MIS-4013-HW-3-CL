<?php
    require "header.php";
    require_once "util-db.php";
    $customer_name = $_POST['c_first_name'] . " " . $_POST['c_last_name'];
    $orders = get_orders_by_customer($_POST['c_id']);
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