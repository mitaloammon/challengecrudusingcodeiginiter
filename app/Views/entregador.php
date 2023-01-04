<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Entregador</title>
    <script>
        
        function confirma() {
            if (!confirm('Deseja excluir o registro?'))
            {
                return false;
            }

            return true;
        }

    </script>
</head>
<body>
    
    <div class="container mt-5 table-responsive">
    <?php echo anchor(base_url('entregador/insert'), 'Novo Entregador', ['class' => 'btn btn-success mb-3']) ?>
        <table class="table">
        <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>CEP</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Ação</th>
                <th></th>
            </tr>
            <?php $return = array_unique($entregador,SORT_REGULAR); ?>
            <?php foreach($return as $key => $entregador_item): ?>
                <tr>
                    <td><?php echo $entregador_item->cd_entregador ?></td>
                    <td><?php echo $entregador_item->nome ?></td>
                    <td><?php echo $entregador_item->email ?></td>
                    <td><?php echo $entregador_item->nascimento ?></td>
                    <td><?php echo $entregador_item->cep ?></td>
                    <td><?php echo $entregador_item->bairro ?></td>
                    <td><?php echo $entregador_item->cidade ?></td>
                    <td><?php echo $entregador_item->uf ?></td>
                    <td>                       
                        <?php echo anchor('entregador/showUpdate/?cd_entregador='.$entregador_item->cd_entregador, 'Editar', ['class' => 'btn btn-primary']) ?>
                    </td>
                    <td>
                        <?php echo anchor('entregador/delete/'.$entregador_item->cd_entregador, 'Excluir', ['class' => 'btn btn-danger', 'onclick' => 'return confirma()'], ) ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>

</body>
</html>