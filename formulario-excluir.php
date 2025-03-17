<?php
echo '<h1>Deletar Usuário</h1>';
 
$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';
 
$banco = new PDO($dsn, $user, $password);
 
$id_usuario = $_GET['id'];
 
$delete_usuario = 'DELETE FROM tb_usuario WHERE id = ' . $id_usuario;
$banco->query($delete_usuario);
 
$delete_pessoa = 'DELETE FROM tb_pessoa WHERE id = ' . $id_usuario;
$banco->query($delete_pessoa);
 
echo '<script>
alert("Usuário apagado com sucesso!!");
window.location.replace("tela_usuario.php");
</script>';
 