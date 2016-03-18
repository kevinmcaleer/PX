<?php

/**
 * Admin Page
 *
 * The account management page. Allows user management, service, request management.
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
include '../resources/includes/header.html';
include '../resources/includes/adminnav.inc.php';

if (isset($_SESSION['id'])) {
    echo '<div class="message">';

    echo '<h1>Upload IT Contacts CSV File</h1>';
    echo '</div>';

    // Upload IT Contacts Form

    echo '<form enctype="multipart/form-data" method="POST" action="itcontactsimporter.php" name="itcontacts">';
    echo '<input type="file" name="csvfile" />';
    echo '<input type="submit" />';
    echo '</form>';
} else {
    include '../resources/includes/login_required.php';
}

include '../resources/includes/footer.html';
?>