<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Calendar</title>
    <link href="jquery-ui.min.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>
</head>
<body>
    <h2>This is the Administrator Calendar<h2>
    <a href="adminindex.php">Home</a>
    <a href="admincal.php">Schedule an Appointment</a>
    <a href="index.php">Log Out</a>
    <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>
        <input type="date" id="datepicker" class="datepicker" min= <?php echo date('Y-m-d'); ?> />
    </form>
</body>
</html>