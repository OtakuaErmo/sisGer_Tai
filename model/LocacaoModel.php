<?php

include_once 'Model.php';

class LocacaoModel extends Model {
    
    //setando nome da tabela
    public function __construct()
    {
        Model::setTable("locacao");
    }
}
?>