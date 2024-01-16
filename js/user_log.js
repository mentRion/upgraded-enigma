$(document).ready(function(){

  // Set Default value

  $('#date_sel_start').val('2023-01-14');
  $('#date_sel_end').val('2024-01-14');
  $(".time_sel:checked").val('Time_in');
  $('#time_sel_start').val('01:00');
  $('#time_sel_end').val('13:00');
  $('#card_sel option:selected').val(0);
  $('#dev_sel option:selected').val(0);

  

  // Get Report passenger
  $(document).on('click', '#user_log', function(){
    
    var date_sel_start = $('#date_sel_start').val();
    var date_sel_end = $('#date_sel_end').val();
    var time_sel = $(".time_sel:checked").val();
    var time_sel_start = $('#time_sel_start').val();
    var time_sel_end = $('#time_sel_end').val();
    var card_sel = $('#card_sel option:selected').val();
    var dev_uid = $('#dev_sel option:selected').val();
    
    $.ajax({
      url: 'user_log_up.php',
      type: 'POST',
      data: {
        'log_date': 1,
        'date_sel_start': date_sel_start,
        'date_sel_end': date_sel_end,
        'time_sel': time_sel,
        'time_sel_start': time_sel_start,
        'time_sel_end': time_sel_end,
        'card_sel': card_sel,
        'dev_uid': dev_uid,
      },
      success: function(response){

        $('.up_info2').fadeIn(500);
        $('.up_info2').text("The Filter has been selected!");

        setTimeout(function () {
            $('.up_info2').fadeOut(500);
        }, 5000);

        $.ajax({
          url: "user_log_up.php",
          type: 'POST',
          data: {
            'log_date': 1,
            'date_sel_start': date_sel_start,
            'date_sel_end': date_sel_end,
            'time_sel': time_sel,
            'time_sel_start': time_sel_start,
            'time_sel_end': time_sel_end,
            'dev_uid': dev_uid,
            'card_sel': card_sel,
            'select_date': 0,
          }
          }).done(function(data) {
          $('#userslog').html(data);
        });
      }
    });
  });


  $(document).on('click', '.view-tools', function(){

    var user_id = $(this).data('id');
    console.log(user_id);
    
    $.ajax({
      url: "user_tool_log_up.php",
      type: 'POST',
      data: {
        'userId': user_id,
      }
      }).done(function(data) {

        $('#viewTools').html(data);
      
    })
      
    
  });


  $(document).on('click', '.add-tool', function(){
    var user_id = $(this).data('id');
    console.log(user_id);
    var user_name = $(this).data('username');
    console.log(user_name);
    $("#user_id").val(user_id)
    $("#user_name").val(user_name)
  });

  $(document).on('click', '#save_tool', function(){

    var user_id = $("#user_id").val();
    var user_name = $("#user_name").val();
    var tool = $("#tool").val();
    var remarks = $("#remarks").val();
    var asset_code = $("#asset_code").val();

    console.log(user_id);
    console.log(user_name);
    console.log(tool);
    console.log(remarks);
    console.log(asset_code);


    $.ajax({
      url: "user_tool_add.php",
      type: 'POST',
      data: {
        'tool_id' : tool,
        'user_id': user_id,
        'remarks' : remarks,
        'asset_code' : asset_code
      }
      }).done(function(data) {

        console.log(data)
      
    })


   
  });

  

});


