<?php

    /* use Slim\Http\UploadedFile as UploadedFile; */ 

    $app->get('/note', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $notes = \models\NoteQuery::create()->find()->toJSON();
        $response->getBody()->write($notes);
        return $response;
    });

    $app->get('/note/{id}', function($request, $response, $id){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $note = \models\NoteQuery::create()->findById($id)->toJSON();
        $response->getBody()->write($note);
        return $response;
    });

    $app->post('/note', function($request, $response){
        
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        
        $filename = $request->getParam('filename');
        $extension = $request->getParam('extension');
        $description = $request->getParam('description');
        $assignature_id = $request->getParam('assignatureid');
        $career_id = $request->getParam('careerid');
        
        $assignature = \models\AssignatureQuery::create()->findById($assignature_id)->getFirst();
        $carrer = \models\CareerQuery::create()->findById($career_id)->getFirst();

        $md5Career = $carrer->getMd5Name();
        $md5Assignature = $assignature->getMd5Name();


        $uploadFileDir = "./../../docs/$md5Career/$md5Assignature/";
        
        $newFileName = md5(time() . $filename) . '.' . $extension;
        $dest_path = $uploadFileDir . $newFileName;

        $domain = $_SERVER['HTTP_HOST'];
        $generatedUrl = "http://$domain/docs/$md5Career/$md5Assignature/$newFileName";
        
        $fileTmpPath = $_FILES[$filename]['tmp_name'];
        
        move_uploaded_file($fileTmpPath, $dest_path);

        $note = new \models\Note();
        $note->setFilename($filename);
        $note->setExtension($extension);
        $note->setDescription($description);
        $note->setUrl($generatedUrl);
        $note->setAssignatureId($assignature_id);
        $note->save();

        $status = array(
            'status' => 'succes', 
            'description' => 'Career created successfully',
            'code' => 201
        );
        $response->getBody()->write( $status );

        return $response;
    });

?>