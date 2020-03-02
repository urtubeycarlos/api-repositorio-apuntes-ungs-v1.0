<?php

    $app->get('/note', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        
        
        $assignature_id = $request->getParam('assignatureid');
        
        if( $assignature_id ){
            
            $assignature = \models\AssignatureQuery::create()
                ->findPk($assignature_id);

            $notes = \models\NoteQuery::create()
                ->filterByAssignature($assignature)
                ->find()
                ->toJSON();
        } else {
            
            $notes = \models\NoteQuery::create()
                ->find()
                ->toJSON();
        }
        
        $response->getBody()->write($notes);
        return $response; 
    });

    $app->post('/note', function($request, $response){

        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        
        $filename = $request->getParam('filename');
        $extension = $request->getParam('extension');
        $description = $request->getParam('description');
        $assignature_id = $request->getParam('assignatureid');
        
        if( !$filename or !$extension or !$description or !$assignature_id ){
            $status = array(
                'status' => 'error', 
                'description' => 'Arguments are empty or invalid',
                'code' => 400
            );
            
            $response->getBody()->write( json_encode($status) );
            return $response;       
        }

        $assignature = \models\AssignatureQuery::create()->findPk($assignature_id);
 
        $md5Assignature = $assignature->getMd5Name();

        $uploadFileDir = "./../../docs/$md5Assignature/";
    
        $newFileName = md5(time() . $filename) . '.' . $extension;
        $dest_path = $uploadFileDir . $newFileName;

        $domain = $_SERVER['HTTP_HOST'];
        $generatedUrl = "http://$domain/docs/$md5Assignature/$newFileName";
        
        $fileTmpPath = $_FILES[$filename]['tmp_name'];

        if( move_uploaded_file($fileTmpPath, $dest_path) ){

            $note = new \models\Note();
            $note->setFilename($filename);
            $note->setExtension($extension);
            $note->setDescription($description);
            $note->setUrl($generatedUrl);
            $note->setAssignature($assignature);
            $note->save();

            $status = array(
                'status' => 'succes', 
                'description' => 'Note uploaded successfully',
                'code' => 201
            );
        } else {
            $status = array(
                'status' => 'error', 
                'description' => 'Failed uploading note',
                'code' => 501
            );    
        }
    
        $response->getBody()->write( json_encode($status) );
        return $response;       
            
    });

?>