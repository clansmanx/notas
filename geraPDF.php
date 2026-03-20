
<?php	
	ini_set('memory_limit', '-1');
	$sql = $_POST['sql'];
	//include_once("conexao.php");
	$html = '
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<link rel="stylesheet" href="estiloPDF.css">
					<meta charset="utf-8">					
				</head>
				<body>
					<div class="container">
						<center><p>Relatório de Correções.</p></center>
						<table>
						  <thead>
							<tr>
							  <th>EMPRESA</th>
							  <th>NOTA</th>
							  <th>DATA NOTA</th>
							  <th>FORNECEDOR</th>
							  <th>DATA LANÇAMENTO</th>
							  <th>USUÁRIO LANÇAMENTO</th>
							  <th>DATA CORREÇÃO</th>
							  <th>USUÁRIO CORREÇÃO</th>
							</tr>
						  </thead>
						  <tbody>';		  
	
	/*$result_transacoes = "SELECT * FROM promotores";
	$resultado_trasacoes = mysqli_query($conn, $sql);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['promo'] . "</td>";
		$html .= '<td>'.$row_transacoes['empresa'] . "</td>";
		$html .= '<td>'.$row_transacoes['telefone'] . "</td>";
		$html .= '<td>'.$row_transacoes['data'] . "</td>";
		$html .= '<td>'.$row_transacoes['horae'] . "</td>";
		$html .= '<td>'.$row_transacoes['horas'] . "</td>";
		$html .= '<td>'.$row_transacoes['loja'] . "</td></tr>";		
	}*/
	$html .= $sql;
	$html .= '</tbody>
						</table>
					</div>
				</body>
			</html>';

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html($html .'	');
	$dompdf->setPaper('A4', 'landscape');
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_visitas", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>