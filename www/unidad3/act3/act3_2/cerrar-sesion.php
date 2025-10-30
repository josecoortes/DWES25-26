<?php
session_start();
session_destroy();
header("Location: act3_2.php");
exit();
?>