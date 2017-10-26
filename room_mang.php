<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Room Management</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Room Management
                    <button class="btn btn-info pull-right" data-toggle="modal" data-target="#addRoom">Add Room</button>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                        <tr>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Booking Status</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $room_query = "SELECT * FROM room NATURAL JOIN room_type";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if(mysqli_num_rows($rooms_result) > 0){
                            while ($rooms = mysqli_fetch_assoc($rooms_result)){ ?>
                                <tr>
                                    <td><?php echo $rooms['room_no']?></td>
                                    <td><?php echo $rooms['room_type']?></td>
                                    <td>
                                        <?php
                                            if ($rooms['status'] == 0){
                                                echo '<a href="index.php?reservation&room_id='.$rooms['room_id'].'&room_type_id='.$rooms['room_type_id'].'" class="btn btn-success">Book Room</a>';
                                            }else{
                                                echo '<a href="#" class="btn btn-danger">Booked</a>';
                                            }
                                        ?>


                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0){
                                            echo '<button class="btn btn-success" id="checkInRoom"  data-id="'.$rooms['room_id'].'">Check In</button>';
                                        }
                                        elseif($rooms['status'] == 0){
                                            echo '-';
                                        }
                                        else{

                                            echo '<a href="#" class="btn btn-danger">12/10/2017</a>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 1){
                                            echo '<button class="btn btn-success" id="checkOutRoom" data-id="'.$rooms['room_id'].'">Check Out</button>';
                                        }
                                        elseif($rooms['status'] == 0){
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>

                                        <button title="Edit Room Information" data-toggle="modal" data-target="#editRoom" data-id="<?php echo $rooms['room_id']; ?>" id="roomEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>

                                        <button title="Customer Information" data-toggle="modal" data-target="#cutomerDetailsModal" data-id="<?php echo $rooms['room_id']; ?>" id="cutomerDetails" class="btn btn-warning"><i class="fa fa-eye"></i></button>
                                        <a title="Delete Room" href="#" class="btn btn-danger"><i class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        }else{
                            echo "No Rooms";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Room Modal -->
    <div id="addRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="addRoom">
                                <div class="response"></div>
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" id="room_type_id" required>
                                        <option selected disabled>Select Room Type</option>
                                        <?php
                                        $query  = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection,$query);
                                        if (mysqli_num_rows($result) > 0){
                                        while ($room_type = mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$room_type['room_type_id'].'">'.$room_type['room_type'].'</option>';
                                        }}
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Room No</label>
                                    <input class="form-control" placeholder="Room No" id="room_no" required>
                                </div>
                                <button class="btn btn-success pull-right">Add Room</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Edit Room Modal -->
    <div id="editRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="roomEditFrom">
                                <div class="edit_response"></div>
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" id="edit_room_type">
                                        <option selected disabled>Select Room Type</option>
                                        <?php
                                        $query  = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection,$query);
                                        if (mysqli_num_rows($result) > 0){
                                            while ($room_type = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$room_type['room_type_id'].'">'.$room_type['room_type'].'</option>';
                                            }}
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Room No</label>
                                    <input class="form-control" placeholder="Room No" id="edit_room_no">
                                </div>
                                <input type="hidden" id="edit_room_id">
                                <button class="btn btn-success pull-right">Edit Room</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!---customer details-->
    <div id="cutomerDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="customer_name"></td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td id="customer_contact_no"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="customer_email"></td>
                                </tr>
                                <tr>
                                    <td>ID Card Type</td>
                                    <td id="customer_id_card_type"></td>
                                </tr>
                                <tr>
                                    <td>ID Card Number</td>
                                    <td id="customer_id_card_number"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td id="customer_address"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---customer details ends here-->

    <!-- Check In Modal -->
    <div id="checkIn" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check In Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="getCustomerName"></td>
                                </tr>
                                <tr>
                                    <td>Room Type</td>
                                    <td id="getRoomType"></td>
                                </tr>
                                <tr>
                                    <input type="hidden" id="room_id">
                                    <td>Room No</td>
                                    <td id="getRoomNo"></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn"></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="form-group col-lg-12">
                                    <label>Advance Payment</label>
                                    <input type="number" class="form-control" id="advance_payment" placeholder="Advance Payment">
                                </div>
                                <input type="hidden" id="getBookingId">
                                <button type="submit" class="btn btn-primary pull-right">Payment & Check In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Check Out Modal-->
    <div id="checkOut" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check Out Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="getCustomerName_n"></td>
                                </tr>
                                <tr>
                                    <td>Room Type</td>
                                    <td id="getRoomType_n"></td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td id="getRoomNo_n"></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn_n"></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut_n"></td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td id="getTotalPrice_n"></td>
                                </tr>
                                <tr>
                                    <td>Remaining Amount</td>
                                    <td id="getRemainingPrice_n"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="form-group col-lg-12">
                                    <label>Remaining Payment</label>
                                    <input type="text" class="form-control" id="advancePrice" placeholder="Remaining Payment">
                                </div>
                                <input type="hidden" id="getBookingId_n">
                                <button type="submit" class="btn btn-primary pull-right">Payment & Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">MIS Developed by <a href="https://www.pcsaini.in">pcsaini</a></p>
        </div>
    </div>

</div>    <!--/.main-->



