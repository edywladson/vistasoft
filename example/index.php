<?php
require __DIR__ . "/../vendor/autoload.php";


$vista = new \EdyWladson\VistaSoft\VistaSoft("http://sandbox-rest.vistahost.com.br", "c9fdd79584fb8d369a6a579af1a8f681");
$get = $vista
    ->fields(["Codigo", "Nome"])
    ->endpoint("/clientes/listar")
    ->paginator()
    ->get()
    ->callback();

var_dump($get);


