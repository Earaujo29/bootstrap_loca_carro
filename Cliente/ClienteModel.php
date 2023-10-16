<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//DB/DB.php';

abstract class ClienteModel extends DB {

    protected $table;

    abstract public function insert();

    abstract public function update();

  public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findList($nome) {
        $sql = "SELECT * FROM cliente  where  nome like ?";
     
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($id) {
        $sql = "DELETE FROM cliente WHERE idCliente  = ?;";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
     public function status($id, $tipo) {
        $sql = "UPDATE  cliente set status = ? WHERE idCliente = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $tipo, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
     public function find($id) {
        $sql = "SELECT * from cliente  WHERE idCliente = ?;";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function findSelectActive() {
        $sql = "SELECT idCliente,nome FROM $this->table WHERE status=1";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function findSelect() {
        $sql = "SELECT idCliente,nome FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findQtdCliente() {
        $sql = "SELECT count(idCliente) as qtdClientes FROM  $this->table where status=1";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
 
}
