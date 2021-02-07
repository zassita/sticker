<?php session_start();
//connect to db
include("dbconnect.php");

$matricno = $_SESSION['matric'];
// get student request list
$getprevious = mysqli_query($conn, "SELECT * FROM request_info WHERE matric_number = '$matricno' ");
// check for SQL error
if (mysqli_error($conn)) {
    echo "Error : " . mysqli_error($conn);
    exit();
}

// include "checksession1.php";
//dash-admin.php
include("header.php");
// success handling for searchbox
if (isset($_GET['success'])) {
    if ($_GET['success'] == "Successequest") {
        echo '<div class="alert alert-success" role="alert"> Successfuly applied for the vehicle sticker  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}
?>

<h2>Welcome <?php echo $_SESSION['fullname'] ?></h2>
<!-- <a href="insertcar.php">Fulltime(CAR)</a><br>
<a href="insertmotor.php">FULLTIME(MOTORCYCLE)</a>
<br>
<a href="logout.php">Logout</a><br> -->
<div class="col-xl-12 col-lg-12 col-md-9 col-xs-12">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-1">
                <h5 class="m-0  font-weight-bold text-primary">Request Record</h5>
                <div class="pull-right">
                    <a href="insertcar.php" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Request Sticker</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="p-2">

            </div>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">Matric Number</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($record = mysqli_fetch_array($getprevious)) {
                        ?>


                            <tr>
                                <td><?= $record['status_id'] ?></td>
                                <td><?= $record['matric_number'] ?> </td>
                                <td>View </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- close table responsive -->
            </div>


        </div>
    </div>
</div>
<?php
include("footer.php");
?>