<?php
    require "header.php";
    require_once "util-db.php";
    $order_items = get_all_order_items();
?>
<html>

<body>
    <h4 class="ms-5">This table is only used to link products with orders.</h4>
    <div class="table-responsive mx-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Order ID</th><th>Product ID</th><th>Quantity</th>
                </tr>
            </thead>
            <thead>
                    <?php
                        foreach ($order_items as $order_item) {
                    ?>
                    <tr>
                         <td><?php echo $order_item['order_id']?></td>
                         <td><?php echo $order_item['product_id']?></td>
                         <td><?php echo $order_item['quantity']?></td>   
                    </tr>
                    <?php
                        }
                    ?>
            </thead>
        </table>
    </div>
</body>

</html>