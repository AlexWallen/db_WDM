<?php
    $app->get('/transducers/all', function() {
        require_once('db.php');
        $query = "select * from Transducers";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });

    $app->post('/transducers/add', function($request){
        require_once('db.php');
        $query = "INSERT INTO Transducers (name, type, well_id) VALUES (?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $name, $type, $well_id);
        $name = $request->getParsedBody()['name'];
        $type = $request->getParsedBody()['type'];
        $well_id = $request->getParsedBody()['well_id'];
        $stmt->execute();
    });

    $app->put('/transducers/edit/{id}', function($request){
        require_once('db.php');
        $get_id1 = $request->getAttribute('id');
        $query = "UPDATE Transducers SET name = ?, type = ?, well_id = ? WHERE id = $get_id1 AND recording_time = $get_id2";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $name, $type, $well_id);
        $name = $request->getParsedBody()['name'];
        $type = $request->getParsedBody()['type'];
        $well_id = $request->getParsedBody()['well_id'];
        $stmt->execute();
    });

    $app->delete('/transducers/delete/{id}', function($request, $response){
        require_once('db.php');
        $get_id1 = $request->getAttribute('id');
        $query = "DELETE from Transducers WHERE transducer_id = $get_id1 AND recording_time = '$get_id2'";
        $result = $conn->query($query);
        $response = $query;
        return $response;
    });
?>