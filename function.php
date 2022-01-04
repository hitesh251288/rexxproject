<?php
function filterTotal($conn, $empName, $eventName, $eventDate, $filtertotal) {
    $query = "SELECT * from event where employee_name='$empName' AND event_name='$eventName' AND event_date='$eventDate'";
    $result = mysqli_query($conn, $query);
    $filtertotal = 0;
    $srcount = 1;
    while ($row = mysqli_fetch_array($result)) {
        print "<tr>";
        print "<td>".$srcount++."</td>";
        print "<td>" . $row['participation_id'] . "</td>";
        print "<td>" . $row['employee_name'] . "</td>";
        print "<td>" . $row['employee_mail'] . "</td>";
        print "<td>" . $row['event_id'] . "</td>";
        print "<td>" . $row['event_name'] . "</td>";
        print "<td>" . $row['participation_fee'] . "</td>";
        print "<td>" . $row['event_date'] . "</td>";
        print "</tr>";
        $filtertotal += $row['participation_fee'];
    }
    print "<tr>";
    print "<td colspan='6'>Total</td>";
    print "<td>" . $filtertotal . "</td>";
    print "<td></td>";
    print "</tr>";
}

function filtertl($conn, $empName, $eventName, $eventDate, $filtertotal) {
    if ($empName != '' && $eventName != '') {
        $query = "SELECT * from event where employee_name='$empName' AND event_name='$eventName'";
    }
    if ($empName != '' && $eventName == '') {
        $query = "SELECT * from event where employee_name LIKE '$empName%'";
    }
    if ($empName == '' && $eventName != '') {
        $query = "SELECT * from event where event_name LIKE '$eventName%'";
    }
    if ($eventDate != '') {
        $query = "SELECT * from event where event_date='$eventDate'";
    }
    $result = mysqli_query($conn, $query);

    $filtertl = 0;
    $srcnt = 1;
    while ($row = mysqli_fetch_array($result)) {        
        print "<tr>";
        print "<td>".$srcnt++."</td>";
        print "<td>".$row['participation_id']."</td>";
        print "<td>".$row['employee_name']."</td>";
        print "<td>".$row['employee_mail']."</td>";
        print "<td>".$row['event_id']."</td>";
        print "<td>".$row['event_name']."</td>";
        print "<td>".$row['participation_fee']."</td>";
        print "<td>".$row['event_date']."</td>";                    
        print "</tr>";
        $filtertl += $row['participation_fee'];
    }
    print "<tr>";
    print "<td colspan='6'>Total</td>";
    print "<td>" . $filtertl . "</td>";
    print "<td></td>";
    print "</tr>";
}
