<?php
    require "header.php";
    require_once "util-db.php";
    $customers = get_all_customers();
?>

<html>

<body>
    <h4 class="ms-5">This page shows all the orders. Each card is a customer.</h4>
    <div class="card-deck m-5">
        <?php
            foreach ($customers as $customer) {
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $customer['first_name'] . " " . $customer['last_name']?></h5>
                <?php
                    $orders = get_orders_by_customer($customer['customer_id']);
                    foreach ($orders as $order) {
                ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Order #<?php echo $order['order_id']?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                            $items = get_items_by_order($order['order_id']);
                            foreach ($items as $item) {
                        ?>
                        <li class="list-group-item"><?php echo $item['quantity']?>x <?php echo $item['name']?></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                 <?php
                    }
                 ?>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>

</html>

