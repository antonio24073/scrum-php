<?php
/**
 * Created by PhpStorm.
 * User: Camilli
 * Date: 14/06/19
 * Time: 01:00
 */

require_once(__DIR__ . "/../../template/header.php");

require_once(__DIR__ . "/../../../security/session/Session.php");
Session::redirectIfNotLogged();

if($updated) { ?>
        <p class="alert alert-success" role="alert">História adicionada com sucesso!</p>
<?php } else {
        $msg = mysqli_error($conexao);
        ?>
<p class="alert alert-danger" role="alert">História não foi adicionada: <?= $msg ?></p>
        <?php
        require_once(__DIR__ . "/../../component/form/historiaAdd.php");
    }
    require_once(__DIR__ . "/../../component/form/historiaAdd.php");

require_once(__DIR__ . "/../../template/footer.php");