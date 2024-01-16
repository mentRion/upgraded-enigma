<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/favicon.png">

  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="css/Users.css">
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
</head>

<body class="bg-dark text-white">

<?php include 'nav-top-header.php'; ?>

  <main>

    <section class="container-lg py-lg-5">
      <?php include 'header.php'; ?>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

          <div class="card bg-dark-500 mb-2">
            <div class="card-body bg-dark-500 window">

            <div class="text-left mb-3">
						<a href="tools.php" class="btn btn-primary">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>
						</a>
						</div>

              <div class="table-responsive slideInRight animated" style="max-height: 400px;">
                <table class="table">
                  <thead class="table-primary">
                    <tr>
                    <th class="text-dark">#</th>
                      <!-- <th class="text-dark">Log ID:</th> -->
                      <!-- <th class="text-dark">Username:</th> -->
                      <th class="text-dark">Tool Name:</th>
                      <!-- <th class="text-dark">Username:</th> -->
                      <th class="text-dark">Log Count:</th>
                      <!-- <th class="text-dark">Asset Code</th> -->
                      <th class="text-dark">Remarks:</th>
                      
                    </tr>
                  </thead>
                  <tbody class="bg-dark">
                    <?php
                    //Connect to database
                    require 'connectDB.php';

                    // $sql = "SELECT t0.id, t0.tool_id, t1.tool_name, t2.username, t0.remarks, t0.asset_code FROM tool_logs t0 
                    //         left JOIN tools t1 on t1.tool_id = t0.tool_id 
                    //         left join users_logs t2 on t2.id = t0.user_log_id";
                    
                    // $sql = "SELECT t0.user_log_id, t2.username, t1.tool_id, t1.tool_name, count(t1.tool_id) log_count 
                    //       FROM tool_logs t0 
                    //       left join tools t1 on t1.tool_id = t0.tool_id 
                    //       left JOIN users_logs t2 on t2.id = t0.user_log_id 
                    //       GROUP by t2.username, t1.tool_id ORDER BY 
                    //       user_log_id DESC";

                    $sql = "SELECT t1.tool_id, t1.tool_name, count(t1.tool_id) log_count, t1.remarks
                          FROM tool_logs t0 
                          left join tools t1 on t1.tool_id = t0.tool_id 
                          left JOIN users_logs t2 on t2.id = t0.user_log_id 
                          GROUP by t2.username, t1.tool_id, t1.remarks";

                    //details
                    // SELECT t0.user_log_id, t2.username, t1.tool_id, t1.tool_name, t0.remarks, t0.asset_code 
                    // FROM tool_logs t0 
                    // LEFT JOIN tools t1 on t1.tool_id = t0.tool_id 
                    // left JOIN users_logs t2 on t2.id = t0.user_log_id 
                    // where t0.user_log_id = 14 and t1.tool_id = 1
                    
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
                            <td>
                            <button type="button" class="btn btn-primary tool_log_viewer" data-toolid="<?php echo $row['tool_id']; ?>" data-toggle="modal" data-target="#tool_logs">
                              View
                            </button>
                            </td>
                          <!--<TD>
                           <i class="fa fa-circle" aria-hidden="true"></i>
                            <?php echo $row['user_log_id']; ?>
                          </TD> -->
                            <!-- <TD class="font-weight-bold"><?php echo $row['username']; ?></TD> -->
                            <!-- <TD><?php echo $row['tool_id']; ?></TD> -->
                            <TD><?php echo $row['tool_name']; ?></TD>
                            <TD><?php echo $row['log_count']; ?></TD>
                            <TD><?php echo $row['remarks']; ?></TD>
                            <!-- <TD class="font-weight-bold"><?php echo $row['asset_code']; ?></TD> -->
                          </TR>
                    <?php
                        }
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>

          <div class="row g-0">
        <div class="col-sm-3">
          <div class="card bg-dark-500 mb-2 h-100">
            <div class="card-body">
            <?php include 'footer.php'; ?>
            </div>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="card bg-dark-500 mb-2 h-100">
            <div class="card-body">
            In the dynamic and safety-critical world of aviation, tool room security and management are paramount. Introducing a revolutionary solution that elevates tool room security to unprecedented levels while streamlining inventory management processes: the integration of Radio Frequency Identification (RFID) technology with the Avionics Inventory System (AIS).
            </div>
          </div>
        </div>
      </div>

        </div>
      </div>
    </section>


    <div class="modal fade" id="tool_logs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tool Logs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-dark-500">
      <div id="user_tools"></div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
        
      </div>
    </div>
  </div>
</div>


<script>

$(document).ready(function(){
  // Add user
  $(document).on('click', '.tool_log_viewer', function(){

    var tool_id = $(this).data('toolid');
    console.log(tool_id)
    
    $.ajax({
      url: "tool_log_up.php",
      type: 'POST',
      data: {
        'tool_id': tool_id,
      }
      }).done(function(data) {

        $('#user_tools').html(data);
      
    })

  })
});

</script>


  </main>
</body>

</html>