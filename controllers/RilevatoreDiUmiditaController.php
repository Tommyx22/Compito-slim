<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class RilevatoreDiUmiditaController {

        function stampaUmidita(Request $request, Response $response, $args) {
            $impianto = new Impianto("grande impianto", "47,12", "87,14");
            $rilevatori = $impianto->getRilevatori();
            $arrayUmido = array();
            foreach ($rilevatori as $element) {
                if($element->getUnitaDiMisura() == "%") {
                    array_push($arrayUmido, $element);
                }
            }
            $response->getBody()->write(json_encode($arrayUmido, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type","application/json")->withStatus(200);
        }

        function stampaById(Request $request, Response $response, $args) {
            $impianto = new Impianto("grande impianto", "47,12", "87,14");
            $rilevatori = $impianto->getRilevatori();
            $device = null;
            foreach ($rilevatori as $element) {
                if($element->getUnitaDiMisura() == "%") {
                    if($element->getId() == $args["identificativo"]) {
                        $device = $element;
                        break;
                    }
                }
            }
            $response->getBody()->write(json_encode($device, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type","application/json")->withStatus(200);
        }

        function stampaMisurazioniById(Request $request, Response $response, $args) {
            $impianto = new Impianto("grande impianto", "47,12", "87,14");
            $rilevatori = $impianto->getRilevatori();
            $misurazioni = array();
            foreach ($rilevatori as $element) {
                if($element->getUnitaDiMisura() == "%") {
                    if($element->getId() == $args["identificativo"]) {
                        $misurazioni = $element->getMisurazioni();
                    }
                }
            }
            $response->getBody()->write(json_encode($misurazioni, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type","application/json")->withStatus(200);
        }

        function stampaMisurazioniMaggiori(Request $request, Response $response, $args) {
            $impianto = new Impianto("grande impianto", "47,12", "87,14");
            $rilevatori = $impianto->getRilevatori();
            $misurazioniMag = array();
            foreach ($rilevatori as $element) {
                if($element->getUnitaDiMisura() == "%") {
                    if($element->getId() == $args["identificativo"]) {
                        $misurazioniMag = $element->getMisurazioniMaggiori($args["valore_minimo"]);
                    }
                }
            }
            $response->getBody()->write(json_encode($misurazioniMag, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type","application/json")->withStatus(200);
        }

        function createRilevatore(Request $request, Response $response, $args) {
            $impianto = new Impianto("grande impianto", "47,12", "87,14");

            $body = $request->getBody()->getContents();
            $parseBody = json_decode($body, true);

            $id = $parseBody["id"];
            $unitaDiMisura = $parseBody["unitaDiMisura"];
            $codiceSeriale = $parseBody["codiceSeriale"];
            $posizione = $parseBody["posizione"];

            $rilevatore = new RilevatoreDiUmidita($id, $unitaDiMisura, $codiceSeriale, $posizione);

            $impianto->aggiungiRilevatore($rilevatore);

            return $response->withStatus(201);
        }

        function updateRilevatore(Request $request, Response $response, $args) {

            $body = $request->getBody()->getContents();
            $parseBody = json_decode($body,true);
            $impianto = new Impianto("grande impianto", "47,12", "87,14");
            $rilevatore = $impianto->findById($args["identificativo"]);

            if($rilevatore != null) {
                $rilevatore->setId($parseBody["identificativo"]);
                $rilevatore->setUnitaDiMisura($parseBody["unitadimisura"]);
                $rilevatore->setCodiceSeriale($parseBody["codiceseriale"]);
                //$rilevatore->setTipologia($parseBody[""]);
                return $response->withStatus(200);
            } else {
                return $response->withStatus(404);
            }
            //dovevo finire l'update mancava solo un paio di setter
        }
    }
?>