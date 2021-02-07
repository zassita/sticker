<?php
if (isset($_POST['btn_submit'])) {

    //connect to db
    include("dbconnect.php");

    $name = $_POST['name'];
    $phoneno = $_POST['phoneno'];
    $programme = $_POST['programme'];
    $faculty = $_POST['faculty'];
    $matricno = $_POST['matricno'];
    $address = $_POST['address'];
    $drivinglicenseclass = $_POST['licenseclass'];
    $roadtaxenddate = $_POST['roadtax'];
    $carbrand = $_POST['carbrand'];
    $color = $_POST['color'];
    $cylinderpower = $_POST['cylinderpower'];
    $vehicleregistrationno = $_POST['vehicleregistration'];
    $driverslicenseexpirationdate = $_POST['licenseexpiration'];
    // file upload for licence
    if (isset($_FILES['file_licence'])) {
        if ($_FILES['file_licence']['type'] == "application/pdf") {
            $source_file = $_FILES['file_licence']['tmp_name'];
            $file_licence_location = "file/" . $_FILES['file_licence']['name'];

            if (file_exists($file_licence_location)) {
                print "The file name already exists!!";
            } else {
                move_uploaded_file($source_file, $file_licence_location) or die("Error!!");
                if ($_FILES['file_licence']['error'] == 0) {
                    print "Pdf file uploaded successfully!";
                    print "<b><u>Details : </u></b><br/>";
                    print "File Name : " . $_FILES['file_licence']['name'] . "<br.>" . "<br/>";
                    print "File Size : " . $_FILES['file_licence']['size'] . " bytes" . "<br/>";
                    print "File location : file/" . $_FILES['file_licence']['name'] . "<br/>";
                }
            }
        } else {
            if ($_FILES['file_licence']['type'] != "application/pdf") {
                if ($_FILES['file_licence']['error'] == 4) {
                    header('Location: insertcar.php?error=nofile');
                    exit();
                }
                print "Error occured while uploading file : " . $_FILES['file_licence']['name'] . "<br/>";
                print "Invalid  file extension, should be pdf !!" . "<br/>";
                print "Error Code : " . $_FILES['file_licence']['error'] . "<br/>";
            }
        }
    } 
    // file upload for file matric
    if (isset($_FILES['file_matric'])) {
        if ($_FILES['file_matric']['type'] == "application/pdf") {
            $source_file = $_FILES['file_matric']['tmp_name'];
            $file_matric_location = "file/" . $_FILES['file_matric']['name'];

            if (file_exists($file_matric_location)) {
                print "The file name already exists!!";
            } else {
                move_uploaded_file($source_file, $file_matric_location) or die("Error!!");
                if ($_FILES['file_matric']['error'] == 0) {
                    print "Pdf file uploaded successfully!";
                    print "<b><u>Details : </u></b><br/>";
                    print "File Name : " . $_FILES['file_matric']['name'] . "<br.>" . "<br/>";
                    print "File Size : " . $_FILES['file_matric']['size'] . " bytes" . "<br/>";
                    print "File location : file/" . $_FILES['file_matric']['name'] . "<br/>";
                }
            }
        } else {
            if ($_FILES['file_matric']['type'] != "application/pdf") {
                if ($_FILES['file_licence']['error'] == 4) {
                    header('Location: insertcar.php?error=nofile');
                    exit();
                }
                print "Error occured while uploading file : " . $_FILES['file_matric']['name'] . "<br/>";
                print "Invalid  file extension, should be pdf !!" . "<br/>";
                print "Error Code : " . $_FILES['file_matric']['error'] . "<br/>";
            }
        }
    }
    // file upload for file vehicle grant
    if (isset($_FILES['file_vehiclegrant'])) {
        if ($_FILES['file_vehiclegrant']['type'] == "application/pdf") {
            $source_file = $_FILES['file_vehiclegrant']['tmp_name'];
            $file_vehiclegrant_location = "file/" . $_FILES['file_vehiclegrant']['name'];

            if (file_exists($file_vehiclegrant_location)) {
                print "The file name already exists!!";
            } else {
                move_uploaded_file($source_file, $file_vehiclegrant_location) or die("Error!!");
                if ($_FILES['file_vehiclegrant']['error'] == 0) {
                    print "Pdf file uploaded successfully!";
                    print "<b><u>Details : </u></b><br/>";
                    print "File Name : " . $_FILES['file_vehiclegrant']['name'] . "<br.>" . "<br/>";
                    print "File Size : " . $_FILES['file_vehiclegrant']['size'] . " bytes" . "<br/>";
                    print "File location : file/" . $_FILES['file_vehiclegrant']['name'] . "<br/>";
                }
            }
        } else {
            if ($_FILES['file_vehiclegrant']['type'] != "application/pdf") {
                if ($_FILES['file_licence']['error'] == 4) {
                    header('Location: insertcar.php?error=nofile');
                    exit();
                }
                print "Error occured while uploading file : " . $_FILES['file_vehiclegrant']['name'] . "<br/>";
                print "Invalid  file extension, should be pdf !!" . "<br/>";
                print "Error Code : " . $_FILES['file_vehiclegrant']['error'] . "<br/>";
            }
        }
    }
    // file upload for file permision letter
    if (isset($_FILES['file_permisionletter'])) {
        if ($_FILES['file_permisionletter']['type'] == "application/pdf") {
            $source_file = $_FILES['file_permisionletter']['tmp_name'];
            $file_permisionletter_location = "file/" . $_FILES['file_permisionletter']['name'];

            if (file_exists($file_permisionletter_location)) {
                print "The file name already exists!!";
            } else {
                move_uploaded_file($source_file, $file_permisionletter_location) or die("Error!!");
                if ($_FILES['file_permisionletter']['error'] == 0) {
                    print "Pdf file uploaded successfully!";
                    print "<b><u>Details : </u></b><br/>";
                    print "File Name : " . $_FILES['file_permisionletter']['name'] . "<br.>" . "<br/>";
                    print "File Size : " . $_FILES['file_permisionletter']['size'] . " bytes" . "<br/>";
                    print "File location : file/" . $_FILES['file_permisionletter']['name'] . "<br/>";
                }
            }
        } else {
            if ($_FILES['file_permisionletter']['type'] != "application/pdf") {
                if ($_FILES['file_licence']['error'] == 4) {
                    header('Location: insertcar.php?error=nofile');
                    exit();
                }
                print "Error occured while uploading file : " . $_FILES['file_permisionletter']['name'] . "<br/>";
                print "Invalid  file extension, should be pdf !!" . "<br/>";
                print "Error Code : " . $_FILES['file_permisionletter']['error'] . "<br/>";
            }
        }
    }
    //sql command
    $sql = "INSERT INTO vehicle_info(licence_class,matric_number,roadtax,vehicle_brand,color,cc_power,no_plat,licence_expired,file_matric,file_vehiclegrant,file_licence,file_permisionletter) 
			VALUES ('$drivinglicenseclass','$matricno','$roadtaxenddate','$carbrand','$color','$cylinderpower','$vehicleregistrationno','$driverslicenseexpirationdate','$file_licence_location','$file_matric_location','$file_vehiclegrant_location','$file_permisionletter_location') ";

    //execute sql
    $result = mysqli_query($conn, $sql);

    //evaluate the execution
    if ($result == true) {
        echo "The record for $matricno has been saved<br>";

        // get vehicl_id in DB
        $getVehicle_id = mysqli_query($conn, "SELECT * FROM vehicle_info WHERE matric_number = '$matricno'");
        if ($getVehicle_id == true) {

            $record = mysqli_fetch_array($getVehicle_id);
            $vehicle_id=$record['id'];
            // insert into request table inDB
            $sql = "INSERT INTO request_info (matric_number,vehicle_id) VALUES ('$matricno','$vehicle_id') ";
            $result = mysqli_query($conn, $sql);
            
            if ($result == true) {
                echo "The request has been sent";
                header('Location:dash-student.php?success=Successequest');
                exit();
            } else {
                echo "Failed to Insert the request info";
                echo "Mysql error:" . mysqli_error($conn);
            }
            
        }else {
            echo "Failed to find the vehicle id";
            echo "Mysql error:" . mysqli_error($conn);
        }
    } else {
        echo "The record cannot be saved";
        echo "Mysql error:" . mysqli_error($conn);
    }
}
?>