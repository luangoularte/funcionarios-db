<?php 

class DataBase {
    public function connect(){
        $connect = pg_connect("host=localhost port=3600 dbname=postgres user=postgres password=root") or die("conexao falhou");
    }
    
}