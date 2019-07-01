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
        <p class="alert alert-success" role="alert">Sprint alterado com sucesso!</p>
    <?php } else {
        $msg = mysqli_error($conexao);
        ?>
        <p class="alert alert-danger" role="alert">Sprint não foi alterado: <?= $msg ?></p>
        <?php
        require_once(__DIR__ . "/../../component/form/sprint.php");
        
    }
}else{
   
    require_once(__DIR__ . "/../../component/form/sprint.php");
}


require_once(__DIR__ . "/../../template/footer.php");
?>