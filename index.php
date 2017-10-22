<?php
include_once "db.php";
include_once "header.php";
include_once "sidebar.php";

if (isset($_GET['room_mang'])){
    include_once "room_mang.php";
}
elseif (isset($_GET['reservation'])){
    include_once "reservation.php";
}
elseif (isset($_GET['staff_mang'])){
    include_once "staff_mang.php";
}
elseif (isset($_GET['add_emp'])){
    include_once "add_emp.php";
}
elseif (isset($_GET['notification'])){
    include_once "notification.php";
}
elseif (isset($_GET['statistics'])){
    include_once "statistics.php";
}
else{
    include_once "room_mang.php";
}

include_once "footer.php";