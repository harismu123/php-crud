<?php

include '../middleware/isLoggedin.php';

session_start();
session_destroy();

header('Location: ../index.php');
exit;
