<?php
    // Gets all the include files needed
    require_once 'lib/include.php';
    // Header
    include 'lib/header.php';
    
    $dbContents = get_all_bills($pdo);
    
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        if (!isset($action)) {
            $action = "login";
        }
    }

?>

<div class="container">
    <?php
         switch($action) {
            case "list":
                include 'views/listEntry.php';
                break;
            case "login":
                include 'views/login.php';
                break;
            case "validate":
                if (validateLogin($pdo)) {
                    include 'views/listEntry.php';
                }
                break;
            case "add":
                include 'views/newEntry.php';
                break;
            case "addBill":
                addBill($pdo);
                $dbContents = get_all_bills($pdo);
                include 'views/listEntry.php';
                break;
            case "delete":
                deleteBill($pdo);
                $dbContents = get_all_bills($pdo);
                include 'views/listEntry.php';
                break;
            case "paid":
                togglePay($pdo);
                $dbContents = get_all_bills($pdo);
                include 'views/listEntry.php';
            default:
         }
    ?>
</div>

<?php
    // Footer
    include 'lib/footer.php';
?>