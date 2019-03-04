<?php
session_start();
unset($_SESSION["correo"]);
unset($_SESSION['type']);
unset($_SESSION['username']);
session_destroy();
header("Location: ../login.php");
exit;
?>