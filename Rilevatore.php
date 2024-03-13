<?php

    class Rilevatore {

        public $id;
        public $unitaDiMisura;
        public $codiceSeriale;

        public function __construct($id, $unitaDiMisura, $codiceSeriale) {
            $this->id = $id;
            $this->unitaDiMisura = $unitaDiMisura;
            $this->codiceSeriale = $codiceSeriale;
        }

        function getCodiceSeriale() {
            return $this->codiceSeriale;
        }


        function getUnitaDiMisura() {
            return $this->unitaDiMisura;
        }

        function getId () {
            return $this->id;
    
        }

        function setId ($id) {
            $this->id = $id;
        }

        function setUnitaDiMisura ($unitaDiMisura) {
            $this->unitaDiMisura = $unitaDiMisura;
        }

        function setCodiceSeriale ($codiceSeriale) {   
            $this->codiceSeriale = $codiceSeriale;
        }
    }
?>