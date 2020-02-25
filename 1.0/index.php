<?php

header('Access-Control-Allow-Origin: *');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require './../vendor/autoload.php';
require './../vendor/config.php';
require './../vendor/bin/generated-conf/config.php'; //ORM config

$app = new \Slim\App();

require 'routes/career.php';
require 'routes/assignature.php';
require 'routes/note.php';
require 'routes/login.php';

$app->get("/", function($resquest, $response) use($apiVersion, $apiName) {
    $response = $response->withHeader('Content-type', 'application/json; charset=utf-8');
    $documentation = array(
        'welcome' => "Bienvenido a la API para el repositorio de apuntes para la UNGS",
        'urls' => array(
            'GET' => array(
                'api/:versionid/note' => array(
                    'description' => 'Documentos subidos por los usuarios, asociados a una materia.',
                    'example' => "/api/1.0/note",
                ),
                'api/:versionid/note?assignatureid' => array(
                    'description' => 'Documento con subido por un usuario que tenga la materia con el id recibido.',
                    'example' => "/api/1.0/note?assignatureid=15",
                ),
                'api/:versionid/assignature' => array(
                    'description' => 'Espacios curriculares, cada uno asociado a una carrera universitaria.',
                    'example' => "/api/1.0/assignature",
                ),
                'api/:versionid/assignature?careerid' => array(
                    'description' => 'Espacios curricularres asociados a la carrera universitaria con el id recibido.',
                    'example' => "/api/1.0/assignature?careerid=4",
                ),
                'api/:versionid/career' => array(
                    'description' => 'Carreras universitarias.',
                    'example' => "/api/1.0/career",
                ),
                'api/:versionid/career?id' => array(
                    'description' => 'Carrera universitaria que posee el id recibido.',
                    'example' => "/api/1.0/career?id=1",
                )
            ),
            'POST'=> array(
                'api/:versionid/login' => array(
                    'description' => 'Te loguea a la app utilizando geolocalización',
                    'body' => array(
                        'lat' => 'Latitud del dispositivo',
                        'lon' => 'Longitud del dispositivo'
                    )
                )
            )
        ),
        'version' => array(
            'id' => "$apiVersion",
            'name' => "$apiName"
        )
    );

    $response->getBody()->write( json_encode($documentation) );
    return $response;

});


$app->run();

?>