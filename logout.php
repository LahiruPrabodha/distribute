<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["adminuser"]);
unset($_SESSION["utype"]);
header("Location:index.php");
?>