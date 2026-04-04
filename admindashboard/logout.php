<?php

include_once "../session.php";

session_destroy();

header('location:../signin.php');

?>