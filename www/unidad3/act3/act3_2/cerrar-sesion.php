<?php
session_start();
unset($_SESSION);
session_destroy();
header("Location: ./act3_2.php");
exit;
?>