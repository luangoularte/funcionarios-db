<?php
require_once "DataBase.php";

$teste  = pg_connect("host=localhost port=3600 dbname=postgres user=postgres password=root") or die("conexao falhou");

echo "BAnco conectado";