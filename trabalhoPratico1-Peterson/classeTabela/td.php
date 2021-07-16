<?php
    require_once "interfaceTabela.php";

    class Td implements ExibicaoTabela{
        public $id;
        public $titulo;
        public $name_td;
        public $valores;

        public function __construct($titulo, $tds, $name_td)
        {
            $this->titulo = $titulo;
            $this->name_td = $name_td;
            $this->tds = $tds;
        }

        public function exibir(){
            foreach($this->tds as $i=>$t){
                $this->id = $t[0];
                $id_tr = strtolower($this->titulo);
                echo"<tr id='$id_tr$this->id'>";
                    foreach($this->name_td as $i2=>$t2){
                        $name_id = str_replace(' ', '_', $t2);
                        $id_td = strtolower($name_id);
                        echo"<td id='$id_td$this->id'>$t[$i2]</td>";
                    }
                    echo"<td><button value='$this->id' class='remover'>Deletar</button></td>
                        <td><button value='$this->id' class='alterar'>Alterar</button>
                            <button value='$this->id' class='alterando' style='display: none;'>Alterar</button>
                        </td>";
                echo"</tr>";
            }
        }

    }
?>