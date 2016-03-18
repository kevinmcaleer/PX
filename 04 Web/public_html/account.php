<?php
/**
 * Accounts Page
 *
 * The account management page
 *
 * @author Kevin McAleer kevin.mcaleer@advicefactory.co.uk
 * @copyright (c) 2016, Advice Factory Ltd
 * @link http://www.servicepoint.online
 * @since Version 1.0
 * @filesource
 *
 */
// -----------------------------------------------------------------------------


session_start();
include '../resources/config.php';
include INCLUDES_PATH . 'header.html';

if (isset($_SESSION['id'])) {
    ?>
    <h1>My Account</h1>
    <?php
    include INCLUDES_PATH . 'navigation.html';
    include CLASS_PATH . 'class_contact.php';
    $myAcct = new Contact();
    $myAcct->load($_SESSION['id']);
    $myAcct->show();
} else {
    // otherswise show an error msg
    echo 'Sorry, you are not logged in. Click here to <a href="login.php">login</a>';
}

include '../resources/includes/footer.html';
?>
