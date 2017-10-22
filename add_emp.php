<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Add Employee</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Employee</h1>
        </div>
    </div><!--/.row-->
    <form role="form" id="add_employee">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Detail:</div>
                <div class="panel-body">
                    <form role="form" id="addEmployee">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Staff</label>
                                <select class="form-control" id="staff_type">
                                    <option selected disabled>Select Staff Type</option>
                                    <?php
                                    $query = "SELECT * FROM staff_type";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($staff = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $staff['staff_type_id'] . '">' . $staff['staff_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Shift</label>
                                <select class="form-control" id="shift">
                                    <option selected disabled>Select Staff Type</option>
                                    <?php
                                    $query = "SELECT * FROM shift";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($shift = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" id="first_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" id="last_name">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card Type</label>
                                <select class="form-control" id="id_card_id">
                                    <option selected disabled>Select ID Card Type</option>
                                    <?php
                                    $query = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($id_card_type = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>ID Card No</label>
                                <input class="form-control" placeholder="ID Card No" id="id_card_no">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Contact Number</label>
                                <input type="date" class="form-control" placeholder="Contact Number" id="contact_no">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="address" id="address">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Joining Date</label>
                                <input type="date" class="form-control" placeholder="DD/MM/YYYY" id="joining_date">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Salary</label>
                                <input type="number" class="form-control" placeholder="Salary" id="salary">
                            </div>


                        </div>

                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    </form>

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">MIS Developed by <a href="https://www.pcsaini.in">pcsaini</a></p>
        </div>
    </div>

</div>    <!--/.main-->




