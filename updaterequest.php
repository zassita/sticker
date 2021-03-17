<?php session_start();
include("header.php");
include("dbconnect.php");
if (isset($_POST['btn_save'])) {
    $matric_number = $_POST['matricno'];

    $rs = mysqli_query($conn, "UPDATE request_info SET status_id = 2 WHERE matric_number = '$matric_number' ");
    if (mysqli_error($conn)) {
        echo "SQL error :" . mysqli_error($conn);
    }
    $sql = "SELECT request_id from request_info WHERE matric_number = '$matric_number'";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_error($conn)) {
        echo "ERROR:" . mysqli_error($conn);
    }
    $record = mysqli_fetch_array($rs);
    $requestid = $record['request_id'];

    $sql = "INSERT INTO sticker_info (request_id,matric_number,date_approved) VALUES ( '$requestid','$matric_number',NOW() )";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_error($conn)) {
        echo "ERROR:" . mysqli_error($conn);
    }
    echo  "saved";
    exit();
}
$name = $_POST['name'];
$matric_number = $_POST['matric_number'];

$sql = "SELECT id from sticker_info ORDER BY id DESC limit 1";
$rs = mysqli_query($conn, $sql);
$record = mysqli_fetch_array($rs);
$stickerid = $record['id'] + 1;
?>
<div class="col-xl-12 col-lg-12 col-md-9 col-xs-12">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between mb-1">
                <h5 class="m-0  font-weight-bold text-primary">Student information</h5>
            </div>
        </div>

        <div class="card-body">

            <div class="p-2">
                <form method="post" action="updaterequest.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="<?= $name ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Phone">Matric Number</label>
                            <input type="text" class="form-control" id="matricno" name="matricno" placeholder="Matric number" value="<?= $matric_number ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="result">Result</label>
                            <select class="form-control" id="result" name="result" onchange="getserialnumber()">
                                <option value="1" disabled selected>Please Select result</option>
                                <option value="3">Failed</option>
                                <option value="2">Appored</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 d-none" id="stickernumberinput">
                            <label for="licenseexpiration">Serial Number</label>
                            <input type="text" class="form-control" id="no_siri" name="no_siri" value="<?= $stickerid ?>" readonly>
                        </div>
                        <div class="form-group col-md-6 d-none" id="failedreason">
                            <label for="reason">Reason</label>
                            <input type="text" class="form-control" id="reason" name="reason" placeholder="Insert the reason">
                        </div>
                    </div>
                    <input type="submit" class='btn btn-success' name="btn_save" value="Save">
                    <!-- <a href='listapprove.php' class='btn btn-success'>Submit</a> -->

            </div>
        </div>
        </form>
    </div>
</div>
<script>
    function getserialnumber() {
        // get result value
        var e = document.getElementById("result");
        var resultid = e.value;
        console.log(resultid);
        var sticker = document.getElementById("stickernumberinput");
        if (resultid == 2) {
            // sticker.style.display = "block";
            document.getElementById("stickernumberinput").classList.remove('d-none');
            document.getElementById("failedreason").classList.add('d-none');

            document.getElementById("reason").disabled = true;
            document.getElementById("no_siri").disabled = false;
        } else if (resultid == 3) {
            document.getElementById("failedreason").classList.remove('d-none');
            document.getElementById("stickernumberinput").classList.add('d-none');

            document.getElementById("no_siri").disabled = true;
            document.getElementById("reason").disabled = false;


        } else {
            document.getElementById("stickernumberinput").classList.add('d-none');
            document.getElementById("failedreason").classList.add('d-none');
            document.getElementById("no_siri").disabled = true;
            document.getElementById("reason").disabled = true;

        }
    }
</script>
<?php
include("footer.php");
?>