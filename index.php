<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/ImpiantoController.php';
require __DIR__ . '/controllers/RilevatoreDiUmiditaController.php';
require __DIR__ . '/controllers/RilevatoreDiTemperaturaController.php';

include("Impianto.php");
include("Rilevatore.php");
include("RilevatoreDiUmidita.php");
include("RilevatoreDiTemperatura.php");

$app = AppFactory::create();

$app->get('/impianto', 'ImpiantoController:index');
$app->get('/rilevatori_di_umidita', 'RilevatoreDiUmiditaController:stampaUmidita');
$app->get('/rilevatori_di_umidita/{identificativo}', 'RilevatoreDiUmiditaController:stampaById');
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni', 'RilevatoreDiUmiditaController:stampaMisurazioniById');
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'RilevatoreDiUmiditaController:stampaMisurazioniMaggiori');
$app->post('/rilevatori_di_umidita', 'RilevatoreDiUmiditaController:createRilevatore');
$app->put('/rilevatori_di_umidita/{identificativo}', 'RilevatoreDiUmiditaController:updateRilevatore');

$app->get('/rilevatori_di_temperatura', 'RilevatoreDiTemperaturaController:stampaTemperatura');
$app->get('/rilevatori_di_temperatura/{identificativo}', 'RilevatoreDiTemperaturaController:stampaById');
$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni', 'RilevatoreDiTemperaturaController:stampaMisurazioniById');
$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', 'RilevatoreDiTemperaturaController:stampaMisurazioniMaggiori');
$app->post('/rilevatori_di_temperatura', 'RilevatoreDiTemperaturaController:createRilevatore');
$app->put('/rilevatori_di_temperatura/{identificativo}', 'RilevatoreDiTemperaturaController:updateRilevatore');

$app->run();
