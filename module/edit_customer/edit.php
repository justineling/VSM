<?php
include "../../include/connect.php";

$query1 = $connect;

if (isset($_POST["Submit"])) {
    $customer_id = $_POST['customerId'];
    //echo "Received customer_id: " . $customer_id; // Add this line for debugging

    $account_code = mysqli_real_escape_string($query1, $_POST['account_code']);
    $name = mysqli_real_escape_string($query1, $_POST['name']);
    $ic = mysqli_real_escape_string($query1, $_POST['ic']);
    $contact = mysqli_real_escape_string($query1, $_POST['contact']);
    $email = mysqli_real_escape_string($query1, $_POST['email']);
    $address = mysqli_real_escape_string($query1, $_POST['address']);
    $remarks = mysqli_real_escape_string($query1, $_POST['remarks']);

    $nickname = mysqli_real_escape_string($query1,$_POST['nickname']); 
	$type = mysqli_real_escape_string($query1,$_POST['type']);
	$outstanding = mysqli_real_escape_string($query1,$_POST['outstanding']); 
	$plate_no = mysqli_real_escape_string($query1,$_POST['plate_no']); 
	$status = mysqli_real_escape_string($query1,$_POST['status']); 

    // Vehicle ID
	$queryVeh = "SELECT vehicle_id FROM vehicle WHERE plate_no = '$plate_no'";
	$resultVeh = mysqli_query($query1, $queryVeh);
	$rowVeh = mysqli_fetch_assoc($resultVeh);
	$vehicle_id = $rowVeh['vehicle_id'];
	// End of Vehicle ID

    $query2 = "UPDATE customer SET name='$name', account_code='$account_code', ic='$ic', email='$email', remarks='$remarks', personal_contact='$contact', address='$address', 
                nickname='$nickname', type ='$type', outstanding='$outstanding', vehicle_id ='$vehicle_id', status='$status'
                WHERE customer_id='$customer_id'";

    if (mysqli_query($query1, $query2)) {

        $last_id = mysqli_insert_id($query1);

        $target_dir = "../../include/uploads/";

        $name1 = basename($_FILES["documents"]["name"]);
        $file_name = $last_id . '_' . $name1;

        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {

            $check = getimagesize($_FILES["documents"]["tmp_name"]);
            if ($check !== false) {

                $uploadOk = 1;
            } else {

                $uploadOk = 0;
            }
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

            $uploadOk = 0;
        }

        if ($uploadOk == 1) {

            move_uploaded_file($_FILES["documents"]["tmp_name"], $target_file);

            $query3 = "UPDATE customer SET uploaded_ic='$file_name' WHERE customer_id=$last_id";

            if (mysqli_query($query1, $query3)) {
            }
        }
        echo "<script>window.location='../../main/mainIndex.php?page=customer'</script>";
    }
} elseif (isset($_POST["submit1"])) {

    $com_type = $_POST['com_type'];
    $account_code = mysqli_real_escape_string($query1, $_POST['account_code']);
    $company_name = mysqli_real_escape_string($query1, $_POST['company_name']);
    $department = mysqli_real_escape_string($query1, $_POST['department']);
    $address = mysqli_real_escape_string($query1, $_POST['address']);
    $contact_office = mysqli_real_escape_string($query1, $_POST['contact_office']);
    $fax_office = mysqli_real_escape_string($query1, $_POST['fax_office']);
    $email_company = mysqli_real_escape_string($query1, $_POST['email_company']);
    $website = mysqli_real_escape_string($query1, $_POST['website']);
    $name = mysqli_real_escape_string($query1, $_POST['name']);
    $ic = mysqli_real_escape_string($query1, $_POST['ic']);
    $contact = mysqli_real_escape_string($query1, $_POST['contact']);
    $email = mysqli_real_escape_string($query1, $_POST['email']);
    $remarks = mysqli_real_escape_string($query1, $_POST['remarks']);

    $query4 = "UPDATE customer SET company_name='$company_name', account_code='$account_code', ic='$ic', email='$email_company', remarks='$remarks', personal_contact='$contact', personal_email='$email', department='$department', office_contact='$contact_office', office_fax='$fax_office', address='$address', government_private='$com_type', website='$website' WHERE customer_id=$customer_id";

    if (mysqli_query($query1, $query4)) {
        $last_id = mysqli_insert_id($query1);

        $target_dir = "../../include/uploads/";

        $name1 = basename($_FILES["documents"]["name"]);

        $file_name = $last_id . '_' . $name1;

        $target_file = $target_dir . $file_name;
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["documents"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            move_uploaded_file($_FILES["documents"]["tmp_name"], $target_file);

            $query5 = "UPDATE customer SET uploaded_ic='$file_name' WHERE customer_id=$last_id";

            if (mysqli_query($query1, $query5)) {
            }
        }
        echo "<script>window.location='../../main/mainIndex.php?page=customer'</script>";
    } else {
        echo 'Error updating customer: ' . mysqli_error($query1);
    }
} else {
    echo 'Error: No data submitted';
}
?>