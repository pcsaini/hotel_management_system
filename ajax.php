<?php
include_once 'db.php';

if (isset($_POST['add_room'])) {
    $room_type_id = $_POST['room_type_id'];
    $room_no = $_POST['room_no'];

    if ($room_no != '') {
        $sql = "SELECT * FROM room WHERE room_no = '$room_no'";
        if (mysqli_num_rows(mysqli_query($connection, $sql)) >= 1) {
            $response['done'] = false;
            $response['data'] = "Room No Already Exist";
        } else {
            $query = "INSERT INTO room (room_type_id,room_no) VALUES ('$room_type_id','$room_no')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $response['done'] = true;
                $response['data'] = 'Successfully Added Room';
            } else {
                $response['done'] = false;
                $response['data'] = "DataBase Error";
            }
        }
    } else {

        $response['done'] = false;
        $response['data'] = "Please Enter Room No";
    }

    echo json_encode($response);
}

if (isset($_POST['room'])) {
    $room_id = $_POST['room_id'];

    $sql = "SELECT * FROM room WHERE room_id = '$room_id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        $response['done'] = true;
        $response['room_no'] = $room['room_no'];
        $response['room_type_id'] = $room['room_type_id'];
    } else {
        $response['done'] = false;
        $response['data'] = "DataBase Error";
    }

    echo json_encode($response);
}

if (isset($_POST['edit_room'])) {
    $room_type_id = $_POST['room_type_id'];
    $room_no = $_POST['room_no'];
    $room_id = $_POST['room_id'];

    if ($room_no != '') {
        $query = "UPDATE room SET room_no = '$room_no',room_type_id = '$room_type_id' where room_id = '$room_id'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $response['done'] = true;
            $response['data'] = 'Successfully Edit Room';
        } else {
            $response['done'] = false;
            $response['data'] = "DataBase Error";
        }

    } else {

        $response['done'] = false;
        $response['data'] = "Please Enter Room No";
    }

    echo json_encode($response);
}

if (isset($_POST['room_type'])) {
    $room_type_id = $_POST['room_type_id'];

    $sql = "SELECT * FROM room WHERE room_type_id = '$room_type_id' AND status IS NULL";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<option selected disabled>Select Room Type</option>";
        while ($room = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $room['room_id'] . "'>" . $room['room_no'] . "</option>";
        }
    } else {
        echo "<option>No Available</option>";
    }
}

if (isset($_POST['room_price'])) {
    $room_id = $_POST['room_id'];

    $sql = "SELECT * FROM room NATURAL JOIN room_type WHERE room_id = '$room_id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        echo $room['price'];
    } else {
        echo "0";
    }
}

if (isset($_POST['booking'])) {
    $room_id = $_POST['room_id'];
    $check_in = strtotime($_POST['check_in']);
    $check_out = strtotime($_POST['check_out']);
    $total_price = $_POST['total_price'];
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $id_card_id = $_POST['id_card_id'];
    $id_card_no = $_POST['id_card_no'];
    $address = $_POST['address'];

    $customer_sql = "INSERT INTO customer (customer_name,contact_no,email,id_card_type_id,id_card_no,address) VALUES ('$name','$contact_no','$email','$id_card_id','$id_card_no','$address')";
    $customer_result = mysqli_query($connection,$customer_sql);

    if ($customer_result){
        $customer_id = mysqli_insert_id($connection);
        $booking_sql = "INSERT INTO booking (customer_id,room_id,check_in,check_out,total_price) VALUES ('$customer_id','$room_id','$check_in','$check_out','$total_price')";
        $booking_result = mysqli_query($connection,$booking_sql);
        if ($booking_result){
            $room_stats_sql = "UPDATE room SET status = '1' WHERE room_id = '$room_id'";
            if (mysqli_query($connection,$room_stats_sql)){
                $response['done'] = true;
                $response['data'] = 'Successfully Booking';
            }else{
                $response['done'] = false;
                $response['data'] = "DataBase Error in status change";
            }
        }else{
            $response['done'] = false;
            $response['data'] = "DataBase Error booking";
        }
    }else{
        $response['done'] = false;
        $response['data'] = "DataBase Error add customer";
    }

    echo json_encode($response);
}

