<?php

    $app->get('/assignature', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');

        $assignatures = \models\AssignatureQuery::create()
            ->find()
            ->toJSON();

        $response->getBody()->write($assignatures);
        return $response;
    });

    $app->get('/assignature/{career_id}', function($request, $response, $career_id){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');

        try {
            $carrer = \models\AssignatureQuery::create()
                ->filterById($career_id)
                ->find();   
        
            $assignatures = \models\AssignatureQuery::create()
                ->filterByCareer($carrer)
                ->find()
                ->toJSON();
            
            $response->getBody()->write($assignatures);
            return $response;

        } catch (\Throwable $th) {
            echo $th;
        }
        
    });

    $app->post('/assignature', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
        
        $name = $request->getParam('name');

        if( !$name ){
            $status = array(
                'status' => 'error', 
                'description' => 'Argument name is empty or invalid',
                'code' => 400
            );
        } else {

            try {
                $career_id = $request->getParam('careerid');
                if( $career_id == null ){
                    $status = array(
                        'status' => 'error', 
                        'description' => 'Argument careerid is empty or invalid',
                        'code' => 400
                    );
                } else {
    
                    $assignatures = \models\AssignatureQuery::create()->findByName($name);
    
                    if( $assignatures->count() == 0 ){
    
                        $md5name = md5($name);
                        
                        $carrer = \models\CareerQuery::create()
                            ->filterById($career_id)
                            ->findOne();

                        mkdir( "./../../docs/" . $carrer->getMd5Name() . "/" . $md5name);
                        
                        $assignature = new \models\Assignature();
                        $assignature->setName($name);
                        $assignature->setMd5Name($md5name);
                        $assignature->addCareer($carrer);
                        $carrer->addAssignature($assignature);
                        $assignature->save();
                        
                        $status = array(
                            'status' => 'succes', 
                            'description' => 'Assignature created successfully',
                            'code' => 201
                        ); 
                    }          
    
                }
            } catch (\Throwable $th) {
                echo $th;
            }
           

        
        }

        $response->getBody()->write( json_encode($status) );
        return $response;

    });

?>