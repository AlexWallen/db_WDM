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

    $app->get('/rainfall/get/{date}', function($request) {
        require_once('db.php');
        $date = $request->getAttribute('date');
        $query = "SELECT r.*, l.latitude, l.longitude FROM Rainfall r, Location l WHERE r.rdate = '$date' AND r.location_id = l.id";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });

    $app->post('/rainfall/add', function($request){
        require_once('db.php');
        $query = "INSERT INTO Rainfall (location_id, amount, normal_amount, rdate) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("idds",$location_id,$amount,$normal_amount,$rdate);
        $location_id = $request->getParsedBody()['location_id'];
        $amount = $request->getParsedBody()['amount'];
        $normal_amount = $request->getParsedBody()['normal_amount'];
        $rdate = $request->getParsedBody()['rdate'];
        $stmt->execute();
    });

    $app->put('/rainfall/edit/{location_id}/{date}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('location_id');
        $date = $request->getAttribute('date');
        $query = "UPDATE Rainfall SET amount = ?, normal_amount = ? WHERE location_id = $get_id AND rdate = '$date'";     
        $stmt = $conn->prepare($query);   
        $stmt->bind_param("dd",$amount,$normal_amount);
        $amount = $request->getParsedBody()['amount'];
        $normal_amount = $request->getParsedBody()['normal_amount'];
        $stmt->execute();
    });

    $app->delete('/rainfall/delete/{location_id}/{date}', function($request){
        require_once('db.php');
        $get_id1 = $request->getAttribute('location_id');
        $date = $request->getAttribute('date');
        $query = "DELETE from Rainfall WHERE location_id = $get_id1 AND rdate = '$date'";
        $result = $conn->query($query);
    });

?>