<?php 



class Funcionario {
    
    protected DataBase $connect;

    protected int $id;
    protected string $nome;
    protected string $genero;
    protected int $idade;
    protected float $salario;

    public function __construct(int $id, string $nome, string $genero, int $idade, float $salario)
    {
        $this->connect = (new DataBase)->connect();
        
        $this->id = $id;
        $this->nome = $nome;
        $this->genero = $genero;
        $this->idade = $idade;
        $this->salario = $salario;
        
    }

    public function Create(){

    }

    public function ReadAll(){
        
    }

    public function ReadId($id){

    }

    public function Update(){

    }
    
    public function Delete(){

    }

    public function aumentaSalario($percentual){

    }
    
}