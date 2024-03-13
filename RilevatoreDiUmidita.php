<?php

    class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable {

        public $posizione = "";
        public $misurazioni = array();

        public function __construct($id, $unitaDiMisura, $codiceSeriale, $posizione) {
            $this->id = $id;
            $this->unitaDiMisura = $unitaDiMisura;
            $this->codiceSeriale = $codiceSeriale;
            $this->misurazioni = array(
                "15/06/2005" => "42",
                "06/12/1997" => "56"
            );
            $this->posizione = $posizione;
        }

        function getPosizione() {
            return $this->posizione;
        }

        function getMisurazioni() {
            return $this->misurazioni;
        }

        function setPosizione($posizione) {
            $this->posizione = $posizione;
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
                "posizione"=> $this->posizione,
            ];

            return $element;

        }

        };
?>