<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>login</title>
</head>

<style>
    form {
        width: 190px;
    }

    body {
        display: flex;
        justify-content: center;
        background-color: black;
        color: wheat;


    }
</style>

<body>

    <form action="auxlogin.php" class="mt-5" method="POST">

        <label class="form-label"> usuario: </label>
        <input type="text" class="form-control" name="user">


        <label class="form-label">senha: </label>
        <input type="password" class="form-coontrol" name="password">
        <div class="d-flex justify-content-around gap-5">

            <input type="submit" class="btn btn-success mt-3" href="./loginSucesso.php.php">

            <a  class="btn btn-secondary mt-3"  href="./senha-alterar.php">esqueceu a senha?</a>

        </div>
        <a class="btn btn-info mt-3"  href="./cadastrar.php">cadastrar user</a>
    </form>


</body>

</html>