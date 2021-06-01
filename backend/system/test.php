
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script>
  $( function() {
  var todaydt = new Date();
    $("#txt_date_fr").datepicker({
                autoclose: true,
                    dateFormat: "dd/mm/yy",
                    endDate: todaydt,
                onSelect: function (date) {
                   //Get selected date 
                    var date2 = $('#txt_date_fr').datepicker('getDate');
                    //sets minDate to txt_date_to
                    $('#txt_date_to').datepicker('option', 'minDate', date2);
                }
            });
            $('#txt_date_to').datepicker({
                dateFormat: "dd/mm/yy",
                
            });
  } );
  </script>
</head>
<body>
 From<input type="text" id="txt_date_fr" />
  TO
  <input type="text" id="txt_date_to" />
