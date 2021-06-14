<?php

    require_once "classeEntrada.php";

    class Input extends Entrada{
        public $type;
        public $step=null;

        public function __construct($valores){
            $this->type = $valores["type"]; 
            if(isset($valores["step"])){
                $this->step = $valores["step"];
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

            echo "placeholder='$this->placeholder'  /><br />";
        }
        
    }

?>