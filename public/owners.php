<?php
    $app->get('/owners/all', function() {
        require_once('db.php');
        $query = "select * from Owners";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });

    $app->post('/owners/add', function($request, $response){
        require_once('db.php');
        $query = "INSERT INTO Owners (name,type) VALUES (?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$name,$type);
        $name = $request->getParsedBody()['name'];
        $type = $request->getParsedBody()['type'];
        $stmt->execute();
        return $query;
        $query = "SELECT * FROM Owners WHERE name = '$name' AND type = '$type'";
        $result = $conn->query($query) or die($conn->error);
        if($result) {
            $response->getBody()->write(json_encode($result->fetch_assoc()));
            return $response;    
        } else {
            $result = $stmt->execute();
            $query = "SELECT * FROM Owners WHERE name = '$name' AND type = '$type'";
            $result = $conn->query($query) or die($conn->error);
            // var_dump($result);
            $response->getBody()->write(json_encode($result->fetch_assoc()));
            return $response;
        }
    });

    $app->put('/owners/edit/{ownerid}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('ownerid');
        $query = "UPDATE Owners SET name = ?, type = ? WHERE id = $get_id";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$name,$type);
        $name = $request->getParsedBody()['name'];
        $type = $request->getParsedBody()['type'];
        $stmt->execute();
    });

    $app->delete('/owners/delete/{ownerid}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('ownerid');
        $query = "DELETE from Owners WHERE id = $get_id";
        $result = $conn->query($query);
    });
?>