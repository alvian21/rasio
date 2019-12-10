<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Document</title>
</head>
<body>
        <form method="post" action="{{Route('test')}}">
                @csrf
                <table align="center">
                    <tr>
                        <td><strong><?php echo $result; ?><strong></td>
                    </tr>
                    <tr>
                        <td>Enter 1st Number</td>
                        <td><input type="text" name="n1"></td>
                    </tr>

                    <tr>
                        <td>Enter 2nd Number</td>
                        <td><input type="text" name="n2"></td>
                    </tr>

                    <tr>
                            <input type="text" id="Start" name="start" min="2000-03" required>
                            <input type="text" id="End" name="start" min="2000-03" required>
                    </tr>
                    <tr>
                        <td>Select Oprator</td>
                        <td><select name="op">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                        </select></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="                =                "></td>
                    </tr>

                </table>
                </form>
<script>
var onDateSelect = function(selectedDate, input) {
  if (input.id === 'Start') {
   //getting start date
    var start = $('#Start').datepicker("getDate");
    console.log("start - "+start);
    //setting it has mindate
    $("#End").datepicker('option', 'minDate', start);
  } else if(input.id === 'End'){
   //getting end date
    var end = $('#End').datepicker("getDate");
    console.log("end - "+end);
    //passing it max date in start
    $("#Start").datepicker('option', 'maxDate', end);
  }
};
var onDocumentReady = function() {
  var datepickerConfiguration = {
    onSelect: onDateSelect,
    dateFormat: "mm/yy",
  };
  ///--- Component Binding ---///
  $('#Start, #End').datepicker(datepickerConfiguration);

};
$(onDocumentReady); 
</script>
</body>
</html>

