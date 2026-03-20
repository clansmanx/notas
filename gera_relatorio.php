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
		<link href="relatorio.css" rel="stylesheet"> 
		<script>
			function habilitar(){
				if(document.getElementById('vdata').checked){
					document.getElementById('datas1').removeAttribute("disabled");
					document.getElementById('datas2').removeAttribute("disabled");
				}
				else {
					document.getElementById('vdata').value=''; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
					document.getElementById('datas1').setAttribute("disabled", "disabled");
					document.getElementById('datas2').setAttribute("disabled", "disabled");
				}
			}
			function habilitar2(){
				if(document.getElementById('vuser').checked){
					document.getElementById('user').removeAttribute("disabled", "disabled");
					document.getElementById('exec').removeAttribute("disabled", "disabled");
				}
				else {
					document.getElementById('user').setAttribute("disabled", "disabled");
					document.getElementById('exec').setAttribute("disabled", "disabled");
				}
			}	
			function habilitar3(){
				if(document.getElementById('vemp').checked){
					document.getElementById('emp').removeAttribute("disabled", "disabled");
				}
				else {
					document.getElementById('emp').setAttribute("disabled", "disabled");
				}
			}
		</script>
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
				<div class="p-3 mb-2 text-white" id="teex2"><center><h6>Relatório de Correções</h6></center></div>	
				<form name="grel" id="grel" method="POST" action="relatorio.php">
					<div "form-group">
						<label class="switch">
							<input type="checkbox" name="vdata" id="vdata" onchange="habilitar()" data-toggle="toggle" data-on="SIM" data-off="NÃO" >
							<span class="slider"></span>
						</label>
						Por data
					</div>
					<br>
					<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Data Inicial</label>
						<div class="cols-sm-10">
							<div class="input-group">								
								<input type="date" class="form-control" name="dti" id="datas1"  placeholder="Data ##-##-####" disabled="disabled" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Data Final</label>
							<div class="cols-sm-10">
								<div class="input-group">									
									<input type="date" class="form-control" name="dtf" id="datas2"  placeholder="Data ##-##-####" disabled="disabled" required />
								</div>
							</div>
					</div>
					<div "form-group">
						<label class="switch">
							<input type="checkbox" name="vuser" id="vuser" onchange="habilitar2()" data-toggle="toggle" data-on="SIM" data-off="NÃO" >
							<span class="slider"></span>
						</label>
						Por Usuário
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="name" class="cols-sm-2 control-label">Usuário</label>
							  <select id="user" name="user" class="form-control" disabled="disabled" required>
								<option></option>
								<?php
									include('banco/banco.php');
									$sql = "select * from usuarios";
									$exec= mysqli_query($link, $sql) or die (mysqli_error());
									$rowli = mysqli_num_rows($exec);
									$pesq_codigo = "";
									$results = 0;
										while($registros = mysqli_fetch_row ($exec)){
											echo("<option value=".$registros[0].">".$registros[1]."</option>");									
										}								
									mysqli_close($link);
								?>							
							  </select>
						</div>
						<div class="col">
							<label for="name" class="cols-sm-2 control-label">Execução</label>
							  <select id="exec" name="exec" class="form-control" disabled="disabled" required>
								<option value="2">Corrigiu</option>
								<option value="1">Lançou</option>
							  </select>	
						</div>						
					</div>
					<div "form-group">
						<label class="switch">
							<input type="checkbox" name="vemp" id="vemp" onchange="habilitar3()" data-toggle="toggle" data-on="SIM" data-off="NÃO" >
							<span class="slider"></span>
						</label>
						Por Empresa
					</div>
					<br>
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Empresa</label>
						  <select id="emp" name="emp" class="form-control" disabled="disabled" required>
							<option></option>
							<option value="1">01</option>
							<option value="4">04</option>
							<option value="5">05</option>
							<option value="6">06</option>							
						  </select>
					</div>
					<br>
					<div class="form-group ">
						<button target="_blank" type="submit" id="button" class="btn btn-info btn-lg btn-block login-button">Gerar</button>
					</div>
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