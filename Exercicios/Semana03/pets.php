<?php

    include "CadastroAnimal.php";

    $pet01 = new CadastroAnimal();
    $pet02 = new CadastroAnimal();
    $pet03 = new CadastroAnimal();

    $pet01->nome = "Fifi";
    $pet01->peso = 3;
    $pet01->especie = "Cachorro";
    $pet01->raca = "Poodle";
    $pet01->genero = "Fêmea";
    $pet01->data_nasc = "2017-05-05";
    $pet01->dono = "João da Silva";
    $pet01->email = "joao@email.com";

    $pet02->nome = "Frida";
    $pet02->peso = 1;
    $pet02->especie = "Gato";
    $pet02->raca = "Persa";
    $pet02->genero = "Fêmea";
    $pet02->data_nasc = "2019-11-05";
    $pet02->dono = "Penélope Pereira";
    $pet02->email = "penelope@email.com";
    
    $pet03->nome = "Totó";
    $pet03->peso = 9;
    $pet03->especie = "Cachorro";
    $pet03->raca = "Vira-Lata";
    $pet03->genero = "Macho";
    $pet03->data_nasc = "2017-05-15";
    $pet03->dono = "Ricardo Santos";
    $pet03->email = "ricardo@email.como";


    print_r($pet01);
    echo "<br/>";
    print_r($pet02);
    echo "<br/>";
    print_r($pet03);
?>