<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 12-11-2017
 * Time: 03:07 PM
 */

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
session_abort();
header('Location:login.php');