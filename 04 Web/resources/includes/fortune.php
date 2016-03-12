<?php
// Fortune
echo '<div class="fortune">';
//echo '<div class="message">';
require_once '../resources/class/class_fortune.php';
$myFortune = new Fortune();
echo '<p>Did You Know?</p>';
echo "<div class='info'>" . '"' . $myFortune->getRandom() . '"' ."</div>";
echo '</div>'; // close fortune
//echo '</div>'; // close fortune
?>