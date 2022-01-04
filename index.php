<?php
error_reporting(E_ALL);
require 'database.php';
require 'function.php';
?>
<html>
    <head>
        <title>Import JSON File</title>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
    <body>
        <form method="post" enctype="multipart/form-data" action="jsonimport.php">
            JSON File  <input type="file" name="jsonFile">
            <input type="submit" value="Import" name="buttomImport">
        </form>
        <form method="post" action="">
            <input type="text" name="empName" value="" placeholder="Enter Employee Name"/>
            <input type="text" name="eventName" value="" placeholder="Enter Event Name"/>
            <input type="date" name="eventDate" value="" placeholder="Enter Event Date"/>
            <input type="submit" name="filter" value="Filter" />
        </form>        
        <form method="post" action="jsonimport.php">
            <input type="submit" name="export" value="Export" />
        </form>
        <table id="example" class="display" style="width:100%">
            <?php 
            if(isset($_GET['status'])==1){
                echo "<center>Data Imported Successfully.</center>";
                $url="index.php";
                header("Refresh: 5; URL=$url");
            }
            if($_GET['msg']==1){
                echo "<center>Data Exported Successfully.</center>";
                $url="index.php";
                header("Refresh: 5; URL=$url");
            }
            ?>
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Participation ID</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Participation Fee</th>
                    <th>Event Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['filter'])) {
                    if ($_POST['empName'] != '') {
                        $empName = $_POST['empName'];
                    } else {
                        $empName = '';
                    }
                    if ($_POST['eventName'] != '') {
                        $eventName = $_POST['eventName'];
                    } else {
                        $eventName = '';
                    }
                    if ($_POST['eventDate'] != '') {
                        $eventDate = $_POST['eventDate'];
                    } else {
                        $eventDate = '';
                    }
                    if ($_POST['empName'] != '' && $_POST['eventName'] != '' && $_POST['eventDate'] != '') {
                        filterTotal($conn, $empName, $eventName, $eventDate, $filtertotal);
                    } else {
                        filtertl($conn, $empName, $eventName, $eventDate, $filtertotal);
                    }
                } else {
                    $query = "SELECT * From event";
                    $result = mysqli_query($conn, $query);
                    $total = 0;
                    $srno = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        print "<tr>";
                        print "<td>".$srno++."</td>";
                        print "<td>" . $row['participation_id'] . "</td>";
                        print "<td>" . $row['employee_name'] . "</td>";
                        print "<td>" . $row['employee_mail'] . "</td>";
                        print "<td>" . $row['event_id'] . "</td>";
                        print "<td>" . $row['event_name'] . "</td>";
                        print "<td>" . $row['participation_fee'] . "</td>";
                        print "<td>" . $row['event_date'] . "</td>";
                        print "</tr>";
                        $total += $row['participation_fee'];
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Sr No.</th>
                    <th>Participation ID</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Participation Fee</th>
                    <th>Event Date</th>
                </tr>
            </tfoot>
            <tr>
                <td colspan="6"><?php if ($total) { echo "Total"; } ?></td>
                <td><?php if ($total) { echo $total; } ?></td>
                <td></td>
            </tr>
        </table>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    searching: false,
                });
            });
        </script>
    </body>
</html>

