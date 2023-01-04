<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Entregador - Mensagens</title>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-info">
            <?php echo $message; ?>
            <p class="mt-3"><?php echo anchor(base_url(), 'Página inicial')  ?></p>
        </div>
    </div>
</body>
</html>