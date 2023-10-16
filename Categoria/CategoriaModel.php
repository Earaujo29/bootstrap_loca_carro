<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//DB/DB.php';

abstract class CategoriaModel extends DB {

    protected $table;

    abstract public function insert();

    abstract public function update($id);

    public function find($id) {
        $sql = "SELECT * FROM $this->table WHERE idCategoria = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findAll() {
        $sql = "SELECT idCategoria, categoria FROM $this->table";
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

}
