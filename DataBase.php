<?php 

class DataBase {
    public function connect(){
        try{

            $connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=root") or die("conexao falhou");
            return $connect;

        } catch (Exception $e) {
            echo "Não foi possível conectar";
        }
        
    }
    
}