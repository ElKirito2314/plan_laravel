<?php
session_start();

if(isset($_SESSION['usuario']) && is_array($_SESSION['usuario']))
{
    include_once('config.php');

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();
    
    $lvl = $_SESSION['usuario'][1];
    $nome = $_SESSION['usuario'][0];
}
else
{
  echo "<script type='text/javascript'>alert('Por favor, efetue o login no sistema');";
  echo "javascript:window.location='login/login.html';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta media="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Ferramentas</title> 
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="empresa.css">
   
</head>
<body>
<ul>
<div class="box-logo">
    <a href="index.php"><img src="logo.jpg" id="i1"></a>
  </div>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Registro</a>
      <div id="dd" class="dropdown-content">
        <a href="formulario_empregados.php">Empregados</a>
        <a href="formulario_ferramentas.php">Ferramentas</a>
        <a href="formulario_materiais.php">Materiais</a>
        <a href="formulario_veiculos.php">Veículos</a>
        <a href="formulario_endereco.php">Serviços</a>
      </div></li>
      <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Utilização</a>
      <div id="dd" class="dropdown-content">
        <a href="formulario_emp_realiza_serv.php">Empregados</a>
        <a href="formulario_emp_utiliza_ferr.php">Ferramentas</a>
        <a href="formulario_emp_utiliza_mate.php">Materiais</a>
        <a href="formulario_emp_utiliza_veic.php">Veículos</a>
      </div></li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Tabelas</a>
      <div id="dd" class="dropdown-content">
        <a href="tabela_empregados.php">Empregados</a>
        <a href="tabela_ferramentas.php">Ferramentas</a>
        <a href="tabela_materiais.php">Materiais</a>
        <a href="tabela_veiculos.php">Veículos</a>
        <a href="tabela_servicos.php">Serviços</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Disponibilidade</a>
      <div id="dd" class="dropdown-content">
        <a href="tabela_emp_realiza_serv.php">Empregados</a>
        <a href="tabela_emp_utiliza_ferr.php">Ferramentas</a>
        <a href="tabela_emp_utiliza_mate.php">Materiais</a>
        <a href="tabela_emp_utiliza_veic.php">Veículos</a>
      </div>
    </li>
    <li><a href="obras.php">Obras</a>
  </li>
  <?php if($lvl == 1): ?>
        <script type='text/javascript'>alert('Sua conta não tem acesso a esta área do sistema');
        window.location='/BDEmpresa/index.php';</script>"; <?php endif ?>
             
  <?php if($lvl == 2): ?>
    <div class="box-logout">
            <a href="login/logout.php" ><svg id="logout" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
          </svg></a>
        </div>
        <?php endif; ?>
  </ul>

  <form action="formulario_ferramentas.php" method="POST">
      <h2 id="tit2">CADASTRO DE FERRAMENTAS</h2>
  <div id="cad">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
  </div>
  <div id="cad">
    <label for="cor">Cor:</label>
    <input type="text" id="cor" name="cor" required>
  </div>
  <div id="cad">
    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" required>
  </div>
  <div id="cad">
    <label for="condicao">Condição:</label>
    <select id="condicao" name="condicao" required>
      <option value="">Selecione uma condição</option>
      <option value='O'>Ótimo</option>
      <option value='R'>Razoável</option>
      <option value='P'>Péssimo</option>
    </select>
  </div>
  <div id="cad">
    <label for="categoria">Categoria:</label>
    <select id="categoria" name="categoria" required>
      <option value="">Selecione uma categoria</option>
      <option value="Civíl">Civíl</option>
      <option value="Elétrica">Elétrica</option>
      <option value="Pintura">Pintura</option>
    </select>
  </div>
  <div id="cad">
    <button type="submit" name="submit" id="submit">Enviar</button>
  </div>
</form>

<?php

    if(isset($_POST['submit']))
    {

        $nome = $_POST['nome'];
        $cor = $_POST['cor'];
        $marca = $_POST['marca'];
        $condicao = $_POST['condicao'];
        $categoria = $_POST['categoria'];

        $result = mysqli_query($conexao, "INSERT INTO ferramentas(cod_registro, nome, cor, marca, condicao, categoria)
        VALUES (default, '$nome', '$cor', '$marca', '$condicao', '$categoria')");

header('Location: index.php');
exit();
    }
?>

</body>
</html>