if (isset($_POST['booked_room'])) {
    $room_id = $_POST['room_id'];

    $sql = "SELECT * FROM room NATURAL JOIN room_type NATURAL JOIN booking NATURAL JOIN customer WHERE room_id = '$room_id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        $response['done'] = true;
        $response['booking_id'] = $room['booking_id'];
        $response['name'] = $room['customer_name'];
        $response['room_no'] = $room['room_no'];
        $response['room_type'] = $room['room_type'];
        $response['check_in'] = date('M j, Y',$room['check_in']);
        $response['check_out'] = date('M j, Y',$room['check_out']);
        $response['total_price'] = $room['total_price'];
        $response['remaining_price'] = $room['remaining_price'];
    } else {
        $response['done'] = false;
        $response['data'] = "DataBase Error";
    }

    echo json_encode($response);
}
//vishal code
if (isset($_POST['add_employee'])) {

    $staff_type = $_POST['staff_type'];
    $shift = $_POST['shift'];
    $first_name = $_POST['first_name'];
    $space = " ";
    //echo $shift;
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];

    $id_card_id = $_POST['id_card_id'];
    $id_card_no = $_POST['id_card_no'];
    $address = $_POST['address'];

    $joining_date = strtotime($_POST['joining_date']);

    $salary = $_POST['salary'];

    $customer_sql = "INSERT INTO staff (emp_name,staff_type_id,shift_id,id_card_type,id_card_no,address,contact_no,joining_date,salary) VALUES ('$first_name $space $last_name','$staff_type','$shift','$id_card_id','$id_card_no','$address','$contact_no','$joining_date','$salary')";
   //echo $customer_sql;
    $customer_result = mysqli_query($connection,$customer_sql);
    if ($customer_result){
                $response['done'] = true;
                $response['data'] = 'Successfully Booking';
            }else{
                $response['done'] = false;
                $response['data'] = "DataBase Error in status change";
            }
    //echo $customer_sql;
//    if ($customer_result){
//        $customer_id = mysqli_insert_id($connection);
//        $booking_sql = "INSERT INTO booking (customer_id,room_id,check_in,check_out,total_price) VALUES ('$customer_id','$room_id','$check_in','$check_out','$total_price')";
//        $booking_result = mysqli_query($connection,$booking_sql);
//        if ($booking_result){
//            $room_stats_sql = "UPDATE room SET status = '1' WHERE room_id = '$room_id'";
//            if (mysqli_query($connection,$room_stats_sql)){
//                $response['done'] = true;
//                $response['data'] = 'Successfully Booking';
//            }else{
//                $response['done'] = false;
//                $response['data'] = "DataBase Error in status change";
//            }
//        }else{
//            $response['done'] = false;
//            $response['data'] = "DataBase Error booking";
//        }
//    }else{
//        $response['done'] = false;
//        $response['data'] = "DataBase Error add customer";
//    }
//
    echo json_encode($response);
}


if (isset($_POST['cutomerDetails'])) {
    //$customer_result='';
    $room_id = $_POST['room_id'];

   if ($room_id != '') {
       $query = "select customer_id from booking where room_id = '$room_id' and check_out=''";
       $result = mysqli_query($connection, $query);
       $details = mysqli_fetch_assoc($result);
       if ($details['customer_id'] != '') {
           $customer_id = $details['customer_id'];
          // echo $customer_id;
           $customer_query= "select * from customer where customer_id= '$customer_id'";
           $customer_result = mysqli_query($connection, $customer_query);
           //$customer_details = mysqli_fetch_assoc($customer_result);
           //echo $customer_details['customer_id'];
           if ($customer_result!='') {
               $customer_details = mysqli_fetch_assoc($customer_result);
                $id_type= $customer_details['id_card_type_id'];

               $query = "select id_card_type from id_card_type where id_card_type_id = '$id_type'";
               $result = mysqli_query($connection, $query);
               $id_type_name = mysqli_fetch_assoc($result);

               $response['done'] = true;
               $response['customer_id'] = $customer_details['customer_id'];
               $response['customer_name'] = $customer_details['customer_name'];
               $response['contact_no'] = $customer_details['contact_no'];
               $response['email'] = $customer_details['email'];
               $response['id_card_type_id'] = $id_type_name['id_card_type'];
               $response['id_card_no'] = $customer_details['id_card_no'];
               $response['address'] = $customer_details['address'];
              // echo $response;
               echo json_encode($response);

           } else {
               $response['done'] = false;
               $response['data'] = "DataBase Error";
               echo json_encode($response);
           }

       }
       else{
           $response['done'] = true;
           $response['customer_id'] = '';
           $response['customer_name'] ='';
           $response['contact_no'] = '';
           $response['email'] = '';
           $response['id_card_type_id'] = '';
           $response['id_card_no'] = '';
           $response['address'] = '';
           // echo $response;
           echo json_encode($response);

       }
   }





}