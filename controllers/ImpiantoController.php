<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class ImpiantoController {

        function index(Request $request, Response $response, $args) {
            $impianto = new Impianto("grande impianto", "47,12", "87,14");
            $response->getBody()->write(json_encode($impianto, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type","application/json")->withStatus(200);
        }
    }

    
?>