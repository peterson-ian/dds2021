<?php
    require_once "interfaceTabela.php";
    class Th implements ExibicaoTabela{
        public $th; //nome das colunas, é um vetor
        public $tabela; //serve p/ criar condiçoes da regra de negocio

        public function __construct($ths, $tabela){
            $this->th = $ths;
            $this->tabela = $tabela;
        }

        public function exibir(){
            echo"<tr>";
                // Laço de controle, que depende do tamanho do vetor 
                foreach($this->th as $i=>$t){
                    // Pego o nome da coluna e insiro ele em um elemento
                    echo"<th>$t</th>";
                }
                // Aqui eu crio condições de acordo com a regra de negocio
                if($_SESSION["perfil"] =="1" || 
                    $_SESSION["perfil"] =="2" && $this->tabela == "FUNCAO" || 
                    $_SESSION["perfil"] =="2" && $this->tabela == "FUNCIONARIO" ||
                    $_SESSION["perfil"] =="3" && $this->tabela == "FUNCIONARIO"
                ){
                    // Cria uma coluna que tera dois elementos que vai ser os botoes de alterar e remover
                    echo"<th cosplan='2'><th>";
                }
            echo"</tr>";
        }
    }
?>