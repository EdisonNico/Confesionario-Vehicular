<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Public/_Principal.php");
exit();
?>