<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//DB/DB.php';

abstract class CarroModel extends DB {

    protected $table;

    abstract public function insert();

    abstract public function update();

    public function find($id) {
        $sql = "SELECT * FROM $this->table WHERE idCarro = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findList($nome) {

        $sql = "SELECT * FROM $this->table WHERE nome like ? ";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findSelect() {
        $sql = "SELECT idCarro,nome FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function findSelectActive() {
        $sql = "SELECT idCarro,nome FROM $this->table WHERE status=1";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE idCarro = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function status($id, $tipo) {
        $sql = "UPDATE $this->table SET status = ? WHERE idCarro = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $tipo, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findLocados($id) {
        $sql = "select f.idCarro,f.nome from locacaocarro lc "
        . "inner join $this->table  f on(f.idCarro = lc.idCarro) where idLocacao= :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function findLocadosSelect($id) {
        $sql = "select f.idCarro,valor_locacao from locacaocarro lc "
        . "inner join $this->table  f on(f.idCarro = lc.idCarro) where idLocacao= :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
        return $stmt->fetchAll();
    }

}
