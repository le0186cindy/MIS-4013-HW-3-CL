<?php
    require "header.php";
    require_once "util-db.php";
    $products = get_all_products();
?>
<html>

<body>
    <div class="table-responsive mx-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Product Name</th><th>Price</th>
                </tr>
            </thead>
            <thead>
                    <?php
                        foreach ($products as $product) {
                    ?>
                    <tr>
                         <td><?php echo $product['product_id']?></td>
                         <td><?php echo $product['name']?></td>
                         <td><?php echo $product['price']?></td>   
                    </tr>
                    <?php
                        }
                    ?>
            </thead>
        </table>
    </div>
</body>

</html>