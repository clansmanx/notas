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
		<script>
			function f_mostra() {
			var notification = new Notification('Correção de Notas', {
			  icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
			  body: "Olá! Você tem novas notas para corrigir!",
			});	
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
			<div class="container-fluid">
				<div class="p-3 mb-2 text-white" id="teex3"><center><h6>Consulta NFs</h6></center></div>	
				<table class="table table-striped">
					<thead class="table-info">
						<tr><td>EMPRESA</td><td>NOTA</td><td>DATA NOTA</td><td>FORNECEDOR</td><td>CHAVE</td><td>DATA INCLUSÃO</td><td>USUÁRIO INCLUSÃO</td><td>#</td></tr>
					</thead>
					<tbody>	
						<?php
							include('banco/banco.php');
							$sql = "select a.empresa,a.numero_nota,a.data_nota,a.data_lancamento,a.codigo,a.fornecedor_nota,b.nome,a.chave from notas a, usuarios b where a.usuario_lancamento = b.codigo and a.verificada = 'N'";
							$exec= mysqli_query($link, $sql) or die (mysqli_error());
							$rowli = mysqli_num_rows($exec);
							$pesq_codigo = "";
							$results = 0;
								while($registros = mysqli_fetch_row ($exec)){
									if($userGroup == 'C'){
										echo("<tr><td>".$registros[0]."</td><td>".$registros[1]."</td><td>".date('d/m/Y',strtotime($registros[2]))."</td><td>".$registros[5]."</td><td>".$registros[7]."</td><td>".date('d-m-Y H:i:s',strtotime($registros[3]))."</td><td>".$registros[6]."</td><td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal".$registros[4]."' disabled>CORRIGIR</button></td></tr>");
									}else{
										echo("<tr><td>".$registros[0]."</td><td>".$registros[1]."</td><td>".date('d/m/Y',strtotime($registros[2]))."</td><td>".$registros[5]."</td><td>".$registros[7]."</td><td>".date('d-m-Y H:i:s',strtotime($registros[3]))."</td><td>".$registros[6]."</td><td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal".$registros[4]."'>CORRIGIR</button></td></tr>");
										echo("<div class='modal' tabindex='-1' role='dialog' id='exampleModal".$registros[4]."'>
												  <div class='modal-dialog' role='document'>
													<div class='modal-content'>
													  <div class='modal-header'>
														<h5 class='modal-title'>Marcar nota como Corrigida!</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
														  <span aria-hidden='true'>&times;</span>
														</button>
													  </div>
													  <div class='modal-body'>
														<p>Deseja marcar a nota '".$registros[1]."' como corrigida?</p>
													  </div>
													  <div class='modal-footer'>
														<a href='corrige_nf.php?id=".$registros[4]."' class='btn btn-warning'>Corrigir</a>
														<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
													  </div>
													</div>
												  </div>
												</div>");
										$results ++;
									}	
								}								
							mysqli_close($link);
							if($results > 0){
								echo ("<script language='javascript' type='text/javascript'>	f_mostra();	</script>");
							}	
						?>
					</tbody>
				</table>
				
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
		<script type="text/javascript">setInterval ("window.location='?page=stats'", "120000");</script>
		<script>
		   //Após o carregamento da página
		   document.addEventListener('DOMContentLoaded', function () {

		  //Se não tiver suporte a Notification manda um alert para o usuário
			  if (!Notification) {
				alert('Desktop notifications not available in your browser. Try Chromium.'); 
				return;
			  }
			  
			  //Se não tem permissão, solicita a autorização do usuário
			  if (Notification.permission !== "granted")
				Notification.requestPermission();
			});			
		</script>
	</body>
</html>	