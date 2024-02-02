<?php
require_once "DataBase.php";
require_once "Funcionario.php";

$connect = new DataBase();
$connect = $connect->connect();


$funcionarios = new Funcionario(0, '', '', 0, 0);

$funcionario1 = new Funcionario(15263, "Lucas", "M", 26, 1200);
$funcionario2 = new Funcionario(92038, "Maria", "F", 22, 1600);
$funcionario3 = new Funcionario(29482, "Isabela", "F", 45, 5200);
$funcionario4 = new Funcionario(39231, "Pedro", "M", 55, 6000);

$funcionarios->addFunc($connect, $funcionario1);
$funcionarios->addFunc($connect, $funcionario2);
$funcionarios->addFunc($connect, $funcionario3);
$funcionarios->addFunc($connect, $funcionario4);

$funcionario1->Update($connect, 'nome', 'Luiz', 15263);
$funcionario2->Update($connect, 'nome', 'Luiza', 92038);
$funcionario3->Update($connect, 'nome', 'Ana', 29482);
$funcionario4->Update($connect, 'nome', 'Marcos', 39231);

$funcionarios->ReadAll($connect);

$idFuncionario1 = 15263;
unset($funcionario1);

$funcionario5 = (new Funcionario(0, '', '', 0, 0))->ReadId($connect, $idFuncionario1);
print_r($funcionario5);

$funcionarios->Delete($connect, 29482);

pg_close($connect);