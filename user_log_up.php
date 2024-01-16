<?php  
session_start();
?>
<div class="table-responsive" style="max-height: 500px;"> 
  <table class="table">
    <thead class="table-primary">
      <tr>
        <th class="text-dark">VIEW</th>
        <th class="text-dark">ID</th>
        <th class="text-dark">Name</th>
        <th class="text-dark">Serial Number</th>
        <th class="text-dark">Card UID</th>
        <th class="text-dark">Device Dep</th>
        <th class="text-dark">Date</th>
        <th class="text-dark">Time In</th>
        <th class="text-dark">Time Out</th>
      </tr>
    </thead>
    <tbody class="bg-dark">
      <?php

        //Connect to database
        require 'connectDB.php';
        $searchQuery = " ";
        $Start_date = " ";
        $End_date = " ";
        $Start_time = " ";
        $End_time = " ";
        $Card_sel = " ";

        if (isset($_POST['log_date'])) {
          //Start date filter
          if ($_POST['date_sel_start'] != 0) {
              $Start_date = $_POST['date_sel_start'];
              $_SESSION['searchQuery'] = "checkindate='".$Start_date."'";
          }
          else{
              $Start_date = date("Y-m-d");
              $_SESSION['searchQuery'] = "checkindate='".date("Y-m-d")."'";
          }
          //End date filter
          if ($_POST['date_sel_end'] != 0) {
              $End_date = $_POST['date_sel_end'];
              $_SESSION['searchQuery'] = "checkindate BETWEEN '".$Start_date."' AND '".$End_date."'";
          }
          //Time-In filter
          if ($_POST['time_sel'] == "Time_in") {
            //Start time filter
            if ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] == 0) {
                $Start_time = $_POST['time_sel_start'];
                $_SESSION['searchQuery'] .= " AND timein='".$Start_time."'";
            }
            elseif ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] != 0) {
                $Start_time = $_POST['time_sel_start'];
            }
            //End time filter
            if ($_POST['time_sel_end'] != 0) {
                $End_time = $_POST['time_sel_end'];
                $_SESSION['searchQuery'] .= " AND timein BETWEEN '".$Start_time."' AND '".$End_time."'";
            }
          }
          //Time-out filter
          if ($_POST['time_sel'] == "Time_out") {
            //Start time filter
            if ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] == 0) {
                $Start_time = $_POST['time_sel_start'];
                $_SESSION['searchQuery'] .= " AND timeout='".$Start_time."'";
            }
            elseif ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] != 0) {
                $Start_time = $_POST['time_sel_start'];
            }
            //End time filter
            if ($_POST['time_sel_end'] != 0) {
                $End_time = $_POST['time_sel_end'];
                $_SESSION['searchQuery'] .= " AND timeout BETWEEN '".$Start_time."' AND '".$End_time."'";
            }
          }
          //Card filter
          if ($_POST['card_sel'] != 0) {
              $Card_sel = $_POST['card_sel'];
              $_SESSION['searchQuery'] .= " AND card_uid='".$Card_sel."'";
          }
          //Department filter
          if ($_POST['dev_uid'] != 0) {
              $dev_uid = $_POST['dev_uid'];
              $_SESSION['searchQuery'] .= " AND device_uid='".$dev_uid."'";
          }
        }
        
        if ($_POST['select_date'] == 1) {
            $Start_date = date("Y-m-d");
            $_SESSION['searchQuery'] = "checkindate='".$Start_date."'";
        }

        // $sql = "SELECT * FROM users_logs WHERE checkindate=? AND pic_date BETWEEN ? AND ? ORDER BY id ASC";
        $sql = "SELECT * FROM users_logs WHERE ".$_SESSION['searchQuery']." ORDER BY id DESC";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo '<p class="error">SQL Error</p>';
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if (mysqli_num_rows($resultl) > 0){
                while ($row = mysqli_fetch_assoc($resultl)){
        ?>
                  <TR>
                  <td>
                    <button type="button" class="btn btn-success btn-sm my-0 add-tool" data-id="<?php echo $row['id'];?>" data-username="<?php echo $row['username'];?>"  data-toggle="modal" data-target="#add-tool" <?php if($row['card_out'] == 1){ echo 'disabled'; } ?> >

                    <?php 

                    if($row['card_out'] == 1){
                      echo '<i class="fa fa-lock" aria-hidden="true"></i>';
                    }
                    else{
                      echo '<i class="fa fa-plus" aria-hidden="true"></i>';
                    }
                    
                    ?>

                  </button>
                    <button type="button" name="view_tool" data-id="<?php echo $row['id'];?>" class="btn btn-sm btn-primary view-tools" data-toggle="modal" data-target="#view-tool">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                  </button>
                  <TD><?php echo $row['id'];?></TD>
                  <TD><?php echo $row['username'];?></TD>
                  <TD><?php echo $row['serialnumber'];?></TD>
                  <TD><?php echo $row['card_uid'];?></TD>
                  <TD><?php echo $row['device_dep'];?></TD>
                  <TD><?php echo $row['checkindate'];?></TD>
                  <TD><?php echo $row['timein'];?></TD>
                  <TD><?php echo $row['timeout'];?></TD>
                  </TR>
      <?php
                }
            }
        }
        // echo $sql;
      ?>
    </tbody>
  </table>
</div>