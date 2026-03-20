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
	//-------------
	$retorno = 0;
	@$retorno = $_GET['retorno'];		
	//-------------
	include('banco/banco.php');
	$sql = "select count(*) from notas where verificada = 'N'";
	$exec= mysqli_query($link, $sql) or die (mysqli_error());
	$rowli = mysqli_num_rows($exec);
	$totpesq2 = 0;
		while($registros = mysqli_fetch_row ($exec)){
			$totpesq2 = $registros[0];
		}
	$sql = "select count(*) from notas where verificada = 'S'";
	$exec= mysqli_query($link, $sql) or die (mysqli_error());
	$rowli = mysqli_num_rows($exec);
	$totpesq3 = 0;
		while($registros = mysqli_fetch_row ($exec)){
			$totpesq3 = $registros[0];
		}	
	mysqli_close($link);	

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
			    <a class="navbar-brand" href="#">Validação de NFs</a>
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
			<center>
			<?php
				if($retorno == 1){
					echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4 class='modal-title' id='myModalLabel'>Usuário sem permissão!</h4>
										</div>
										<div class='modal-body'>
											Usuário sem permissão para lançar notas!
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>
										</div>
									</div>
								</div>
						</div>				
						<script>
							$(document).ready(function () {
								$('#myModal').modal('show');
							});
						</script>";
				}else if($retorno == 2){
					echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4 class='modal-title' id='myModalLabel'>Usuário sem permissão!</h4>
										</div>
										<div class='modal-body'>
											Usuário sem permissão para cadastrar usuários!
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>
										</div>
									</div>
								</div>
						</div>				
						<script>
							$(document).ready(function () {
								$('#myModal').modal('show');
							});
						</script>";
				}else if($retorno == 3){
					echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4 class='modal-title' id='myModalLabel'>Usuário sem permissão!</h4>
										</div>
										<div class='modal-body'>
											Usuário sem permissão para consultar usuários!
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>OK</button>
										</div>
									</div>
								</div>
						</div>				
						<script>
							$(document).ready(function () {
								$('#myModal').modal('show');
							});
						</script>";
				}
			?>			
			<div class="container-fluid" id="branco">
				<br><br>
				<div class="card-deck col-md-6">
				
					<div class="card border-danger" style="max-width: 18rem;">
					  <div class="card-header">Pendentes.</div>
					  <div class="card-body text-danger">
						<h5 class="card-title">Existem<br><?php echo($totpesq2); ?>
						<br>NFs para corrigir.</h5>
						<p class="card-text"><a href="consulta_nf.php">Clique aqui para visualizar..</a></p>
					  </div>
					</div>
				
					<div class="card border-success" style="max-width: 18rem;">
					  <div class="card-header">Concluídas.</div>
					  <div class="card-body text-success">
						<h5 class="card-title">Existem<br><?php echo($totpesq3); ?><br>NFs Corrigidas.</h5>
						<p class="card-text"><a href="nf_corrigida.php">Clique aqui para visualizar..</a></p>
					  </div>
					</div>				

					
				</div>				
			</div>
			</center>
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