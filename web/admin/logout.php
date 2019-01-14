<?php

session_start();

unset($_SESSION["namauser"]);

unset($_SESSION["passuser"]);

header("location:index.php");

?>