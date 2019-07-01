

<?php
$configs = include(__DIR__ . '/../../../../config.php');
?>
<table class="table">
    <tr>
    <td a class="d-print-none"><a class="btn btn-danger" href="<?=$configs['document_root']?>/pessoa/insere/"?>Adicionar Pessoa</a></td>
    </tr>   
</table>
<table class="table">  
    <thead class="thead-light">
    <tr>
        <th scope="col">papel</th>
        <th scope="col">nome</th>
        <th scope="col">ra</th>
        <th scope="col" colspan="2">
        </th>
    </tr>
    </thead>
    <body>
    <?php        
    foreach ($pessoas as $pessoa) :
        ?>
        <tr>
            <td><?= $pessoa['papel'] ?></td>
            <td><?= $pessoa['nome'] ?></td>
            <td><?= $pessoa['ra'] ?></td>
            
<td  class="d-print-none"><a class="d-print-none"><a class="btn btn-primary" href="<?=$configs['document_root']?>/pessoa/editar/<?= $pessoa['ra']?>"><i class="fas fa-edit"></i></a>
    </a></td>
            
<td class="d-print-none"><a class="btn btn-danger" href="<?=$configs['document_root']?>/pessoa/remove/<?= $pessoa['ra']?>"><i class="fas fa-trash"></i></a></td>
        
        
        </tr>
        <?php
    endforeach
    ?>

    </body>
</table>


