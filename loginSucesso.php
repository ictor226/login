<?php
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';
 
try {
    $banco = new PDO($dsn, $user, $password);
    $_COOKIE = $banco->query('SELECT * FROM tb_usuario JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id');
    $usuarios = $_COOKIE->fetchAll();
} catch (PDOException $exception) {
    echo 'Erro de conexão: ' . $exception->getMessage();
}
 



?>
 
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detalhes</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
 
     body {
    height: 100vh;
    background-color: rgb(51, 0, 66); /* Cor de fundo suave */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    font-family: 'Inter', sans-serif;
    color: rgb(255, 255, 255);
}
 
h1 {
    margin-bottom: 20px;
    color: #007bff;
}
 
table {
    width: 80%;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}
 
th, td {
    padding: 15px;
    border: 1px solid #dee2e6;
    text-align: left;
}
 
th {
    background-color: #007bff;
    color: rgb(255, 255, 255);
}
 
tr:nth-child(even) {
    background-color: rgb(43, 41, 41);
}
 
.btn {
    margin: 5px;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
}

.btn a {
    text-decoration: none; /* Remove o sublinhado de links dentro da classe .btn */
    color: white; /* Garante que o link tenha a mesma cor */
}

    </style>
</head>
 
<body>
    <h1>litar Usuários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['usuario']; ?></td>
                <td>
 
</html>
<button type="button" class="btn btn-success"><a href="./formulario-listar.php?id=<?php echo $usuario['id']; ?>">Abrir</a></button>
 
<button type="button" class="btn btn-warning"><a href="./formulario-editar.php?id=<?php echo $usuario['id']; ?>">Editar</a></button>
 
<button type="button" class="btn btn-danger"> <a href="./formulario-excluir.php?id=<?php echo $usuario['id']; ?>">Excluir</a></button>
 
</td>
</tr>
<?php endforeach; ?>
</table>
</body>
 
</html>