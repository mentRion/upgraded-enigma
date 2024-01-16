<div class="table-responsive-sm" style="max-height: 870px;">
  <table class="table">
    <thead class="table-primary">
      <tr>
        <th class="text-dark">Card UID</th>
        <th class="text-dark">Name</th>
        <th class="text-dark">Gender</th>
        <th class="text-dark">Email</th>
        <th class="text-dark">Contact</th>
        <th class="text-dark">S.No</th>
        <th class="text-dark">Date</th>
        <th class="text-dark">Department</th>
      </tr>
    </thead>
    <tbody class="bg-dark">
      <?php
      //Connect to database
      require 'connectDB.php';

      $sql = "SELECT * FROM users ORDER BY id DESC";
      $result = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($result, $sql)) {
        echo '<p class="error">SQL Error</p>';
      } else {
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if (mysqli_num_rows($resultl) > 0) {
          while ($row = mysqli_fetch_assoc($resultl)) {
      ?>
            <TR>
              <TD>
                <form>
                <button type="button" class="badge badge-primary select_btn" id="<?php echo $card_uid; ?>" title="select this UID">
                <?php
                  if ($row['card_select'] == 1) {
                    echo "<span><i class='glyphicon glyphicon-ok' title='The selected UID'></i></span>";
                  }
                  $card_uid = $row['card_uid'];
                  ?>  
                  <?php echo $card_uid; ?>
                </button>

                </form>
              </TD>
              <TD><?php echo $row['username']; ?></TD>
              <TD><?php echo $row['gender']; ?></TD>
              <TD><?php echo $row['email']; ?></TD>
              <TD><?php echo $row['contact_number']; ?></TD>
              <TD><?php echo $row['serialnumber']; ?></TD>
              <TD><?php echo $row['user_date']; ?></TD>
              <TD><?php echo ($row['device_dep'] == "0") ? "All" : $row['device_dep']; ?></TD>
            </TR>

      <?php
          }
        }
      }
      ?>
    </tbody>
  </table>
</div>