<?php



class Funcionario
{

    protected int $id;
    protected string $nome;
    protected string $genero;
    protected int $idade;
    protected float $salario;

    public function __construct(int $id, string $nome, string $genero, int $idade, float $salario)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->genero = $genero;
        $this->idade = $idade;
        $this->salario = $salario;
    }

    public function addFunc($connect, $funcionario)
    {
        $sql = "INSERT INTO funcionarios (id, nome, genero, idade, salario) VALUES ($1, $2, $3, $4, $5)";
        pg_query_params($connect, $sql, array($funcionario->id, $funcionario->nome, $funcionario->genero, $funcionario->idade, $funcionario->salario));
    }

    public function ReadAll($connect)
    {
        $sql = 'SELECT * FROM funcionarios';
        $result = pg_query($connect, $sql);

        $rows = pg_fetch_all($result);
        foreach ($rows as $row) {
            print_r($row);
        }
    }

    public function ReadId($connect, $id)
    {
        $sql = "SELECT * FROM funcionarios WHERE id = $1";
        $result = pg_query_params($connect, $sql, array($id));
        if ($result) {
            print_r($result);
            $row = pg_fetch_assoc($result);
            $funcionario = new Funcionario(0, '', '', 0, 0);
            $funcionario->id = $row["id"];
            $funcionario->nome = $row["nome"];
            $funcionario->genero = $row["genero"];
            $funcionario->idade = $row["idade"];
            $funcionario->salario = $row["salario"];
            return $funcionario;
        } else {
            echo "Funcionário Inexistente";
        }

    }

    public function Update($connect, $atributo, $valor, $id)
    {
        $sql1 = "SELECT * FROM funcionarios WHERE id = '$id'";
        $result = pg_query($connect, $sql1);
        if ($result) {
            $sql = "UPDATE funcionarios f SET \"$atributo\" = '$valor' WHERE f.id = '$id'";
            pg_query($connect, $sql);
        } else {
            echo "Funcionário Inexistente";
        }
    }

    public function Delete($connect, $id)
    {
        $sql = "SELECT * FROM funcionarios WHERE id = $1";
        $result = pg_query_params($connect, $sql, array($id));
        if ($result) {
            $sql = "DELETE FROM funcionarios WHERE id = $1";
            pg_query_params($connect, $sql, array($id));
        } else {
            echo "Funcionário Inexistente";
        }

    }

    public function aumentaSalario($connect, $percentual, $id)
    {
        $sql = "SELECT * FROM funcionarios WHERE id = $1";
        $result = pg_query_params($connect, $sql, array($id));
        if ($result) {
            $sql = "SELECT salario FROM funcionarios WHERE id = $id";
            $result = pg_query_params($connect, $sql, array($id));
            $row = pg_fetch_assoc($result);
            $salario = $row["salario"];
            $calculo = $salario + ($salario * ($percentual / 100));
            $sql = "UPDATE funcionarios SET salario = $calculo WHERE id = $id";
            pg_query_params($connect, $sql);
        } else {
            echo "Funcionário Inexistente";
        }
    }
}