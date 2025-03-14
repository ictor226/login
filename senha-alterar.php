<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    form {
        width: 190px;
    }

    body {
        display: flex;
        
        background-color: black;
        color: wheat;
    }
</style>
    <form action="./alterar-user.php" method="post">
            <h1>Esqueci a Senha</h1>
            <label>Usuário:</label>
            <input type="text" name="user" required>
            <label>CPF:</label>
            <input type="text" name="cpf" required>
            <label>Nova Senha:</label>
            <input type="password" name="nova_senha" required>
            <input type="submit" value="Alterar Senha">
        </form>