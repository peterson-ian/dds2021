<?php


     class Entrada{
        public $name;
        public $class;
        public $id;
        public $placeholder;


        public function __construct($valores){
            
            $this->name = $valores["name"];
            if(isset( $valores["class"]))
                $this->class = $valores["class"];
            if(isset( $valores["id"]))
                $this->id = $valores["id"];
            if(isset( $valores["placeholder"]))
                $this->placeholder = $valores["placeholder"];
        }


    }


?>