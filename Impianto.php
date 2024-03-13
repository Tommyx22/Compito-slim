<?php

    class Impianto implements JsonSerializable {


        private $nome = "";
        private $latitudine = "";
        private $longitudine = "";
        private $rilevatori = array();
        function __construct($nome, $latitudine, $longitudine) {
            $this->nome = $nome;
            $this->latitudine = $latitudine;
            $this->longitudine = $longitudine;
            $this->rilevatori = array(
                new RilevatoreDiUmidita(1, "%", 542, "terra"),
                new RilevatoreDiUmidita(2, "%", 647, "aria"),
                new RilevatoreDiTemperatura(3, "C", 123, "acqua"),
                new RilevatoreDiTemperatura(4, "C", 873, "aria")
            );
        }

        function getRilevatori() {
            return $this->rilevatori;
        }

        function aggiungiRilevatore($rilevatore) {
            array_push($this->rilevatori, $rilevatore);
        }

        function findById($id) {
            $rilevatore = null;

            foreach($this->rilevatori as $e) {
                if($id == $e->getId()) {
                    $rilevatore = new Rilevatore($e->getId(),$e->getUnitaDiMisura(),$e->getCodiceSeriale());
                    break;
                }
            }
            
            return $rilevatore;
        }

        public function jsonSerialize() {
            $element = [

                "nome"=>$this->nome,
                "latitudine"=>$this->latitudine,
                "longitudine"=>$this->longitudine
            ];

            return $element;
        }

    }


?>