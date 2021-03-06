<?php

require_once (__DIR__."/../domain/Historia.php");

class HistoriaDao
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    function listaHistoria()
    {
        $arrays = array();
        $resultado = mysqli_query($this->conexao, 
        "select h.*, p.nome as nome from Historia as h join Pessoa as p on p.ra=h.ra");
        while ($array = mysqli_fetch_assoc($resultado)) {
            array_push($arrays, $array);
        }
        return $arrays;
    }
    function countHistoria()
    {
        $arrays = array();
        $resultado = mysqli_query($this->conexao, "select idHistoria, COUNT(*) as total
                from Historia group by idHistoria");
        while ($array = mysqli_fetch_assoc($resultado)) {
            array_push($arrays, $array);
        }
        return $arrays;
    }

    function insereHistoria(Historia $historia)
    {
        $query = "insert into Historia (idHistoria, gostaria, ra, objetivo)values ('{$historia->getIdHistoria()}', '{$historia->getgostariaHistoria()}', '{$historia->getRa()}', '{$historia->getobjetivoHistoria()}')";   
        return mysqli_query($this->conexao, $query);
    }

    function alteraHistoria($idHistoria, $historia)
    {
        $query = "update Historia set idHistoria = '{$historia->getIdHistoria()}',
                  gostaria = '{$historia->getgostariaHistoria()}',
                  ra = '{$historia->getRa()}', 
                  objetivo = '{$historia->getobjetivoHistoria()}'
                  where idHistoria = '{$idHistoria}'";
        return mysqli_query($this->conexao, $query);
    }

    function buscaHistoria($id)
    {
        $query = "select * from Historia where idHistoria = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $array = mysqli_fetch_assoc($resultado);
        return  $array;
    }

    function removeHistoria($id)
    {
        $query = "delete from Historia where idHistoria = {$id}";
        return mysqli_query($this->conexao, $query);
    }
}

?>