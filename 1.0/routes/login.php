<?php

    $app->post('/login', function($request, $response){
        $lat = $request->getParam('lat');
        echo $lat;
    });