<?php
    include "../include/connect.php";

    $query1 = $connect;

    if (!$connect) {
        die("Database connection failure: " . mysqli_connect_error());
    }

    // Get value from SESSION
    $appointment_id = isset($_SESSION['appointment_id']) ? $_SESSION['appointment_id'] : '';
    // Clear the value in the SESSION to prevent it from remaining on the next access
    unset($_SESSION['appointment_id']);

    // Fetch appointment details based on the appointment_id
    $query2 = "SELECT * FROM appointment WHERE appointment_id = $appointment_id";
    $result = mysqli_query($query1, $query2);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <style type="text/css">
        .row2{
            padding-left: 0.3rem;
            padding-right: 0.3rem;
            overflow-y: auto;
            overflow-x: hidden;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(1.6rem + 5px);
            border-radius: 0px;
            line-height: 1.0;
            font-size: 12px;
        }
        form{
            margin-top: 5px;
        }
        table{
            margin-bottom: 5px;
        }
        .btn{
            font-size: 12px;
            font-weight: 900;
            font-family: 'Century Gothic';
        }
        .subtitle{
            font-size: 12px;
            font-weight: 900;
            font-family: 'Century Gothic';
        }
        #show_1{
            margin-top:10px;
            width: 70%;
        }
        #show_2{
            margin-top:10px;
            width: 70%;
        }
    </style>
</head>
<body>
<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-2 px-2" style="background-color: white;">
    <div class="row row2">
        <div class="col-12 title">
            <b>EDIT APPOINTMENTS</b>
        </div>

        <div id = "show_1">
            <form id="edit-form" action="../module/edit_appointment/edit.php" method="GET" enctype="multipart/form-data">
                <div class="col-12" style="border-bottom-style: groove;">
                    <table width="50%">
                        <tr>
                            <td class="subtitle" width="14%">
                                CUSTOMER NAME
                            </td>    
                            <td width="30%">
                                <select name="customer_name" style="width:100%;" required>
                                    <option value="">Select Customer</option>
                                    <?php
                                    $queryCus = "SELECT name FROM customer";
                                    $result = mysqli_query($query1, $queryCus);
                                    while ($cus_row = mysqli_fetch_assoc($result)) {
                                        $selected = ($cus_row['name'] == $row['customer_name']) ? 'selected' : '';
                                        echo "<option value='" . $cus_row['name'] . "' $selected>" . $cus_row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="subtitle" width="14%">
                                VEHICLE PLATE NO.
                            </td>
                            <td width="30%">
                                <select name="plate_no" style="width:100%;" required>
                                    <option value="">Select Vehicle</option>
                                    <?php
                                    $queryVeh = "SELECT plate_no FROM vehicle";
                                    $result = mysqli_query($query1, $queryVeh);
                                    while ($veh_row = mysqli_fetch_assoc($result)) {
                                        $selected = ($veh_row['plate_no'] == $row['plate_no']) ? 'selected' : '';
                                        echo "<option value='" . $veh_row['plate_no'] . "' $selected>" . $veh_row['plate_no'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="subtitle" width="14%">
                                SERVICE TYPE
                            </td>
                            <td width="30%">
                                <select name="service_type" style="width:100%;" required>
                                    <option value="">Select Service</option>
                                    <?php
                                    $querySer = "SELECT service_type FROM service";
                                    $result = mysqli_query($query1, $querySer);
                                    while ($ser_row = mysqli_fetch_assoc($result)) {
                                        $selected = ($ser_row['service_type'] == $row['service_type']) ? 'selected' : '';
                                        echo "<option value='" . $ser_row['service_type'] . "' $selected>" . $ser_row['service_type'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="subtitle" width="14%">
                                PRE-ASSIGN MECHANIC
                            </td>
                            <td width="30%">
                                <select name="pre_assign_mechanic" style="width:100%;" required>
                                    <option value="">Select Pre-assign Mechanic</option>
                                    <?php
                                    $queryMec = "SELECT staff_name FROM staff";
                                    $result = mysqli_query($query1, $queryMec);
                                    while ($mec_row = mysqli_fetch_assoc($result)) {
                                        $selected = ($mec_row['staff_name'] == $row['pre_assign_mechanic']) ? 'selected' : '';
                                        echo "<option value='" . $mec_row['staff_name'] . "' $selected>" . $mec_row['staff_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="subtitle" width="14%">
                                PRE-ASSIGN PARTS
                            </td>
                            <td width="30%">
                                <select name="pre_assign_parts" style="width:100%;" required>
                                    <option value="">Select Pre-assign Parts</option>
                                    <?php
                                    $queryPart = "SELECT item_name FROM parts";
                                    $result = mysqli_query($query1, $queryPart);
                                    while ($part_row = mysqli_fetch_assoc($result)) {
                                        $selected = ($part_row['item_name'] == $row['pre_assign_parts']) ? 'selected' : '';
                                        echo "<option value='" . $part_row['item_name'] . "' $selected>" . $part_row['item_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="subtitle" width="14%">
                                REMARKS
                            </td>
                            <td width="30%">
                                <input type="text" name="remarks" style="width:100%;" value="<?php echo $row['remarks']; ?>">
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="subtitle" width="14%">
                                DATE
                            </td>
                            <td width="30%">
                                <input type="date" name="date" id="date" value="<?php echo $row['date']; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="subtitle" width="14%">
                                TIME
                            </td>
                            <td width="30%">
                                <input type="time" name="time" id="time" value="<?php echo $row['time']; ?>">
                            </td>
                        </tr>
                        
                    </table>
                
                </div>
                <div class="col-12" style="margin-top: 5px;">
                    <input type="hidden" name="appointmentId" value="<?php echo $appointment_id; ?>">
                    <input type="Submit" name="Submit" class="btn btn-green" value="SAVE">&nbsp;
                    <a type="button" class="btn btn-green" href="#" onclick="discardForm()" style="background-color: red;">DISCARD</a>&nbsp;
                </div>
            </form>
        </div>
        
    </div>
</main>
<script>
    function show(no){
        
        document.getElementById("show_"+no).style.display = "block";
        document.getElementById(no).style.background = "#008ae6";
        document.getElementById("show_"+((no==1)?2:1)).style.display = "none";
        document.getElementById(((no==1)?2:1)).style.background = "#cccccc";
    }
    
    document.getElementById("1").click();

    // Add a hidden field to store the selected time in the format HH:MM:SS
    document.getElementById("time").addEventListener("change", function() {
        var timeInput = this.value;
        // If the time format does not include seconds, add the seconds manually
        if (timeInput.split(':').length === 2) {
            timeInput += ':00'; // Add Seconds
        }
        // Assign the selected time value to the hidden field
        document.getElementById("hiddenTime").value = timeInput;
    });

    function discardForm() {
        location.reload();
    }
    
</script>
</body>
</html>
