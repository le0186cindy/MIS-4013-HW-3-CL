<?php
    require "header.php";
    require_once "util-db.php";
    $customers = get_all_customers();
?>
<html>

<body>
    <div class="table-responsive mx-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>First Name</th><th>Last Name</th><th>E-mail</th><th>#</th>
                </tr>
            </thead>
            <thead>
                    <?php
                        foreach ($customers as $customer) {
                    ?>
                    <tr>
                         <td><?php echo "<a href='orders.php?c_id=" . $customer['customer_id'] . "'>" . $customer['customer_id'] . "</a>"?></td>
                         <td><?php echo $customer['first_name']?></td>
                         <td><?php echo $customer['last_name']?></td>
                         <td><?php echo $customer['email']?></td>
                         <td><form method="post" action="orders.php">
                            <input type="hidden" name="c_id" value="<?php echo $customer['customer_id']?>">
                            <input type="hidden" name="c_first_name" value="<?php echo $customer['first_name']?>">
                            <input type="hidden" name="c_last_name" value="<?php echo $customer['last_name']?>">
                            <button type="submit" class="btn btn-primary">Orders</button>
                         </form></td>
                    </tr>
                    <?php
                        }
                    ?>
            </thead>
        </table>
    </div>
</body>

</html>
