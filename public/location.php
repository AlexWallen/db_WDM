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

    $app->post('/location/add', function($request, $response){
        require_once('db.php');
        $query = "INSERT INTO Location (latitude, longitude, state, county) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ddss",$lat,$long,$state,$county);
        $lat = $request->getParsedBody()['latitude'];
        $long = $request->getParsedBody()['longitude'];
        $state = $request->getParsedBody()['state'];
        $county = $request->getParsedBody()['county'];
        //$response = $query;      
        $stmt->execute();
        $query = "SELECT * FROM Location WHERE latitude = $lat AND longitude = $long AND state = '$state' AND county = '$county'";
        $result = $conn->query($query) or die($conn->error);
        $response->getBody()->write(json_encode($result->fetch_assoc()));
        return $response;
    });

    $app->put('/location/edit/{location_id}', function($request, $response){
        require_once('db.php');
        $get_id = $request->getAttribute('location_id');
        $query = "UPDATE Location SET latitude = ?, longitude = ?, state = ?, county = ? WHERE id = $get_id";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ddss",$lat,$long,$state,$county);
        $lat = $request->getParsedBody()['latitude'];
        $long = $request->getParsedBody()['longitude'];
        $state = $request->getParsedBody()['state'];
        $county = $request->getParsedBody()['county'];
        $response = $query;      
        $stmt->execute();
        return $response;
    });

    $app->delete('/location/delete/{location_id}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('location_id');
        $query = "DELETE from Location WHERE id = $get_id";
        $result = $conn->query($query);
        $response = $query;      
        $stmt->execute();
        return $response;
    });
?>