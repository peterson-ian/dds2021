<?php

    require_once "classeOption.php";
    require_once "interfaceExibicao.php";

    class Select implements Exibicao{
        public $name;
        public $id;
        public $class;
        public $optionLabel;
        public $options;

        public function __construct($valores,$opt_label,$opts){
            $this->name= $valores["name"];
            if(isset($valores["id"])){
                $this->id= $valores["id"];
            }
            if(isset($valores["class"])){
                $this->class= $valores["class"];
            }
            $this->optionLabel = new Option($opt_label);

            if(!empty($opts)){
                foreach($opts as $i=>$vetor_opt){
                    $this->options[] = new Option($vetor_opt);
                }
            }

        }

        public function exibir(){
            echo "<select name='$this->name' ";
            if($this->id!=null){
                echo "id='$this->id' ";
            }
            if($this->class!=null){
                echo "class='$this->class' ";
            }
            echo ">";
            $this->optionLabel->exibir();

            foreach($this->options as $i=>$o){
                $o->exibir();
            }

            echo "</select>";
        }
    }

?>