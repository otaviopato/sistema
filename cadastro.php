<?php
if ( ($_POST['login'] == '' || $_POST['login'] == null) || ($_POST['senha'] == '' || $_POST['senha'] == null) ) {
  echo '<script language=\'javascript\' type=\'text/javascript\'>'
    . 'alert(\'Os campos login e senha devem ser preenchidos\');'
    . 'window.location.href=\'cadastro.html\';</script>';
  die();
}

$login = $_POST['login'];
$senha = MD5($_POST['senha']);

$servidor = 'localhost';
$BDusuario = 'root';
$BDsenha = '';
$baseDeDados = 'eusougay';



$conexao = new mysqli($servidor, $BDusuario, $BDsenha, $baseDeDados);
if ($conexao->connect_error) {
  die('Não foi possível conectar: ' . $ligacao->connect_error);
}

// Chamada de busca
$chamadaSQL = 'SELECT login FROM usuarios WHERE login = \'' . $login . '\';';
// Executa Query de busca
$resultadoDaChamada = $conexao->query($chamadaSQL);
// Verifica se foi encontrado algum dado que bata com a busca
if ($resultadoDaChamada->num_rows > 0) {
  $loginInvalido = true;
} else {
  $loginInvalido = false;
}

  if ($loginInvalido) {
    $conexao->close();
    echo '<script language=\'javascript\' type=\'text/javascript\'>'
      .'alert(\'Esse login já existe\');'
      .'window.location.href=\'cadastro.html\';</script>';
  } else {
    $chamadaSQL = ('INSERT INTO usuarios (login,senha) VALUES (\''. $login . '\' ,\'' . $senha. '\');');
    if ($conexao->query($chamadaSQL) === TRUE) {
      $conexao->close();
      echo '<script language=\'javascript\' type=\'text/javascript\'>'
        .'alert(\'Usuário cadastrado com sucesso!\');'
        .'window.location.href=\'login.html\'</script>';
    } else {
      $conexao->close();
      echo '<script language=\'javascript\' type=\'text/javascript\'>'
        .'alert(\'Não foi possível cadastrar esse usuário\');'
        .'window.location.href=\'cadastro.html\'</script>';
    }
  }
?>