<?php
    require_once "interfaceTabela.php";

    class Th implements ExibicaoTabela{
        public $th;

        public function __construct($ths){
            $this->th = $ths;
        }

        public function exibir(){
            echo"<tr>";
                foreach($this->th as $i=>$t){
                    echo"<th>$t</th>";
                }
                echo"<th cosplan='2'><th>";
            echo"</tr>";
        }
    }
?>