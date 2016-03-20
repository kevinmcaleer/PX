<?php
/**
 * servicedetails.php
 * 
 * a simplified service details page. Previously was servicepage.php
 *
 * @author Kevin McAleer kevin.mcaleer@advicefactory.co.uk
 * @copyright (c) 2016, Advice Factory Ltd
 * @link http://www.servicepoint.online
 * @since Version 1.0
 * @filesource
 *
 */
// -----------------------------------------------------------------------------
// $safepost = filter_input(INPUT_POST, 'serviceid', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$safepost = filter_input(INPUT_POST, 'serviceid');
if (isset($safepost['serviceid'])) {
    session_start();
} else {
    echo 'safepost: "' . $safepost . '"';
    echo 'oops - no serviceid chosen, something went wrong'; // TODO add an error code
    // send an email saying something went wrong.
}

include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
require_once CLASS_PATH . 'class_service.php';
require_once CLASS_PATH . 'class_view_service.php';
?>
<div class="title">
    <p>Service Details</p>
</div>
<div class="container">
    <?php
    include INCLUDES_PATH . 'sidebar.php';
    ?>
    <div class="two_column">
        <?php
        include INCLUDES_PATH . 'navigation.html';
        $myservice = new class_view_service();
        $myservice->load($safepost);
        $myservice->show();
        ?>
    </div>
</div>
<?php
include INCLUDES_PATH . 'footer.html';
