<?php 
if (!isset($_SESSION)) session_start();// inicia em cada página diferente
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuarioId'])) {  
  session_destroy();// Destrói a sessão por segurança  
  header("Location: ../login/"); // Redireciona o visitante de volta pro login
  exit;
}
  // require_once '../login/valida_sessao.php';
  require_once '../config.php'; 

if(($_SESSION['usuarioNiveisAcessoId'] == "1") OR ($_SESSION['usuarioNiveisAcessoId'] == "255")) { 

  require_once(DBAPI);
  if (isset($_GET['id'])){
    $usuario = remove('usuarios', $_GET['id']);
    header('location: listar_usuario.php');
  } else {
    die("ERRO: ID não definido.");
  }
  
}else{         
  echo '
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">    
  <link rel="stylesheet" href="../css/estilo.css">   
  <div class="container">
      <div class="container-fluid">                               
          <div class="alert alert-success text-center h4" role="alert">
          Atenção, você não tem permissão para acessar esta seção do sistema!
          </div>
      </div>
  </div>        
';

    
}


?>