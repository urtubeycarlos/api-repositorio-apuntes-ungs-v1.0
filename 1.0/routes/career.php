<?php

    require __DIR__ . '/../../vendor/bin/generated-conf/config.php';

    $app->get("/career", function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $careers = \models\CareerQuery::create()->find()->toJSON();
        $response->getBody()->write($careers);
        return $response;
    });

    $app->get('/career/{id}', function($request, $response, $id){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $career = \models\CareerQuery::create()->findById($id)->toJSON();
        $response->getBody()->write($career);
        return $response;
    });

    $app->post('/career', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $name = $request->getParam('name');
        $md5name = md5($name);

        $career = \models\CareerQuery::create()->findByName($name);
        if( $career->count() == 0 ){

            mkdir( "./../../docs/" . $md5name . "/");        
        
            $career = new \models\Career();
            $career->setName($name);
            $career->setMd5Name($md5name);
            $career->save();
            $response->withStatus(201);
            $status = array(
                'status' => 'succes', 
                'description' => 'Career created successfully',
                'code' => 201
            );
            $response->getBody()->write( $status );

        }
        
        return $response;

    });

?>