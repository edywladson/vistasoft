# VistaSoft API

[![Maintainer](http://img.shields.io/badge/maintainer-@edywladson-blue.svg?style=flat-square)](https://twitter.com/edywladson)
[![Source Code](http://img.shields.io/badge/source-edywladson/vistasoft-blue.svg?style=flat-square)](https://github.com/edywladson/vistasoft)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/edywladson/vistasoft.svg?style=flat-square)](https://packagist.org/packages/edywladson/vistasoft)
[![Latest Version](https://img.shields.io/github/release/edywladson/vistasoft.svg?style=flat-square)](https://github.com/edywladson/vistasoft/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/edywladson/vistasoft.svg?style=flat-square)](https://scrutinizer-ci.com/g/edywladson/vistasoft)
[![Quality Score](https://img.shields.io/scrutinizer/g/edywladson/vistasoft.svg?style=flat-square)](https://scrutinizer-ci.com/g/edywladson/vistasoft)
[![Total Downloads](https://img.shields.io/packagist/dt/edywladson/vistasoft.svg?style=flat-square)](https://packagist.org/packages/cedywladson/vistasoft)

###### O VistaSoft API é um pequeno componente que facilita o consumo da API da VistaSoft. Simples e fácil de usar.

### Destaques
- Instalação simples
- Fácil de utilizar e de comunicar com a API da VistaSoft
- Pronto para o composer e compatível com PSR-2

## Instalação
Uploader através do Composer:

```bash
"edywladson/vistasoft": "^1.0"
```

ou utilize o terminal

```bash
composer require edywladson/vistasoft
```

## Documentação

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá vários exemplos de uso. Ele funciona assim:

#### Utilização:

- **endpoint()** - *[STRING]* Aqui você deve colocar o endpoint para a chamada. Lembre sempre de colocar  a barra "/" no início do endpoint.
- **fields()** - *[ARRAY]* Insira aqui os campos que você deseja receber no seu request. 
- **leads()** - *[ARRAY]* Utilizado para o envio de leads
- **filter()** - *[ARRAY]* Utilize o filter para filtrar as informações que você precisa.
- **order()** - *[ARRAY]* O order é utilizado para ordenar a sua pesquisa.
- **paginator()** - Utilize para realizar paginação do conteúdo. Ele pode receber 3 parâmetros, o **page** que mostra em qual página você está, o **quantity** que determina quantos resultados por página e o **total** que retornará quantidade total de itens da solicitação. Por padrão já vem o page = 1, quantity = 20 e total = false.
- **clientId()** - *[INT]* Utilize para informar o ID do cliente.
- **immobileId()** - *[INT]* Utilize para informar o ID do imóvel.
- **get()** - Utilizado para realizar uma soliciação GET
- **post()** - Utilizado para realizar um POST [Cadastro de clientes, imóveis e leads]
- **put()** - Utilizado para realizar um PUT [Atualização de clientes e imóveis]
- **callback()** - Retorna o resultado da solicitação

### Consulta, cadastro e atualiação de clientes

##### Consulta [GET]:

```php
require __DIR__ . "/../vendor/autoload.php";

$vista = new \EdyWladson\VistaSoft\VistaSoft("api_url", "api_key");

$get = $vista->endpoint("/clientes/listar")
    ->fields([["Codigo", "Nome"])
    ->filter(["DataAtualizacao" => ["2021-01-10", "2021-02-10"]])
    ->order(["Codigo" => "asc"])
    ->paginator(1, 10, true)->get()->callback();
```

Para mais informações sobre campos, acesse a [documentação da API da Vista Soft](https://www.vistasoft.com.br/api/).

##### Cadastro [POST]:

```php
require __DIR__ . "/../vendor/autoload.php";

$vista = new \EdyWladson\VistaSoft\VistaSoft("api_url", "api_key");

$post = $vista->endpoint("/clientes/detalhes")
    ->fields(["Nome" => "João Felix", "FonePrincipal" => "00 0000 0000", "VeiculoCaptacao" => "Portal 10"])
    ->post()->callback();

```

Para mais informações sobre o cadastro de clientes, acesse a [documentação da API da Vista Soft](https://www.vistasoft.com.br/api/).

##### Atualização [PUT]:

```php
require __DIR__ . "/../vendor/autoload.php";

$vista = new \EdyWladson\VistaSoft\VistaSoft("api_url", "api_key");

$post = $vista->endpoint("/clientes/listar")
    ->clientId(73)
    ->fields(["FoneResidencial" => "21 8653 9050"])
    ->post()->callback();

```

Para mais informações sobre a atualização de clientes, acesse a [documentação da API da Vista Soft](https://www.vistasoft.com.br/api/).

### Consulta, cadastro e atualiação de imóveis

##### Consulta [GET]:

```php
require __DIR__ . "/../vendor/autoload.php";

$vista = new \EdyWladson\VistaSoft\VistaSoft("api_url", "api_key");

$get = $vista->endpoint("/imoveis/listar")
    ->fields(["Codigo", "Bairro"])
    ->filter(["Bairro" => ["Centro", "Moema"]])
    ->order(["Bairro" => "asc"])
    ->paginator()->get()->callback();
```
Para mais informações sobre campos, acesse a [documentação da API da Vista Soft](https://www.vistasoft.com.br/api/).

##### Cadastro [POST]:

```php

require __DIR__ . "/../vendor/autoload.php";

$vista = new \EdyWladson\VistaSoft\VistaSoft("api_url", "api_key");

$post = $vista->endpoint("/imoveis/detalhes")
    ->fields(["Categoria"=>"Apartamento","Endereco"=>"Rua Victor Meirelles","NumeroEnd"=>"600","Complemento"=>"901","Bairro"=>"Campinas","Cidade"=>"São José","UF"=>"SC","CEP"=>"88101170","Situacao"=>"Novo","Ocupacao"=>"Ocupado"])
    ->post()->callback();

```

Para mais informações sobre o cadastro de imóveis, acesse a [documentação da API da Vista Soft](https://www.vistasoft.com.br/api/).

##### Atualização [PUT]:

```php
require __DIR__ . "/../vendor/autoload.php";

$vista = new \EdyWladson\VistaSoft\VistaSoft("api_url", "api_key");

$post = $vista->endpoint("/imoveis/listar")
    ->immobileId(3152)
    ->fields(["NumeroEnd"=>"700"])
    ->post()->callback();

```

Para mais informações sobre a atualização de imóveis, acesse a [documentação da API da Vista Soft](https://www.vistasoft.com.br/api/).

## Contribuindo

Consulte o [CONTRIBUTING](https://github.com/edywladson/vistasoft/blob/master/CONTRIBUTING.md) para obter detalhes.

## Suporte

###### Se você descobrir algum problema relacionado à segurança, envie um e-mail para edywladson@gmail.com em vez de usar o rastreador de problemas.

Obrigado 

## Créditos

- [Edy Wladson](https://github.com/edywladson) (Developer)
- [All Contributors](https://github.com/edywladson/vistasoft/contributors) (This Rock)

## Licença

A Licença MIT. Por favor, veja o [Arquivo da Licença](https://github.com/edywladson/vistasoft/blob/master/LICENSE) para maiores informações.