<?php 
    include("../../include/dbconnection.php");
    $q = $_POST['id'];
    $user =$_POST['b'];

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>

<style type="text/css">
    .table td, .table th {
        padding: .45rem;
        font-size: 12px;
        text-align: center;
    }
</style>

<form action="../module/setting/user_access_action.php" method="post">
    <table id="access" class="table" style="width:55%">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAME</th>
                <th>ADD</th>
                <th>EDIT</th>
                <th>VIEW</th>
                <th>FULL ACCESS</th>
            </tr>
        </thead>
        <tbody style="height:130px; overflow: auto;">
            <?php
                $i = 0;
                $sql = "SELECT * FROM fwms_user_access WHERE jobtitle_id = '".$q."'";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $acces_q = mysqli_query($con, "SELECT * FROM fwms_module WHERE id = '".$row['module_id']."'");
                    $access_dtl = mysqli_fetch_assoc($acces_q);
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo strtoupper($access_dtl['name']); ?><input type="hidden" name="access_row_id_<?php echo $i; ?>" id="access_row_id_<?php echo $i; ?>" value="<?php echo $row['id']; ?>">
                </td>
                <td>
                    <div class="checkbox">
                        <input type="checkbox" value="1" onchange="accessChecked('<?php echo $i; ?>')" name='f_add_<?php echo $i; ?>' id="f_add_<?php echo $i; ?>" <?php if($row['f_add']== '1' ) { echo 'checked'; } ?>>
                    </div>
                </td>
                <td>
                    <div class="checkbox">
                        <input type="checkbox" value="1" onchange="accessChecked('<?php echo $i; ?>')"  name='f_edit_<?php echo $i; ?>' id="f_edit_<?php echo $i; ?>"  <?php if($row['f_edit']== '1' ) { echo 'checked'; } ?>>
                    </div>
                </td>
                <td>
                    <div class="checkbox"><input type="checkbox" value="1" onchange="accessChecked('<?php echo $i; ?>')"  name='f_view_<?php echo $i; ?>' id="f_view_<?php echo $i; ?>"  <?php if($row['f_view']== '1' ) { echo 'checked'; } ?>>
                    </div>
                </td>
                <td>
                    <div class="checkbox">
                        <input type="checkbox" value="1" onchange="fullAccess('<?php echo $i; ?>')" name='full_<?php echo $i; ?>' id="full_<?php echo $i; ?>" <?php if( $row['f_add']== '1' && $row['f_edit']== '1' && $row['f_view']== '1') { echo 'checked'; } ?>>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <input type="hidden" name="counter" id="counter" value="<?php echo $i; ?>">
        </tbody>
    </table>
    <?php 
        $sql = "Select access_level from fwms_users where activation_email = '$user'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        $access_id = $row['access_level'];
        mysqli_free_result($result);

        $sql1 = "Select * from fwms_user_access where jobtitle_id = '$access_id'";
        $result1 = mysqli_query($con, $sql1);
        $access_array = array();
        while($row1 = mysqli_fetch_assoc($result1)){
            $tempArray = array();
            array_push($tempArray, $row1['f_add']);
            array_push($tempArray, $row1['f_edit']);
            array_push($tempArray, $row1['f_view']);
            array_push($access_array, $tempArray);
        }
        mysqli_free_result($result1);
        if($access_array[11][0] == 1 || $access_array[11][1] == 1){
        ?>
    <div style="border-top: solid 1px #000; padding: 10px;">
        <input type="submit" style="float:right;" class="btn btn-green" name="save" id ="save" value="SAVE">
    </div>
    <?php } ?>
</form>

