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

    $app->post('/wells/add', function($request){
        require_once('db.php');
        $query = "INSERT INTO Wells (well_id, aquifer_code, type_code, owner_id, location_id, pump_type, usage, bottom_elevation, top_elevation, water_elevation, casing_id, diameter, top_depth, bottom_depth, remarks) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isiissdddiddds",$aquifer_code, $type_code, $owner_id, $location_id, $pump_type, $usage, $bottom_elevation, $top_elevation, $water_elevation, $casing_id, $diameter, $top_depth, $bottom_depth, $remarks);
        $well_id = $request->getParsedBody()['well_id'];
        $aquifer_code = $request->getParsedBody()['aquifer_code'];
        $type_code = $request->getParsedBody()['type_code'];
        $owner_id = $request->getParsedBody()['owner_id'];
        $location_id = $request->getParsedBody()['location_id'];
        $pump_type = $request->getParsedBody()['pump_type'];
        $usage = $request->getParsedBody()['usage'];
        $bottom_elevation = $request->getParsedBody()['bottom_elevation'];
        $top_elevation = $request->getParsedBody()['top_elevation'];
        $water_elevation = $request->getParsedBody()['water_elevation'];
        $casing_id = $request->getParsedBody()['casing_id'];
        $diameter = $request->getParsedBody()['diameter'];
        $top_depth = $request->getParsedBody()['top_depth'];
        $bottom_depth = $request->getParsedBody()['bottom_depth'];
        $remarks = $request->getParsedBody()['remarks'];
        $stmt->execute();
    });

    $app->put('/wells/edit/{well_id}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('well_id');
        $query = "UPDATE Wells SET aquifer_code = ?, type_code = ?, owner_id = ?, location_id = ?, pump_type = ?, usage = ?, bottom_elevation = ?, top_elevation = ?, water_elevation = ?, casing_id = ?, diameter = ?, top_depth = ?, bottom_depth = ?, remarks = ? WHERE well_id = $get_id";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isiissdddiddds",$aquifer_code, $type_code, $owner_id, $location_id, $pump_type, $usage, $bottom_elevation, $top_elevation, $water_elevation, $casing_id, $diameter, $top_depth, $bottom_depth, $remarks);
        $aquifer_code = $request->getParsedBody()['aquifer_code'];
        $type_code = $request->getParsedBody()['type_code'];
        $owner_id = $request->getParsedBody()['owner_id'];
        $location_id = $request->getParsedBody()['location_id'];
        $pump_type = $request->getParsedBody()['pump_type'];
        $usage = $request->getParsedBody()['usage'];
        $bottom_elevation = $request->getParsedBody()['bottom_elevation'];
        $top_elevation = $request->getParsedBody()['top_elevation'];
        $water_elevation = $request->getParsedBody()['water_elevation'];
        $casing_id = $request->getParsedBody()['casing_id'];
        $diameter = $request->getParsedBody()['diameter'];
        $top_depth = $request->getParsedBody()['top_depth'];
        $bottom_depth = $request->getParsedBody()['bottom_depth'];
        $remarks = $request->getParsedBody()['remarks'];
        $stmt->execute();
    });

    $app->delete('/wells/delete/{well_id}', function($request){
        require_once('db.php');
        $get_id = $request->getAttribute('well_id');
        $query = "DELETE from Wells WHERE well_id = $get_id";
        $result = $conn->query($query);
    });
?>