<?php

    $app->get('/assignature', function($request, $response){
        $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');

        $career_id = (int) $request->getParam('careerid');
        
        if( $career_id ){
            
            $carrer = \models\CareerQuery::create()
                ->findPk($career_id);
    
            $assignatures = \models\AssignatureQuery::create()
                ->filterByCareer($carrer)
                ->find()
                ->toJSON();
            
        } else {
         
            $assignatures = \models\AssignatureQuery::create()
                ->find()
                ->toJSON();
            
        }

        $response->getBody()->write($assignatures);
        return $response;
        
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
    
                    $career = \models\CareerQuery::create()
                            ->filterById($career_id)
                            ->findOne();
    
                    $assignature = \models\AssignatureQuery::create()
                            ->filterByName($name)
                            ->findOne();
    
                    if( $assignature ){
                        
                        $assignature->addCareer($career);
                        $assignature->save();

                        $status = array(
                            'status' => 'succes', 
                            'description' => 'Assignature linked again successfully',
                            'code' => 201
                        );
    
                    } else {
                        
                        $md5name = md5($name);
                        
                        

                        mkdir( "./../../docs/" . $md5name);
                        
                        $assignature = new \models\Assignature();
                        $assignature->setName($name);
                        $assignature->setMd5Name($md5name);
                        $assignature->addCareer($career);
                        $career->addAssignature($assignature);
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