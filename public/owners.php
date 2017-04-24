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

    $app->post('/owners/add', function($request){
        require_once('db.php');
        $query = "INSERT INTO Owners (/*id,*/name,type) VALUES (/*?,*/?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",/*$id,*/$name,$type);
        //$id = $request->getParsedBody()['id'];
        $name = $request->getParsedBody()['name'];
        $type = $request->getParsedBody()['type'];
        $stmt->execute();
    });

    $app->put('/owners/edit/{ownerid}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('ownerid');
        $query = "UPDATE Owners SET name = ?, type = ? WHERE d = $get_id";
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