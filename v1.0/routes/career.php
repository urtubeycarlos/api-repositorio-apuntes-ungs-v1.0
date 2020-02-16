<?php

    $app->get('/career', function($request, $response){
        try {
            $careers = \models\CareerQuery::create()->find()->toJSON();
            $response->getBody()->write($careers);
            return $response;
        } catch (\Throwable $th) {
            echo $th;
        }
        
    });

    $app->get('/career/:id', function($request, $response, $args){
        $name = (int) $args['id'];
        $career = \models\CareerQuery::create()->findById($id);
        $career = $career->toJSON();
        $response->getBody()->write($career);
        return $response;
    });

    $app->post('/career', function($request, $response){
        
        $name = $request->getParam('name');

        $career = \models\CareerQuery::create()->findByName($name);
        if( $career->count() == 0 ){

            mkdir( "./../../docs/" . md5($name) . "/");        
        
            $career = new \models\Career();
            $career->setName($name);
            $career->save();

        }

        return $response;

    });

?>