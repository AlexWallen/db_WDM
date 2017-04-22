<?php
    $app->get('/location/all', function() {
        require_once('db.php');
        $query = "select * from Location";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });
?>