<?php

    $app->get("/career", function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        
        $id = $request->getParam('id');
    
        if( $id ){
            $careers = \models\CareerQuery::create()
                ->findPk($id)
                ->toJSON();
        } else {
            
            $careers = \models\CareerQuery::create()
                ->find()
                ->toJSON();
        }
        

        $response->getBody()->write($careers);
        return $response;
    });

    $app->post('/career', function($request, $response){
        
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');

        try {
            $name = $request->getParam('name');
        if( !$name ){

            $status = array(
                'status' => 'error', 
                'description' => 'Argument name is empty or invalid',
                'code' => 400
            );

        } else {
            
            $careers = \models\CareerQuery::create()->findByName($name);

            if( $careers->count() == 0 ){

                $md5name = md5($name);
                mkdir( "./../../docs/" . $md5name . "/");        
            
                $career = new \models\Career();
                $career->setName($name);
                $career->setMd5Name($md5name);
                $career->save();
                $response->withStatus(201);
                $status = array(
                    'status' => 'success', 
                    'description' => 'Career created successfully',
                    'code' => 201
                );

            } else {
                $status = array(
                    'status' => 'success', 
                    'description' => 'Career already exists',
                    'code' => 200
                );
            }

        }
        
        $response->getBody()->write( json_encode($status) );
        return $response; 
        } catch (\Throwable $th) {
            echo $th;
        }
        

    });

?>