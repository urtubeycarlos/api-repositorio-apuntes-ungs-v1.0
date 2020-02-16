<?php

    $app->get('/assignature', function($request, $response){
        $assignatures = \models\AssignatureQuery::create()->find()->toJSON();
        $response->getBody()->write($assignatures);
        return $response;
    });

    $app->get('/assignature/{id}', function($request, $response, $args){
        $id = (int) $args['id'];
        $assignature = \models\AssignatureQuery::create()->findPk($id);
        $assignature = $career->toJSON();
        $response->getBody()->write($assignature);
        return $response;
    });

    $app->post('/assignature', function($request, $response){
        try {    
            $name = $request->getParam('name');
            mkdir( md5($name) );
            echo $name;
        } catch (\Throwable $th) {
            echo $th;
        }
    });

?>