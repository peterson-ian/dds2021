<?php
    require_once "interfaceExibicao.php";
    
    class Option implements Exibicao{
        public $value;
        public $label_option;
        public $label_select;

        public function __construct($valores){
            if(isset($valores["value"])){
                $this->value=$valores["value"];
            }            
            if(isset($valores["label_option"])){
                $this->label_option=$valores["label_option"];
            }   
            if(isset($valores["label_select"])){
                $this->label_select=$valores["label_select"];
            }                       
        }

        public function exibir(){
            echo "<option ";
            if($this->label_select!=null){
                echo "value='-1'>$this->label_select</option>";
            }
            else {
                if($this->value!=null){
                    echo "value='$this->value'";
                }
                echo ">$this->label_option</option>";
            }
        }

    }

?>