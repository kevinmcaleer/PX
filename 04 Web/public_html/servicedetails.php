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

include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
include INCLUDES_PATH . 'navigation.php';

?>
<div class="title">
    <p>Service Details</p>
</div>
<div class="container">
    <?php
    include INCLUDES_PATH . 'sidebar.php';
    ?>
    <div class="two_column"></div>

include INCLUDES_PATH . 'footer.html';