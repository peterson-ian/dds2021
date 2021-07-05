<?php

    require_once "classeInput.php";

    class InputTextual extends Input{        
        
        public function exibir(){
            echo "<input type='$this->type' 
                         name='$this->name'
                         class='$this->class'
                         id='$this->id'
                         placeholder='$this->placeholder' />
                         
                "; 
        }

    }

?>