<?php

    require_once "interfaceExibicao.php";
    require_once "classeEntrada.php";

    class Input extends Entrada implements Exibicao{
        public $type;
        public $step=null;
        public $value = null;

        public function __construct($valores){
            $this->type = $valores["type"]; 
            if(isset($valores["step"])){
                $this->step = $valores["step"];
            } 
            
            if(isset($valores["value"])){
                $this->value = $valores["value"];
            } 
            
            parent::__construct($valores);
        }

        public function exibir(){
            echo "<input type='$this->type'
                         name='$this->name'
                         class='$this->class'
                         id='$this->id'";
            if($this->step!=null){
                echo " step='$this->step'";
            }     

            if($this->value!=null){
                echo " value='$this->value'";
            }     

            echo "placeholder='$this->placeholder'  /><br />";
        }
        
    }

?>