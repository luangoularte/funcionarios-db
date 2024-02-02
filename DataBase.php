<?php 

class DataBase {
    public function connect(){
        try{
            $connect = pg_connect("host=localhost port=3600 dbname=postgres user=postgres password=root");
            return $connect;
        } catch (Exception $e) {
                echo "Não foi possível conectar";
            }
    }
    
}