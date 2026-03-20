<?php

	session_start();
	
	if(!isset($_SESSION["usuario"])){
		header("Location: index.php");
		exit;
	}else{
		$userName = $_SESSION["usuario"];
		$userCod = $_SESSION["codigo"];
		$userGroup = $_SESSION['grupo'];
	}
	
	if($userGroup == 'F'){
		header("Location: home.php?retorno=1");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<Link rel = "Shortcut Icon" href = "imagens/ico.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Valida Notas</title>
		<link href="bootstrap4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">			
		<script src="bootstrap4.0.0/js.js"></script>
		<link href="estilo.css" rel="stylesheet">	
	</head>
	<body>
		<div id="wrapper" class="animate">
			<nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-info">
			    <span class="navbar-toggler-icon leftmenutrigger"></span>
			    <a class="navbar-brand" href="home.php">Validação de NFs</a>
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
				    aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav animate side-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" title="Controle de Usuários" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="far fa-edit"></i> Cadastro <i class="far fa-edit shortmenu animate"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="cadastra_usuario.php" title="Cadastra novo usuário."><i class="fas fa-user-plus"></i> Usuário</a>
								<a class="dropdown-item" href="consulta_usuario.php" title="Consulta usuários cadastrados."><i class="far fa-address-book"></i> Pesquisar</a>
							</div>	
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" title="Controle de Notas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-file-invoice"></i> Notas <i class="fas fa-file-invoice shortmenu animate"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="cadastra_nf.php" title="Incluir NF."><i class="far fa-plus-square"></i> Nova</a>
								<a class="dropdown-item" href="consulta_nf.php" title="Consulta NFs cadastradas."><i class="fas fa-search"></i> Pesquisar</a>
							</div>	
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" title="Controle de Relatórios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="far fa-chart-bar"></i> Relatórios <i class="far fa-chart-bar shortmenu animate"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="gera_relatorio.php" title="Gerador de relatórios."><i class="far fa-clipboard"></i> Correções</a>
							</div>	
						</li>
					</ul>
					<ul class="navbar-nav ml-md-auto d-md-flex">
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fas fa-address-card"></i> <?php echo($userName); ?></a>
						</li>	
						
					    <li class="nav-item">
							<a class="nav-link" href="login/logof.php"><i class="fas fa-key"></i> Sair</a>
					    </li>
					</ul>
				</div>
			</nav>
			<div class="container">
				<div class="p-3 mb-2 text-white" id="teex3"><center><h6>Nova NF</h6></center></div>	
				<br>	
				<form id="nova_nf" name="nova_nf" method="POST" action="grava_nova_nf.php">
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="Empresa">Empresa</label>
						  <select id="empresa" name="empresa" class="form-control" required>
							<option></option>
							<option value="1">01</option>
							<option value="4">04</option>
							<option value="5">05</option>
							<option value="6">06</option>
							<option value="7">07</option>
						  </select>
						</div>
						<div class="form-group col-md-6">
						  <label for="nota">Nota Fiscal</label>
						  <input type="number" class="form-control" id="nota" name="nota" placeholder="Nota Fiscal" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="data_nota">Data</label>
						  <input class="form-control" type="date" id="data_nota" name="data_nota" required>
						</div>
						<div class="form-group col-md-6">
						  <label for="nota">Fornecedor</label>
						  <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Fornecedor">
						</div>
					</div>
					<div class="form-group">
						<label for="chave" class="cols-sm-2 control-label">Chave</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<input type="number" class="form-control" name="chave" id="chave"  placeholder="Chave" maxlength="44"/>
							</div>
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-success">Incluir</button>
				</form>
			</div>
		</div>
	    <script defer src="bootstrap4.0.0/font531.js"></script>
	    <script>
			$(document).ready(function () {
			  $('.leftmenutrigger').on('click', function (e) {
				$('.side-nav').toggleClass("open");
				$('#wrapper').toggleClass("open");
				e.preventDefault();
			  });
			});
		</script>
		<script src="bootstrap4.0.0/js/bootstrap.min.js"></script>
	</body>
</html>	