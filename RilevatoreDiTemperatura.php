<?php

    class RilevatoreDiTemperatura extends Rilevatore implements JsonSerializable {

        public $tipologia = "";
        public $misurazioni = array();

        public function __construct($id, $unitaDiMisura, $codiceSeriale, $tipologia) {
            $this->id = $id;
            $this->unitaDiMisura = $unitaDiMisura;
            $this->codiceSeriale = $codiceSeriale;
            $this->misurazioni = array(
                "11/09/2001" => "32",
                "29/02/2008" => "27"
            );
            $this->tipologia = $tipologia;
        }

        function getTipologia() {
            return $this->tipologia;
        }

        function getMisurazioni() {
            return $this->misurazioni;
        }

        function setTipologia($tipologia) {
            $this->tipologia = $tipologia;
        }

        function setMisurazioni($misurazioni) {
            $this->misurazioni = $misurazioni;
        }

        function getMisurazioniMaggiori($val) {
            
            $mis = array();
            
            foreach($this->misurazioni as $key => $value) {
                if($value > $val) {
                    array_push($mis, $this->misurazioni[$key]);
                }
            }

            return $mis;
        }


        function jsonSerialize() {

            $element = [
                "id"=> $this->id,
                "unità di misura"=> $this->unitaDiMisura,
                "codice seriale"=> $this->codiceSeriale,
                "tipologia"=> $this->tipologia,
            ];

            return $element;

        }

        };
?>