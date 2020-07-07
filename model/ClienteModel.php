<?php

include_once 'Model.php';

class ClienteModel extends Model {
    
    //setando nome da tabela
    public function __construct()
    {
        Model::setTable("cliente");
    }
}
?>