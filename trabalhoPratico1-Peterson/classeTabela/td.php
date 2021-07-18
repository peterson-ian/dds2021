<?php
    require_once "interfaceTabela.php";

    class Td implements ExibicaoTabela{
        public $id; //serve para identificar o elemento, tornar ele unico
        public $titulo; //serve pra indentificar a linha, tornar ela unica
        public $name_td; //serve melhor identificaçao do elemento
        public $valores; //serve p/ preencher os elementos das colunas 

        public function __construct($titulo, $tds, $name_td)
        {
            $this->titulo = $titulo;
            $this->name_td = $name_td;
            $this->tds = $tds;
        }

        public function exibir(){
            // Laço que controla quantas vezes ira rodar, depende de quantas tuplas tem
            foreach($this->tds as $i=>$t){
                $this->id = $t[0]; // Pego o id cada vez que rodar
                $id_tr = strtolower($this->titulo); // Pega o titulo e deixa em minusculo

                // Aqui definimos um identificador unico que é o titulo + id da linha
                echo"<tr id='$id_tr$this->id'>";
                    // Laço que controla quantas vezes ira rodar, depende das colunas da tabela
                    foreach($this->name_td as $i2=>$t2){ 
                        $name_id = str_replace(' ', '_', $t2); // Garanto que nao ha espaço no nome da coluna, para nao haver problema no css
                        $id_td = strtolower($name_id); // E faço ele ficar em minusculo
                        
                        // Crio um identificador unico com o nome da coluna + id
                        echo"<td id='$id_td$this->id'>$t[$i2]</td>";
                    }
                    
                    // Aqui eu crio condições p/ aparecer a opçao de remover e atualizar os dados 
                    // As condições vao de acordo com a regra de negocio do sistema
                    if($_SESSION["perfil"] =="1" || 
                        $_SESSION["perfil"] =="2" && $this->titulo == "FUNCAO" || 
                        $_SESSION["perfil"] =="2" && $this->titulo == "FUNCIONARIO" ||
                        $_SESSION["perfil"] =="3" && $this->titulo == "FUNCIONARIO"
                    ){
                        echo"<td><button value='$this->id' class='remover'>Deletar</button></td>
                            <td><button value='$this->id' class='alterar'>Alterar</button>
                                <button value='$this->id' class='alterando' style='display: none;'>Alterar</button>
                            </td>";
                    }
                echo"</tr>";
            }
        }

    }
?>