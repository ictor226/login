<?php
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    exit();
}

if (!isset($_GET['id'])) {
    echo 'ID do usuário não fornecido.';
    exit();
}

$id = $_GET['id'];

$stmt = $banco->prepare('SELECT * FROM tb_usuario JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_usuario.id = :id');
$stmt->execute(['id' => $id]);

$usuario = $stmt->fetch();

if (!$usuario) {
    echo 'Usuário não encontrado.';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha       = $_POST['senha'];
    $logradouro  = $_POST['logradouro'];
    $n_casa      = $_POST['n_casa'];
    $bairro      = $_POST['bairro'];
    $cidade      = $_POST['cidade'];
    $telefone_1  = $_POST['telefone_1'];
    $telefone_2  = $_POST['telefone_2'];

    try {
        $stmtUsuario = $banco->prepare('UPDATE tb_usuario SET senha = :senha WHERE id = :id');
        $stmtUsuario->execute(['senha' => $senha, 'id' => $id]);

        $stmtPessoa = $banco->prepare('UPDATE tb_pessoa SET logradouro = :logradouro, n_casa = :n_casa, bairro = :bairro, cidade = :cidade, telefone_1 = :telefone_1, telefone_2 = :telefone_2 WHERE id = :id_pessoa');
        $stmtPessoa->execute([
            'logradouro' => $logradouro,
            'n_casa' => $n_casa,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'telefone_1' => $telefone_1,
            'telefone_2' => $telefone_2,
            'id_pessoa' => $usuario['id_pessoa']
        ]);

        header('Location: loginSucesso.php');
        exit();
    } catch (PDOException $e) {
        echo 'Erro ao atualizar: ' . $e->getMessage();
    }
}
?>
    <title>Editar User</title>
    <style>
        body {
            background-color:rgb(31, 0, 46);
            color: #f2f2f2;
            padding: 20px;
            margin-left: -20px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #333;
            color:rgb(255, 255, 255);
        }
        input[type="submit"] {
            background-color:rgb(255, 96, 96);
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:rgb(0, 0, 0);
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>editar user</h1>
    <?php if ($usuario): ?>
        <form method="post">
            <!-- se eu tiver tempo devo colocar um estilizarr -->
            <label>Senha:</label>
            <input type="password" name="senha" value="<?php echo $usuario['senha']; ?>" required>
<hr>
            <label>Logradouro:</label>
            <input type="text" name="logradouro" value="<?php echo $usuario['logradouro']; ?>" required>
            <hr>
            <label>Número da Casa:</label>
            <input type="text" name="n_casa" value="<?php echo $usuario['n_casa']; ?>" required>
            <hr>
            <label>Bairro:</label>
            <input type="text" name="bairro" value="<?php echo $usuario['bairro']; ?>" required>
            <hr>
            <label>Cidade:</label>
            <input type="text" name="cidade" value="<?php echo $usuario['cidade']; ?>" required>
            <hr>
            <label>Telefone 1:</label>
            <input type="text" name="telefone_1" value="<?php echo $usuario['telefone_1']; ?>" required>
            <hr>
            <label>Telefone 2:</label>
            <input type="text" name="telefone_2" value="<?php echo $usuario['telefone_2']; ?>">
            <hr>
            <input type="submit" value="Salvar Alterações">
        </form>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>
    <a href="loginSucesso.php">Voltar pra tela de listar user</a>
