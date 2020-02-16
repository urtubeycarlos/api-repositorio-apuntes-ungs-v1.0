<?php

    /* use Slim\Http\UploadedFile as UploadedFile; */ 

    $app->get('/note', function($request, $response){
        $notes = \models\AssignatureQuery::create()->find();
        $response->getBody()->write($notes);
        return $response;
    });

    $app->get('/note/{assignature_id}', function($request, $response, $args){
        $assignature_id = (int) $args['assignature_id'];
        $note = \models\AssignatureQuery::create()->findByAssignatureId($assignature_id)->toJSON();
        $response->getBody()->write($note);
        return $response;
    });

    $app->post('/note', function($request, $response){
        
        /* $filename = $request.getParam('filename');
        $extension = $request.getParam('extension');
        $description = $request.getParam('description');
        $assignature_id = $request.getParam('assignatureid'); */

        try {
            var_dump( $_FILES );
            $fileTmpPath = $_FILES['descarga']['tmp_name'];
            $fileName = $_FILES['descarga']['name'];
            $fileExtension = strtolower( end(explode(".", $fileName)) );
            $uploadFileDir = "./../../docs/" . md5(1) . "/";
            var_dump($uploadFileDir);
            $dest_path = $uploadFileDir . $fileName;
            $result = move_uploaded_file($fileTmpPath, $dest_path);
            var_dump($result);
            /* $directory = "http://localhost/docs";
            $uploadedFiles = $request->getUploadedFiles();
            $generated_url = moveUploadedFile($directory, $uploadedFiles['descarga']);
            var_dump($generated_url); */
        } catch (\Throwable $th) {
            echo $th;
        }
        
        
/*         $note = new \models\Note();
        $note->setFilename(  );
        $note->setExtension(  );
        $note->setDescription(  );
        $note->setUrl( $generated_url );
        $note->setAssignatureId(  ); */

    });

    function moveUploadedFile($directory, $uploadedFile){
        
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }

?>