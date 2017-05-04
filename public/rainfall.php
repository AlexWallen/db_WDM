<?php

    $app->get('/rainfall/all', function() {
        require_once('db.php');
        $query = "select * from Rainfall";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });

    $app->post('/rainfall/add', function($request){
        require_once('db.php');
        $query = "INSERT INTO Rainfall (location_id, amount, normal_amount, rtime) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("idds",$location_id,$amount,$normal_amount,$rtime);
        $location_id = $request->getParsedBody()['location_id'];
        $amount = $request->getParsedBody()['amount'];
        $normal_amount = $request->getParsedBody()['normal_amount'];
        $rtime = $request->getParsedBody()['rtime'];
        $stmt->execute();
    });

    $app->put('/rainfall/edit/{location_id}/{date}/{time}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('location_id');
        $date = $request->getAttribute('date');
        $time = $request->getAttribute('time');
        $get_id2 = "{$date} {$time}";      
        $query = "UPDATE Rainfall SET amount = ?, normal_amount = ? WHERE location_id = $get_id AND rtime = '$get_id2'";     
        $stmt = $conn->prepare($query);   
        $stmt->bind_param("dd",$amount,$normal_amount);
        $amount = $request->getParsedBody()['amount'];
        $normal_amount = $request->getParsedBody()['normal_amount'];
        $stmt->execute();
    });

    $app->delete('/rainfall/delete/{location_id}/{date}/{time}', function($request){
        require_once('db.php');
        $get_id1 = $request->getAttribute('location_id');
        $date = $request->getAttribute('date');
        $time = $request->getAttribute('time');
        $get_id2 = "{$date} {$time}";
        $query = "DELETE from Rainfall WHERE location_id = $get_id1 AND rtime = '$get_id2'";
        $result = $conn->query($query);
    });

?>