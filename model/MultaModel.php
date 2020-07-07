<?php

include_once 'Model.php';

class MultaModel extends Model {
    
    //setando nome da tabela
    public function __construct()
    {
        Model::setTable("multa");
    }
}
?>