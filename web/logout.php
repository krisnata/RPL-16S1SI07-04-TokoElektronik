<?php

session_start();

unset($_SESSION["idm"]);

unset($_SESSION["name"]);

header("location:index.php");

?>