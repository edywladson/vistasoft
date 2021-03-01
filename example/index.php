<?php
require __DIR__ . "/../vendor/autoload.php";
$vista = new \EdyWladson\VistaSoft\VistaSoft("http://sandbox-rest.vistahost.com.br", "c9fdd79584fb8d369a6a579af1a8f681");

/**
 * CLIENTES GET
 */

//LISTAR CLIENTES
$get = $vista
    ->fields(["Codigo", "Nome"])
    ->order(["Codigo" => "asc"])
    ->get("clientes/listar")->callback();
var_dump($get);

//DETALHES DO CLIENTE
$get = $vista
    ->clientId(53016)
    ->fields(["Codigo", "Nome"])
    ->get("/clientes/detalhes")
    ->callback();
var_dump($get);

//ACESSAR HISTÓRICO DO CLIENTE
$get = $vista
    ->clientId(73)
    ->fields(["Codigo", "Nome", ['historicos' => ["Data", "Hora", "Imovel", "Assunto", "Texto"]]])
    ->paginator(1, 10)
    ->get("/clientes/detalhes")
    ->callback();
var_dump($get);

//DETALHES DO CLIENTE POR AGÊNCIA
$get = $vista
    ->clientId(73)
    ->fields(["Codigo", "Nome", ['Agencia' => ["Nome", "Endereco"]]])
    ->get("/clientes/detalhes")
    ->callback();
var_dump($get);

/**
 * CLIENTES POST E PUT
 */

//CADASTRAR CLIENTE
$post = $vista
    ->fields(["Nome" => "Vista Api", "FonePrincipal" => "00 0000 0000", "VeiculoCaptacao" => "Portal 10"])
    ->post("/clientes/detalhes")->callback();
var_dump($post);

//ATUALIZAR CLIENTE
$put = $vista
    ->clientId(73)
    ->fields(["FoneResidencial" => "2186530000"])
    ->put("/clientes/detalhes")->callback();
var_dump($put);

//CADASTRAR HISTÓRICO DO CLIENTE
$post = $vista
    ->fields(["Cliente" => 73, "Historico" => ["Assunto" => "Telefonema", "Imovel" => 210, "Texto" => "Liguei novamente, será agendada visita"]])
    ->post("/clientes/detalhes")->callback();
var_dump($post);

//ENVIAR LEADS
$put = $vista
    ->leads(["nome" => "Teste de cadastro", "fone" => "77 9988.7756", "email" => "teste@apivista.com.br", "mensagem" => "Tenho interesse no imóvel", "veiculo" => "Veiculo de Captação", "interesse" => "venda"])
    ->post("/lead")->callback();
var_dump($put);


/**
 * IMÓVEIS GET
 */

//LISTA DE IMÓVEIS
$get = $vista
    ->fields(["Codigo", "Bairro"])
    ->order(["Bairro" => "desc"])
    ->paginator(1, 10, true)
    ->get("/imoveis/listar")->callback();
var_dump($get);

//LISTA DE IMÓVEIS COM FILTRO
$get = $vista
    ->fields(["Codigo", "Bairro"])
    ->filter(["Bairro" => ["Centro", "Moema"]])
    ->order(["Bairro" => "asc"])
    ->get("/imoveis/listar")->callback();
var_dump($get);

//LISTA DE CAMPOS DISPONÍVEIS
$get = $vista->get("/imoveis/listarcampos")->callback();
var_dump($get);

//LISTA DE CONTEÚDOS
$get = $vista
    ->fields(["Bairro"])
    ->get("/imoveis/listarConteudo")->callback();
var_dump($get);

//DETALHES DO IMÓVEL
$get = $vista
    ->immobileId(3152)
    ->fields(["Codigo", "Categoria", "Bairro", "Cidade", "ValorVenda", "ValorLocacao"])
    ->get("/imoveis/detalhes")->callback();
var_dump($get);

//IMÓVEL COM FOTOS
$get = $vista
    ->immobileId(3152)
    ->fields(["Codigo", "Categoria", "Bairro", "Cidade", "ValorVenda", "ValorLocacao", ['Foto' => ['Foto', 'FotoPequena', 'Destaque']]])
    ->get("/imoveis/detalhes")->callback();
var_dump($get);

//ANEXOS DO IMÓVEL
$get = $vista
    ->immobileId(3152)
    ->fields(["Codigo", "Categoria", "Bairro", "Cidade", "ValorVenda", "ValorLocacao", ['Anexo' => ['Anexo', 'Descricao']]])
    ->get("/imoveis/detalhes")->callback();
var_dump($get);

//HISTÓRICO DO IMÓVEL
$get = $vista
    ->immobileId(3152)
    ->fields(["Codigo", "Categoria", "Bairro", "Cidade", "ValorVenda", "ValorLocacao", ['prontuarios' => ["Data", "Hora", "Assunto", "Texto"]]])
    ->get("/imoveis/detalhes")->callback();
var_dump($get);

/**
 * IMÓVEIS POST E PUT
 */

//CADASTRAR UM IMÓVEL
$post = $vista
    ->fields(["Categoria" => "Apartamento", "Endereco" => "Rua Victor Meirelles", "Numero" => "600", "Complemento" => "901", "Bairro" => "Campinas", "Cidade" => "São José", "UF" => "SC", "CEP" => "88101170", "Situacao" => "Novo", "Ocupacao" => "Ocupado"])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//CADASTRAR FOTOS EM UM IMÓVEL
$post = $vista
    ->fields(["Imovel" => 3152, "Fotos" => [['Destaque' => 'Nao', 'Foto' => 'https://www.plantapronta.com.br/projetos/140/02.jpg'], ['Destaque' => 'Sim', 'Foto' => 'https://www.plantapronta.com.br/projetos/140/01.jpg']]])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//CADASTRAR ANEXO EM UM IMÓVEL
$post = $vista
    ->fields(["Imovel" => 3152, "Anexo" => ["Descricao" => "Documentação necessária", "Anexo" => "http://www.vistasoft.com.br/sandbox/vista.imobi/documentos/_55141bca085d0.pdf"]])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//CADASTRAR HISTÓRICO EM UM IMÓVEL
$post = $vista
    ->fields(["Imovel" => 3152, "Historico" => ["Assunto" => "CONTINUA A VENDA", "Codigo" => 3152, "Texto" => "Proprietário não mudou valor"]])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//CADASTRAR HISTÓRICO EM UM IMÓVEL
$post = $vista
    ->fields(["Imovel" => 3152, "Historico" => ["Assunto" => "CONTINUA A VENDA", "Codigo" => 3152, "Texto" => "Proprietário não mudou valor"]])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//CADASTRAR PROPRIETÁRIO EM UM IMÓVEL
$post = $vista
    ->fields(["Imovel" => 3152, "proprietario" => ["Nome"=>"Arnaldo Fagundes","FonePrincipal"=>"21 99008899","VeiculoCaptacao"=>"Site"]])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);
//OU
$post = $vista
    ->fields(["Imovel" => 3152, "proprietario" => 19159])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//CADASTRAR CORRETOR EM UM IMÓVEL
$post = $vista
    ->fields(["Imovel" => 3152, "Corretor" => 4])
    ->post("/imoveis/detalhes")->callback();
var_dump($post);

//ATUALIZAR UM IMÓVEL
$post = $vista
    ->immobileId(3152)
    ->fields(["Categoria" => "Apartamento"])
    ->put("/imoveis/detalhes")->callback();
var_dump($post);