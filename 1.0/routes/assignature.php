<?php

    $app->get('/assignature', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $assignatures = \models\AssignatureQuery::create()->find()->toJSON();
        $response->getBody()->write($assignatures);
        return $response;
    });

    $app->get('/assignature/{id}', function($request, $response, $args){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $id = (int) $args['id'];
        $assignature = \models\AssignatureQuery::create()->findById($id);
        $assignature = $career->toJSON();
        $response->getBody()->write($assignature);
        return $response;
    });

    $app->post('/assignature', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        $name = $request->getParam('name');
        $md5name = md5($name);

        $assignatures = \models\AssignatureQuery::create()->findByName($name);
        if( $assignatures->count() == 0 ){

            $career_id = $request->getParam('carrerid');
            $carrer = \models\CareerQuery::create()->findById($career_id)->getFirst();
            mkdir( "./../../docs/" . $carrer->getMd5Name() . "/" . $md5name);
            
            $assignature = new \models\Assignature();
            $assignature->setName($name);
            $assignature->setMd5Name($md5name);
            $assignature->setCareerId($career_id);
            $assignature->save();
            
            $status = array(
                'status' => 'succes', 
                'description' => 'Assignature created successfully',
                'code' => 201
            );
            $response->getBody()->write($carrers);
    
        }

        return $response;

    });

?>