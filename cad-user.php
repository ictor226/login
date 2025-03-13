<?php
echo "login de usuario";

echo '<pre>';
var_dump($_POST);

$nomeFormulario            = $_POST ['nome'];
$ano_nascimentoFormulario  = $_POST ['ano_nascimento'];
$cpfItemFormulario         = $_POST ['cpf'];
$telefone_1ItemFormulario  = $_POST ['telefone_1'];
$telefone_2ItemFormulario  = $_POST ['telefone_2'];
$logradouroItemFormulario  = $_POST ['logradouro'];
$n_casaItemFormulario      = $_POST ['n_casa'];
$bairroItemFormulario      = $_POST ['bairro'];
$cidadeItemFormulario      = $_POST ['cidade'];

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_pessoa (nome, ano_nascimento, cpf, telefone_1, telefone_2, logradouro, n_casa, bairro, cidade)
           VALUES (:nome, :ano_nascimento, :cpf, :telefone_1, :telefone_2, :logradouro, :n_casa, :bairro, :cidade)'; // Corrigido aqui

$box = $banco->prepare($insert);

$box->execute([
    ':nome' => $nomeFormulario,
    ':ano_nascimento' => $ano_nascimentoFormulario,
    ':cpf' => $cpfItemFormulario,
    ':telefone_1' => $telefone_1ItemFormulario,
    ':telefone_2' => $telefone_2ItemFormulario,
    ':logradouro' => $logradouroItemFormulario,
    ':n_casa' => $n_casaItemFormulario,
    ':bairro' => $bairroItemFormulario,
    ':cidade' => $cidadeItemFormulario
]);

$id_cad = $banco->lastInsertId();
echo $id_cad;
echo '<script>
swal({
    title: "Sucesso!",
    text: "Cadastrado com sucesso!",
    icon: "success",
    button: "OK",
});
</script>';
var_dump($box);
?>