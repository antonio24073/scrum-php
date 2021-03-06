<?php

require_once (__DIR__."/../domain/Pessoa.php");
require_once (__DIR__."/../domain/Usuario.php");

class PessoaDao
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    function listaPessoas()
    {
        $arrays = array();
        $resultado = mysqli_query($this->conexao, "select * from Pessoa");
        while ($array = mysqli_fetch_assoc($resultado)) {
            array_push($arrays, $array);
        }
        return $arrays;
    }

   
    function inserePessoas(Pessoa $pessoa)
    {
        $md5=md5($pessoa->getSenha());
        $query = "insert into Pessoa (papel,nome,ra,senha)
            values ('{$pessoa->getPapel()}',
            '{$pessoa->getNome()}',
            '{$pessoa->getRa()}',
            '{$md5}')";
        return mysqli_query($this->conexao, $query);
    }

    function alteraPessoa(Pessoa $pessoa,$ra)
    {
        $query = "update Pessoa set ra = '{$pessoa->getRa()}',
            nome = '{$pessoa->getNome()}', papel= '{$pessoa->getPapel()}'
            where ra = '{$ra}'";
        return mysqli_query($this->conexao, $query);
    }

    function buscaPessoa($ra)
    {
        $query = "select * from Pessoa where ra = '{$ra}'";
        $resultado = mysqli_query($this->conexao, $query);
        $array = mysqli_fetch_assoc($resultado);
        return $array;
    }

    function removePessoas($ra)
    {
        $query = "delete from Pessoa where ra = '{$ra}'";
        return mysqli_query($this->conexao, $query);
    }
	
	    function alterarSenha(Usuario $usuario, $ra)
    {
		$senha = md5($usuario->getSenha());
        $query = "update Pessoa set senha = '{$senha}'
                   where ra = '{$ra}'";
        return mysqli_query($this->conexao, $query);
    }

    function buscaUsuario($ra, $senha) {
        $senhaMd5 = md5($senha);
        $ra = mysqli_real_escape_string($this->conexao, $ra);
        $query = "select * from Pessoa where ra='{$ra}' and senha='{$senhaMd5}'";
        $resultado = mysqli_query($this->conexao, $query);
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }
}
