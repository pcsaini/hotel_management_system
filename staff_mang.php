<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Staff Management</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Staff Management</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Details:
                    <a href="index.php?add_emp" class="btn btn-info pull-right">Add Employee</a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Employee Name</th>
                            <th>Staff</th>
                            <th>Shift</th>
                            <th>Joining Date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //$staff_query = "SELECT * FROM staff  JOIN staff_type JOIN shift ON staff.staff_type_id =staff_type.staff_type_id ON shift.";
                        $staff_query = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift";
                        $staff_result = mysqli_query($connection, $staff_query);

                        if(mysqli_num_rows($staff_result) > 0) {
                            while ($staff = mysqli_fetch_assoc($staff_result)) { ?>
                        <tr>

                                <td><?php  echo $staff['emp_id']; ?></td>
                                <td><?php  echo $staff['emp_name']; ?></td>
                                <td><?php  echo $staff['staff_type']; ?></td>
                                <td><?php  echo $staff['shift'] .' - ' .$staff['shift_timing']; ?></td>
                                <td><?php  echo date('M j, Y',strtotime($staff['joining_date'])); ?></td>
                                <td><?php  echo $staff['salary']; ?></td>

                                <td>

                                    <button data-toggle="modal" data-target="#empDetail<?php echo $staff['emp_id']; ?>" data-id="<?php echo $staff['emp_id']; ?>" id="editEmp" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                    <a href='functionmis.php?empid=<?php echo $staff['emp_id']; ?>' class="btn btn-danger" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i></a>
                                </td>
                        </tr>


                                <?php
                            }
                        }
                        ?>


                        </tbody>
                    </table>
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

<?php
//$staff_query = "SELECT * FROM staff  JOIN staff_type JOIN shift ON staff.staff_type_id =staff_type.staff_type_id ON shift.";
$staff_query = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift";
$staff_result = mysqli_query($connection, $staff_query);

if(mysqli_num_rows($staff_result) > 0) {
while ($staffGlobal = mysqli_fetch_assoc($staff_result)) {
    $fullname= explode(" ",$staffGlobal['emp_name']);
    ?>

<!-- Employee Detail-->
<div id="empDetail<?php echo $staffGlobal['emp_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Employee Detail</h4>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Employee Detail:</div>
                                <div class="panel-body">
                                    <form data-toggle="validator" role="form" action="functionmis.php" method="post">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Staff</label>
                                                <select class="form-control" id="staff_type" name="staff_type_id" required>
                                                    <option selected disabled>Select Staff Type</option>
                                                    <?php
                                                    $query = "SELECT * FROM staff_type";
                                                    $result = mysqli_query($connection, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($staff = mysqli_fetch_assoc($result)) {
                                                          //  echo '<option value=" ' . $staff['staff_type_id'] . ' "  selected  >' . $staff['staff_type'] . '</option>';
                                                            echo '<option value="'.$staff['staff_type_id'].'" '.(($staff['staff_type_id']==$staffGlobal['staff_type_id'])?'selected="selected"':"").'>'.$staff['staff_type'] .'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Shift</label>
                                                <select class="form-control" id="shift" name="shift_id" required>
                                                    <option selected disabled>Select Staff Type</option>
                                                    <?php
                                                    $query = "SELECT * FROM shift";
                                                    $result = mysqli_query($connection, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($shift = mysqli_fetch_assoc($result)) {
                                                           // echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                                            echo '<option value="'.$shift['shift_id'].'" '.(($shift['shift_id']==$staffGlobal['shift_id'])?'selected="selected"':"").'>'.$shift['shift_timing'] .'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" value="<?php echo $staffGlobal['emp_id']; ?>"id="emp_id" name="emp_id">

                                            <div class="form-group col-lg-6">
                                                <label>First Name</label>
                                                <input type="text" value="<?php echo $fullname[0]; ?>" class="form-control" placeholder="First Name" id="first_name" name="first_name" required>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Last Name</label>
                                                <input type="text" value="<?php echo $fullname[1]; ?>" class="form-control" placeholder="Last Name" id="last_name"name="last_name" required>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>ID Card Type</label>
                                                <select class="form-control" id="id_card_id" name="id_card_type" required>
                                                    <option selected disabled>Select ID Card Type</option>
                                                    <?php
                                                    $query = "SELECT * FROM id_card_type";
                                                    $result = mysqli_query($connection, $query);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($id_card_type = mysqli_fetch_assoc($result)) {
                                                          //  echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                                            echo '<option  value="'.$id_card_type['id_card_type_id'].'" '.(($id_card_type['id_card_type_id']==$staffGlobal['id_card_type'])?'selected="selected"':"").'>'.$id_card_type['id_card_type'] .'</option>';
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>ID Card No</label>
                                                <input type="text" class="form-control" placeholder="ID Card No" id="id_card_no" value="<?php echo $staffGlobal['id_card_no']; ?>" name="id_card_no" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Contact Number</label>
                                                <input type="number" class="form-control" placeholder="Contact Number" id="contact_no" value="<?php echo $staffGlobal['contact_no']; ?>" name="contact_no" required>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="address" id="address" value="<?php echo $staffGlobal['address']; ?>" name="address">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Salary</label>
                                                <input type="number" class="form-control" placeholder="Salary" id="salary" value="<?php echo $staffGlobal['salary']; ?>" name="salary" required>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-lg btn-primary" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

            </div>
        </div>

    </div>
</div>
    <?php
}
}