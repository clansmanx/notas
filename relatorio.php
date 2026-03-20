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
		<link rel="stylesheet" type="text/css" href="DTables/datatables.min.css"/>
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
				<div class="p-3 mb-2 text-white" id="teex2"><center><h6>Relatório de NFs Corrigidas</h6></center></div>	
				<table class="table table-striped" id="minhaTabela">
					<thead class="table-info">
						<tr><td>EMPRESA</td><td>NOTA</td><td>DATA NOTA</td><td>FORNECEDOR</td><td>DATA INCLUSÃO</td><td>USUÁRIO INCLUSÃO</td><td>DATA CORREÇÃO</td><td>USUÁRIO CORREÇÃO</td></tr>
					</thead>
					<tbody>
						<?php
							@$vdata = $_POST['vdata'];
							@$vuser = $_POST['vuser'];
							@$vemp = $_POST['vemp'];
							$dti = "";
							$dtf = "";							
							$user = "";
							$emp = "";
							$sqdata = "";
							$squser = "";
							$sqemp = "";
							$sql = "select a.empresa,a.numero_nota,a.data_nota,a.fornecedor_nota,a.data_lancamento,b.nome,a.data_verificada,c.nome from notas a, usuarios b, usuarios c where a.usuario_lancamento = b.codigo and a.usuario_verificada = c.codigo ";
							if($vdata == 'on'){
								$dti = $_POST['dti'];
								$dtf = $_POST['dtf'];
								//$dtiI = implode('-', array_reverse(explode('-', $dti)));
								//$dtfF = implode('-', array_reverse(explode('-', $dtf)));
								$sql = $sql."and a.data_lancamento between '".$dti."' and '".$dtf."' ";
							}	
							if($vuser == 'on'){
								$user = $_POST['user'];
								$exec = $_POST['exec'];
								if($exec == 1){
									$sql = $sql."and a.usuario_lancamento = '".$user."' ";
								}else{	
									$sql = $sql."and a.usuario_verificada = '".$user."' ";
								}	
							}	
							if($vemp == 'on'){
								$emp = $_POST['emp'];
								$sqemp = "empresa = ".$emp;
								$sql = $sql."and a.empresa = ".$emp;
							}
							$tpdf = "";
							//ECHO($sql);
							include('banco/banco.php');
									//$sql = "select a.empresa,a.numero_nota,a.data_nota,a.fornecedor_nota,a.data_lancamento,b.nome,a.data_verificada,c.nome from notas a, usuarios b, usuarios c where a.usuario_lancamento = b.codigo and a.usuario_verificada = c.codigo and a.verificada = 'S'";
									$exec= mysqli_query($link, $sql) or die (mysqli_error());
									$rowli = mysqli_num_rows($exec);
									$pesq_codigo = "";
									$results = 0;
										while($registros = mysqli_fetch_row ($exec)){
											echo("<tr><td>".$registros[0]."</td><td>".$registros[1]."</td><td>".date('d/m/Y',strtotime($registros[2]))."</td><td>".$registros[3]."</td><td>".date('d-m-Y H:i:s',strtotime($registros[4]))."</td><td>".$registros[5]."</td><td>".date('d-m-Y H:i:s',strtotime($registros[6]))."</td><td>".$registros[7]."</td></tr>");									
											$tpdf = $tpdf.("<tr><td>".$registros[0]."</td><td>".$registros[1]."</td><td>".date('d/m/Y',strtotime($registros[2]))."</td><td>".$registros[3]."</td><td>".date('d-m-Y H:i:s',strtotime($registros[4]))."</td><td>".$registros[5]."</td><td>".date('d-m-Y H:i:s',strtotime($registros[6]))."</td><td>".$registros[7]."</td></tr>");
										}								
									mysqli_close($link);
						?>
					</tbody>
				</table>
				<br>
				<a href="gera_relatorio.php" id="caixa" class="btn btn-warning">Voltar</a>	
				<br><br>
				<form method="POST" action="geraPDF.php">
			<input type="hidden" name="sql" value="<?php echo($tpdf); ?>">
			<input type="submit" class='btn btn-primary' value=" Gerar PDF">
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
		<script type="text/javascript" src="DTables/datatables.min.js"></script>
		  <script>
		  $(document).ready(function(){
			  $('#minhaTabela').DataTable({
				  "lengthMenu": [[7,10, 25, 50, -1], [7,10, 25, 50, "TODOS"]],
				  "language": {
						"lengthMenu": "Mostrando _MENU_ registros por página",
						"zeroRecords": "Nada encontrado",
						"info": "Mostrando página _PAGE_ de _PAGES_",
						"infoEmpty": "Nenhum registro disponível",
						"infoFiltered": "(filtrado de _MAX_ registros no total)",
						"sSearch": "Pesquisar",
						"oPaginate": {
							"sNext": "Próximo",
							"sPrevious": "Anterior",
							"sFirst": "Primeiro",
							"sLast": "Último"
						}
					}
				});
		  });
		  </script>
	</body>
</html>	