<?php
    require_once("database-info.php");

    function get_all_customers() {
        $conn = get_db_connection();
        try {
            $conn = get_db_connection();
            return mysqli_query($conn, "SELECT c.customer_id, c.first_name,c.last_name,c.email FROM customers c");
        } catch (Exception $e) {
            $conn->close();
            throw $e;
        }
    }

    function get_all_products() {
        $conn = get_db_connection();

        try {
            $conn = get_db_connection();
            return mysqli_query($conn, "SELECT product_id, `name`, price FROM products");
        } catch (Exception $e) {
            $conn->close();
            throw $e;
        }
    }

    function get_orders_by_customer($customer_id) {
        $conn = get_db_connection();

        try {
            $conn = get_db_connection();
            $result = mysqli_query($conn, "SELECT product_id, `name`, price FROM products");
            return $result->fetch_assoc();
        } catch (Exception $e) {
            $conn->close();
            throw $e;
        }
    }
    function get_customer_by_id($customer_id) {
        $conn = get_db_connection();

        try {
            $conn = get_db_connection();
            return mysqli_query($conn, "SELECT c.first_name,c.last_name FROM customers c WHERE c.customer_id = $customer_id");
        } catch (Exception $e) {
            $conn->close();
            throw $e;
        }
    }

    function get_items_by_order($order_id) {
        $conn = get_db_connection();
        try {
            $conn = get_db_connection();
            return mysqli_query($conn, "SELECT oi.product_id, p.name, oi.quantity, p.price FROM order_items oi
            JOIN products p ON oi.product_id = p.product_id WHERE oi.order_id = $order_id ORDER BY p.name");
        } catch (Exception $e) {
            $conn->close();
            throw $e;
        }
    }

?>
