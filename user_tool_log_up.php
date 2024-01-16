<?php  
session_start();
?>
<div class="table-responsive" style="max-height: 500px;"> 
  <table class="table">
    <thead class="table-primary">
      <tr>

        <th class="text-dark">Tool ID</th>
        <th class="text-dark">User Log Id</th>
        <th class="text-dark">Asset Code</th>

      </tr>
    </thead>
    <tbody class="bg-dark">
      <?php

        //Connect to database
        require 'connectDB.php';
        $searchQuery = "";
        $userId = "";
        
          //Start date filter

        $_SESSION['searchQuery'] = "id=".$_POST['userId']."";

        // $sql = "SELECT * FROM users_logs WHERE checkindate=? AND pic_date BETWEEN ? AND ? ORDER BY id ASC";
        //$sql = "SELECT * FROM tool_logs t0 LEFT JOIN tools t1 ON t1.tool_id = t0.tool_id WHERE user_log_id=".$_POST['userId']." ORDER BY tool_id DESC";

        $sql = "SELECT t0.tool_id, t1.tool_name, t0.asset_code FROM tool_logs t0 LEFT JOIN tools t1 ON t1.tool_id = t0.tool_id WHERE user_log_id=".$_POST['userId']." ORDER BY tool_id DESC";

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
                  <TD><?php echo $row['tool_id'];?></TD>
                  <TD><?php echo $row['tool_name'];?></TD>
                  <TD><?php echo $row['asset_code'];?></TD>
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