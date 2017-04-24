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

    /*$app->put('/rainfall/edit/{rainid}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('location_id');
        $query = "UPDATE Rainfall SET amount = ?, normal_amount = ? time = ? WHERE id = $get_id";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$name,$type);
        $amount = $request->getParsedBody()['amount'];
        $normal_amount = $request->getParsedBody()['normal_amount'];
        $time = $request->getParsedBody()['time'];
        $stmt->execute();
    });

    $app->delete('/rainfall/delete/{ownerid}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('location_id');
        $query = "DELETE from Rainfall WHERE id = $get_id";
        $result = $conn->query($query);
    });*/
?>