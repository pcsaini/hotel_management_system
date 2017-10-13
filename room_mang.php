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
                                                echo '<a href="index.php?reservation&room_id='.$rooms['room_id'].'" class="btn btn-success">Book Room</a></td>';
                                            }else{
                                                echo '<a href="#" class="btn btn-danger">Booked</a></td>';
                                            }
                                        ?>


                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editRoom" data-id="<?php echo $rooms['room_id']; ?>" id="roomEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                                <button class="btn btn-success pull-right">Add Room</button>
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



