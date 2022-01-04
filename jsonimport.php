<?php
require 'database.php';
if (isset($_POST['buttomImport'])) {
    copy($_FILES['jsonFile']['tmp_name'], 'jsonFiles/' . $_FILES['jsonFile']['name']);
    $data = file_get_contents('jsonFiles/' . $_FILES['jsonFile']['name']);
    $events = json_decode($data);
    foreach ($events as $event) { 
        $query = 'insert into event(participation_id, employee_name, employee_mail, '
                . 'event_id,event_name,participation_fee,event_date)values(' . $event->participation_id . ', '
                . '"' . $event->employee_name . '", "' . $event->employee_mail . '", ' . $event->event_id . ', '
                . '"' . $event->event_name . '", "' . $event->participation_fee . '","' . $event->event_date . '")';
        $result = mysqli_query($conn, $query);        
    }
    if($result){
        header("Location: index.php?status=1");
    }else{
        header("Location: index.php?status=0");
    }
}

if (isset($_POST['export'])) {
    $query = "SELECT * FROM event";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $jsonData[] = $row;
    }
    $time = time();
    $fp = fopen('jsonFiles/' .'eventdata'.$time.'.json', 'w');
    fwrite($fp, json_encode($jsonData));
    fclose($fp);

    mysqli_close($conn);
    header("Location: index.php?msg=1");
}