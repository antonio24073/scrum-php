<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 05/05/19
 * Time: 01:00
 */


require_once(__DIR__ . "/../../template/header.php");

require_once(__DIR__ . "/../../../security/session/Session.php");
Session::redirectIfNotLogged();

if($_POST != null) {
    if($updated) { ?>
        <p class="alert alert-success" role="alert">Projeto alterado com sucesso!</p>
    <?php 
        require_once(__DIR__ . "/../../component/table/projeto.php");
        require_once(__DIR__ . "/../../component/table/pessoa.php");             
     } else {
        $msg = mysqli_error($conexao);
        ?>
        <p class="alert alert-danger" role="alert">Projeto não foi alterado: <?= $msg ?></p>
        <?php
        require_once(__DIR__ . "/../../component/form/projeto.php");
        }
    }else{
     require_once(__DIR__ . "/../../component/form/projeto.php");
}
require_once(__DIR__ . "/../../template/footer.php");
?>