<?php
    $app->get('/wells/all', function() {
        require_once('db.php');
        $query = "select * from Wells";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });
?>