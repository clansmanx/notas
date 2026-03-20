<?php 

/*$uri = "http://localhost:8080/WebS_PesquisaDePrecos/webresources/pesquisaPreco/GET_pesquisas";


ini_set('user_agent', "PHP"); // github requires this
$api = $uri;
//$url = $api . '/users/lornajane/gists';
// make the request
$response = file_get_contents($uri);
// check we got something back before decoding
if(false !== $response) {
    $gists = json_decode($response, true);
} // otherwise something went wrong

var_dump($response);*/
////////////----------------------------------------------



//$url = "http://localhost:8080/ClienteWebSerice/webresources/CLIENTE/Cliente/Inserir"; // no user info because we're sending auth
//$url = "http://localhost:8080/ClienteWebSerice/webresources/CLIENTE/Cliente/Inserir"; 



// Array
  $someArray = [
      "CPF"   => "07365410981",
      "NOME" => "FABIO SILVA",
	  "DATANASC" => "11-04-1990",
	  "SEXO" => "M",
	  "CEP" => "88200-000",
	  "ENDERECO" => "RUA ROUXINOL",
	  "UF" => "SC",
	  "CIDADE" => "TIJUCAS",
	  "BAIRRO" => "CENTRO",
	  "NUMERO" => "442",
	  "COMPLEMENTO" => "CASA 02",
	  "FONE" => "47996782131"
  ];
  

  // Convert Array to JSON String
  $data = json_encode($someArray);

// prepare the body data 
/*$data = json_encode(array(
            'CPF' => '123',
			'NOME' => 'FABIO',
			'DATANASC' => '123',
			'SEXO' => 'FABIO',
			'CEP' => 'FABIO',
			'ENDERECO' => 'FABIO',
			'UF' => 'FABIO',
			'CIDADE' => 'FABIO',
			'BAIRRO' => 'FABIO',
			'NUMERO' => 'FABIO',
			'COMPLEMENTO' => 'FABIO',
			'FONE' => 'FABIO',
			)
		); */
// set up the request context
$options = ["http" => [
    "method" => "POST",
    "header" => [
        "Content-Type: application/json"],
    "content" => $data
    ]];
$context = stream_context_create($options);
// make the request
$response = file_get_contents($url, false, $context);

echo($response);

?>
