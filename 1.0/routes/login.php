<?php

    $app->post('/login', function($request, $response){

        header('Content-Type: application/json');

        $verdi_gutierrez_1 = array(
            'lat' => -34.522412,
            'lon' => -58.702016
        );
    
        $gutierrez_leonsuarez_2 = array(
            'lat' => -34.520444,
            'lon' => -58.699896
        );
    
        $leonsuarez_sarratea_3 = array(
            'lat' => -34.521865,
            'lon' => -58.698207
        );
    
        $verdi_sarratea_4 = array(
            'lat' => -34.523707,
            'lon' => -58.700188
        );
    
        $base = sqrt( pow( $gutierrez_leonsuarez_2['lat'] - $verdi_sarratea_4['lat'], 2) + pow( $gutierrez_leonsuarez_2['lon'] - $verdi_sarratea_4['lon'], 2)   );
        $height = sqrt( pow( $leonsuarez_sarratea_3['lat'] - $verdi_sarratea_4['lat'], 2) + pow( $leonsuarez_sarratea_3['lon'] - $verdi_sarratea_4['lon'], 2)   );

        $lat = $request->getParam('lat');
        $lon = $request->getParam('lon');

        $calculoX = $lat > $verdi_gutierrez_1['lat'] && $lat < $verdi_gutierrez_1+$base;
        $calculoY = $lon > $gutierrez_leonsuarez_2['lon'] && $lon < $gutierrez_leonsuarez_2+$height;

        //$isValid = $calculoX && $calculoY;
        $isValid = True;

        $result = array( 'loged' => true );
        $response->getBody()->write( json_encode($result) );
        return $response;
        
    });