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
		<link href="estiloLogin.css" rel="stylesheet">	
	</head>
	<body>
		<div class="container">
			<div class="row">
			  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
				  <div class="card-body">
					<center><img src="imagens/logo-celeiro2.png" /></center>
					<hr class="my-4">
					<h5 class="card-title text-center">Login</h5>
					<form class="form-signin" id="fmr-login" name="fmr-login" method="POST" action="login/valida.php">
					  <div class="form-label-group">
						<input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuário" required autofocus>
						<label for="inputUser">Usuário</label>
					  </div>

					  <div class="form-label-group">
						<input type="password" id="inputSenha" name="inputSenha" class="form-control" placeholder="Senha" required>
						<label for="inputSenha">Senha</label>
					  </div>

					  <div class="custom-control custom-checkbox mb-3">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Lembrar Senha</label>
					  </div>
					  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>					  
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		<script src="bootstrap4.0.0/js/bootstrap.min.js"></script>
	</body>
</html>	