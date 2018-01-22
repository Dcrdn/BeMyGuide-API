<?php

use Illuminate\Database\Capsule\Manager as DB;

$app->post('/city', function ($request, $response) {
    $data = $request->getParsedBody();
    $id=$data['id'];
    $ans= Models\Lugar::getCity($id);
    $result['city']=$ans->nombre;
    $result['id']=$id;    
    return $response->withJson($result, 201);
});

$app->post('/id', function ($request, $response) {
    $data = $request->getParsedBody();
    $city=$data['city'];
    $ans= Models\Lugar::getId($city);
    $result['id']=$ans->id;
    $result['city']=$city;
    return $response->withJson($result, 201);
});

$app->get('/hello/{name}/{school}', function ($request, $response, array $args) {
    $name = $args['name'];
    $school=$args['school'];
    $response->getBody()->write("Hello ".$name." you study at ".$school);

    return $response;
});

$app->get('/diego', function ($request, $response) {
    $response->getBody()->write("Hola Diego");
    return $response;
});