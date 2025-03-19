<?php
// Obtém os valores enviados pelo formulário via método POST
$user = $_POST['user'];
$cpf = $_POST['cpf'];
$nova_senha = $_POST['nova_senha'];

// Define as credenciais de conexão com o banco de dados MySQL
$dsn = 'mysql:dbname=db_login;host=127.0.0.1'; // Nome do banco e endereço do servidor
$userDB = 'root'; // Usuário do banco de dados
$passwordDB = ''; // Senha do banco de dados (vazia, o que pode ser um risco em produção)

try { // Tenta executar o código dentro do bloco try
    // Cria uma conexão com o banco de dados usando PDO
    $banco = new PDO($dsn, $userDB, $passwordDB);

    // Prepara a consulta SQL para buscar o usuário e o CPF correspondentes
    $stmt = $banco->prepare(
        'SELECT * FROM tb_usuario 
         JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id 
         WHERE usuario = :user AND cpf = :cpf'
    );

    // Executa a consulta passando os parâmetros de forma segura para evitar SQL Injection
    $stmt->execute(['user' => $user, 'cpf' => $cpf]);

    // Obtém o resultado da consulta
    $resultado = $stmt->fetch();

    // Verifica se o usuário e CPF foram encontrados no banco de dados
    if ($resultado) {
        // Prepara a consulta para atualizar a senha do usuário
        $stmtUpdate = $banco->prepare(
            'UPDATE tb_usuario SET senha = :nova_senha WHERE usuario = :user'
        );

        // Executa a atualização da senha com os valores fornecidos
        $stmtUpdate->execute(['nova_senha' => $nova_senha, 'user' => $user]);

        // Exibe uma mensagem informando que a senha foi alterada com sucesso
        echo 'Senha alterada com sucesso.';
    } else {
        // Caso o usuário ou CPF estejam incorretos, exibe uma mensagem de erro
        echo 'Usuário ou CPF incorretos.';
    }
} catch (PDOException $e) { // Captura erros de conexão ou execução no banco de dados
    // Exibe a mensagem de erro
    echo 'Erro de conexão: ' . $e->getMessage();
}