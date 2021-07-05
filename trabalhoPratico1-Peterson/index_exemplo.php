<?php

    require_once "classesFormulario/classeSelect.php";

    $v["name"]="uf";

    $ol["label_select"] = "::Selecione a UF::";

    $options[0]["value"]="MG";
    $options[0]["label_option"]="Minas Gerais";
    $options[1]["value"]="SC";
    $options[1]["label_option"]="Santa Catarina";
    $options[2]["value"]="SP";
    $options[2]["label_option"]="São Paulo";

    $s = new Select($v,$ol,$options);

    $s->exibir();

?>