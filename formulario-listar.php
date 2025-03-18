<?php
// Pega o valor do parâmetro 'id' da URL (usando o método GET)
$id = $_GET['id'];

// Converte o ID para inteiro para garantir que estamos usando um valor numérico
$id = (int) $id;

// Configura a conexão com o banco de dados MySQL
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    // Cria uma nova conexão com o banco de dados usando PDO
    $banco = new PDO($dsn, $user, $password);

    // Prepara a consulta SQL para buscar informações do usuário e da pessoa associada
    $stmt = $banco->prepare('SELECT * FROM tb_usuario JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_usuario.id = :id');

    // Exibe o ID que será consultado para depuração
    echo 'ID que está sendo consultado: ' . $id . '<br>'; 

    // Executa a consulta, substituindo o placeholder ':id' pelo valor da variável $id
    $stmt->execute(['id' => $id]);

    // Pega o resultado da consulta (se houver)
    $usuario = $stmt->fetch();

    // Verifica se o usuário foi encontrado
    if (!$usuario) {
        echo 'Não foi possível encontrar o usuário com o ID: ' . $id . '<br>';
        echo 'Consulta SQL: SELECT * FROM tb_usuario JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_usuario.id = ' . $id . '<br>';
    }

} catch (PDOException $e) {
    // Se ocorrer algum erro na conexão com o banco de dados, exibe a mensagem de erro
    echo 'Erro de conexão: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
    <style>
        body {
            background-color: rgb(52, 4, 65);
            color: #f2f2f2;
            padding: 20px;
        }
        .usuario-info {
            list-style-type: none;
            padding: 0;
        }
        .usuario-info li {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .usuario-info li span {
            font-weight: bold;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-size: 1.2em;
        }
        a:hover {
            text-decoration: underline;
        }
        .edit-hr {
            width: 270px;
            margin-left: -20px;
        }
    </style>
</head>

<body>
    <h1>Detalhes de Usuários</h1>

    <?php if ($usuario): ?>
        <ul class="usuario-info">
            <li><span>ID:</span> <?php echo $usuario['id']; ?></li>
            <hr class="edit-hr">
            <li><span>Nome:</span> <?php echo $usuario['nome']; ?></li>
            <hr class="edit-hr">
            <li><span>Ano de Nascimento:</span> <?php echo $usuario['ano_nascimento']; ?></li>
            <hr class="edit-hr">
            <li><span>CPF:</span> <?php echo $usuario['cpf']; ?></li>
            <hr class="edit-hr">
            <li><span>Telefone 1:</span> <?php echo $usuario['telefone_1']; ?></li>
            <hr class="edit-hr">
            <li><span>Telefone 2:</span> <?php echo $usuario['telefone_2']; ?></li>
            <hr class="edit-hr">
            <li><span>Logradouro:</span> <?php echo $usuario['logradouro']; ?></li>
            <hr class="edit-hr">
            <li><span>Número da Casa:</span> <?php echo $usuario['n_casa']; ?></li>
            <hr class="edit-hr">
            <li><span>Bairro:</span> <?php echo $usuario['bairro']; ?></li>
            <hr class="edit-hr">
            <li><span>Cidade:</span> <?php echo $usuario['cidade']; ?></li>
            <hr class="edit-hr">
            <li><span>Usuário:</span> <?php echo $usuario['usuario']; ?></li>
            <hr class="edit-hr">
        </ul>
        <a href="loginSucesso.php">Voltar para a tela de listar usuários</a>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>

</body>
</html>
