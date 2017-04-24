<?php
    $app->get('/recordings/all', function() {
        require_once('db.php');
        $query = "select * from Recordings";
        $result = $conn->query($query) or die($conn->error);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    });

    $app->post('/recordings/add', function($request){
        require_once('db.php');
        $query = "INSERT INTO Recordings (transducer_id, temperature, conductivity, pressure, salinity, tds, recording_time) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iddddds", $transducer_id, $temperature, $conductivity, $pressure, $salinity, $tds, $recording_time);
        $transducer_id = $request->getParsedBody()['transducer_id'];
        $temperature = $request->getParsedBody()['temperature'];
        $conductivity = $request->getParsedBody()['conductivity'];
        $pressure = $request->getParsedBody()['pressure'];
        $salinity = $request->getParsedBody()['salinity'];
        $tds = $request->getParsedBody()['tds'];
        $recording_time = $request->getParsedBody()['recording_time'];
        $stmt->execute();
    });

    $app->put('/recordings/edit/{transducer_id}/{date}/{time}', function($request){
        require_once('db.php');
        $get_id1 = $request->getAttribute('transducer_id');
        $date = $request->getAttribute('date');
        $time = $request->getAttribute('time');
        $get_id2 = "{$date} {$time}";
        $query = "UPDATE Recordings SET temperature = ?, conductivity = ?, pressure = ?, salinity = ?, tds = ? WHERE transducer_id = $get_id1 AND recording_time = '$get_id2'";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ddddd", $temperature, $conductivity, $pressure, $salinity, $tds);
        $temperature = $request->getParsedBody()['temperature'];
        $conductivity = $request->getParsedBody()['conductivity'];
        $pressure = $request->getParsedBody()['pressure'];
        $salinity = $request->getParsedBody()['salinity'];
        $tds = $request->getParsedBody()['tds'];
        $stmt->execute();
    });

    $app->delete('/recordings/delete/{transducer_id}/{date}/{time}', function($request, $response){
        require_once('db.php');
        $get_id1 = $request->getAttribute('transducer_id');
        $date = $request->getAttribute('date');
        $time = $request->getAttribute('time');
        $get_id2 = "{$date} {$time}";
        $query = "DELETE from Recordings WHERE transducer_id = $get_id1 AND recording_time = '$get_id2'";
        $result = $conn->query($query);
        $response = $query;
        return $response;
    });
?>