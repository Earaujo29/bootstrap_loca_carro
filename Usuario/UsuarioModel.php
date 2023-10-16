<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/DB/DB.php';

abstract class UsuarioModel extends DB {

    protected $table;

    abstract public function insert();

    abstract public function update($id);

    public function find($id) {
        $sql = "SELECT * FROM $this->table WHERE idUsuario = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE idUsuario = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function validaLogin($login) {
        $sql = "SELECT * FROM $this->table WHERE login = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $login, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findLogin($login) {
        $sql = "SELECT idUsuario FROM $this->table WHERE login = ? and status=1;";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $login, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch();

        return $usuario->idUsuario;
    }

}
