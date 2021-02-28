<?php
require __DIR__ . "/../vendor/autoload.php";
$vista = new \EdyWladson\VistaSoft\VistaSoft("http://sandbox-rest.vistahost.com.br", "c9fdd79584fb8d369a6a579af1a8f681");
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
    <title>Como Usar</title>
</head>
<body>

<?php

/**
 * CLIENTES
 */

//CLIENT LIST [LISTAR CLIENTES]//CLIENT LIST [LISTAR CLIENTES]
$get = $vista
    ->endpoint("/clientes/listar")
    ->fields(["Codigo", "Nome"])
    ->get()->callback();
var_dump($get);

//CLIENT DETAILS [DETALHES DO CLIENTE]
//$get = $vista
//    ->endpoint("/clientes/detalhes")
//    ->clientId(53016)
//    ->fields(["Codigo", "Nome"])
//    ->get()
//    ->callback();
//var_dump($get);

//CLIENT DETAILS (HISTORY) [DETALHES DO CLIENTE (HISTÓRICOS)]
//$get = $vista
//    ->endpoint("/clientes/detalhes")
//    ->clientId(73)
//    ->fields(["Codigo", "Nome", ['historicos' => ["Data","Hora","Imovel","Assunto","Texto"]]])
//    ->get()
//    ->callback();
//var_dump($get);

//CLIENT DETAILS (AGENCY) [DETALHES DO CLIENTE (AGÊNCIA)]
//$get = $vista
//    ->endpoint("/clientes/detalhes")
//    ->clientId(73)
//    ->fields(["Codigo", "Nome", ['Agencia' => ["Nome","Endereco"]]])
//    ->get()
//    ->callback();
//var_dump($get);

//CLIENT POST [CADASTRAR CLIENTE]
//$post = $vista
//    ->endpoint("/clientes/detalhes")
//    ->fields(["Nome" => "Vista Api", "FonePrincipal" => "00 0000 0000", "VeiculoCaptacao" => "Portal 10"])
//    ->post();
//
//var_dump($post);

//CLIENT PUT [ATUALIZAR CLIENTE]
//$put = $vista
//    ->endpoint("/clientes/detalhes")
//    ->clientId(73)
//    ->fields(["FoneResidencial" => "2186530000"])
//    ->put()->callback();
//
//var_dump($put);

//SEND LEADS [ENVIAR LEADS]
//$put = $vista
//    ->endpoint("/lead")
//    ->leads(["nome"=>"Teste de cadastro","fone"=>"77 9988.7756","email"=>"teste@apivista.com.br","mensagem"=>"Tenho interesse no imóvel","veiculo"=>"Veiculo de Captação","interesse"=>"venda"])
//    ->post()->callback();
//
//var_dump($put);

/**
 * IMÓVEIS
 */
//IMMOBILE LIST [LISTA DE IMÓVEIS]
//$get = $vista
//    ->endpoint("/imoveis/listar")
//    ->fields(["Codigo", "Bairro"])
//    ->get()->callback();
//var_dump($get);

//FILTER IMMOBILE LIST [LISTA DE IMÓVEIS COM FILTRO]
//$get = $vista
//    ->endpoint("/imoveis/listar")
//    ->fields(["Codigo", "Bairro"])
//    ->filter(["Bairro" => ["Centro", "Moema"]])
//    ->order(["Bairro" => "asc"])
//    ->get()->callback();
//var_dump($get);

//LIST CONTENTS [LISTA DE CONTEÚDOS]
//$get = $vista
//    ->endpoint("/imoveis/listarConteudo")
//    ->fields(["Bairro"])
//    ->get()->callback();
//var_dump($get);

//IMMOBILE DETAILS [DETALHES DO IMÓVEL]
//$get = $vista
//    ->endpoint("/imoveis/detalhes")
//    ->immobileId(3152)
//    ->fields(["Codigo","Categoria","Bairro","Cidade","ValorVenda","ValorLocacao"])
//    ->get()->callback();
//var_dump($get);

//IMMOBILE PHOTOS [FOTOS DO IMÓVEL]
//$get = $vista
//    ->endpoint("/imoveis/detalhes")
//    ->immobileId(3152)
//    ->fields(["Codigo","Categoria","Bairro","Cidade","ValorVenda","ValorLocacao", ['Foto' => ['Foto','FotoPequena','Destaque']]])
//    ->get()->callback();
//var_dump($get);

//IMMOBILE ATTACHMENTS [ANEXOS IMÓVEL]
//$get = $vista
//    ->endpoint("/imoveis/detalhes")
//    ->immobileId(3152)
//    ->fields(["Codigo","Categoria","Bairro","Cidade","ValorVenda","ValorLocacao", ['Anexo' => ['Anexo','Descricao']]])
//    ->get()->callback();
//var_dump($get);

//IMMOBILE HISTORY [HISTÓRICO DO IMÓVEL]
//$get = $vista
//    ->endpoint("/imoveis/detalhes")
//    ->immobileId(3152)
//    ->fields(["Codigo","Categoria","Bairro","Cidade","ValorVenda","ValorLocacao", ['prontuarios' => ["Data","Hora","Assunto","Texto"]]])
//    ->get()->callback();
//var_dump($get);

//IMMOBILE POST [CADASTRAR UM IMÓVEL]
//$post = $vista
//    ->endpoint("/imoveis/detalhes")
//    ->fields(["Categoria"=>"Apartamento"])
//    ->post()->callback();
//var_dump($post);

//IMMOBILE PUT [ATUALIZAR UM IMÓVEL]
//$post = $vista
//    ->endpoint("/imoveis/detalhes")
//    ->immobileId(3152)
//    ->fields(["Categoria"=>"Apartamento"])
//    ->put()->callback();
//var_dump($post);
?>

</body>
</html>