<?php
if (isset($_GET['room_id'])){
    $room_id = $_GET['room_id'];


}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Reservation</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <form role="form" id="booking">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Room Information:</div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Room Type</label>
                                <select class="form-control" id="room_type" onchange="fetch_room(this.value);">
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

                            <div class="form-group col-lg-6">
                                <label>Room No</label>
                                <select class="form-control" id="room_no" onchange="fetch_price(this.value)">

                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Check In Date</label>
                                <input type="text" class="form-control" placeholder="DD/MM/YYYY" id="check_in_date">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Check Out Date</label>
                                <input type="text" class="form-control" placeholder="DD/MM/YYYY" id="check_out_date">
                            </div>

                            <div class="col-lg-12">
                                <h4 style="font-weight: bold">Total Days : <span id="staying_day">0</span> Days</h4>
                                <h4 style="font-weight: bold">Price: <span id="price">0</span> /-</h4>
                                <h4 style="font-weight: bold">Total Amount : <span id="total_price">0</span> /-</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Customer Detail:</div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>First Name</label>
                                <input class="form-control" placeholder="First Name" id="first_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Last Name</label>
                                <input class="form-control" placeholder="Last Name" id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Contact No</label>
                                <input type="number" class="form-control" placeholder="Contact No" id="contact_no">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card Type</label>
                                <select class="form-control" id="id_card_id">
                                    <option selected disabled>Select ID Card Type</option>
                                    <?php
                                    $query  = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection,$query);
                                    if (mysqli_num_rows($result) > 0){
                                        while ($id_card_type = mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$id_card_type['id_card_type_id'].'">'.$id_card_type['id_card_type'].'</option>';
                                        }}
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card No</label>
                                <input class="form-control" placeholder="ID Card No" id="id_card_no">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" id="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary pull-right">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">MIS Developed by <a href="https://www.pcsaini.in">pcsaini</a></p>
        </div>
    </div>

</div>    <!--/.main-->


