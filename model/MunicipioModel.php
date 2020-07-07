<?php

include_once 'Model.php';

class MunicipioModel extends Model {

    //setando nome da tabela
    public function __construct()
    {
        Model::setTable("municipio");
    }
}
?>