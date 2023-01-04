<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar Entregador</title>
</head>
<body>
    <div class="container mt-5">
    <?php echo form_open('entregador/edit');?>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($entregador[0]->nome) ? $entregador[0]->nome : '' ?>" name="nome" id="nome" class="form-control">
        </div>

        <div class="form-group">
            <label for="emai">E-mail</label>
            <input type="email" value="<?php echo isset($entregador[0]->email) ? $entregador[0]->email : '' ?>" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="nascimento">Data de Nascimento</label>
            <input type="date" value="<?php echo isset($entregador[0]->nascimento) ? $entregador[0]->nascimento : ''  ?>" name="nascimento" id="nascimento" class="form-control">
        </div>

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="number" value="<?php echo isset($entregador[0]->cep) ? $entregador[0]->cep : ''  ?>" name="cep" id="cep" class="form-control" onblur="pesquisacep(this.value);">
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" value="<?php echo isset($entregador[0]->bairro) ? $entregador[0]->bairro : ''  ?>"" name="bairro" id="bairro" class="form-control">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" value="<?php echo isset($entregador[0]->cidade) ? $entregador[0]->cidade : ''  ?>" name="cidade" id="cidade" class="form-control">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" value="<?php echo isset($entregador[0]->uf) ? $entregador[0]->uf : ''  ?>" name="uf" id="uf" class="form-control">
        </div>

        <div class="form-group">
            <label for="endereco">Endereco</label>
            <input type="text" value="<?php echo isset($entregador[0]->endereco) ? $entregador[0]->endereco : ''  ?>" name="endereco" id="endereco" class="form-control">
        </div>

        <input type="hidden" name="cd_entregador" value="<?php echo isset($entregador[0]->cd_entregador) ? $entregador[0]->cd_entregador : ''  ?>">
        <input type="submit" value="salvar" class="btn btn-primary">
    <?php echo form_close(); ?>
    </div>

    <script>
            function limpa_formulário_cep() {
                document.getElementById('endereco').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    document.getElementById('endereco').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                } 
                else {
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }
    

        
            function pesquisacep(valor) {

                var cep = valor.replace(/\D/g, '');

                if (cep != "") {

                    var validacep = /^[0-9]{8}$/;

                    if(validacep.test(cep)) {

                        document.getElementById('endereco').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";

                        var script = document.createElement('script');

                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        document.body.appendChild(script);

                    } 
                    else {
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } 
                else {
                    limpa_formulário_cep();
                }
            };
        </script>
</body>
</html>