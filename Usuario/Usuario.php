<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Usuario/UsuarioModel.php';

class Usuario extends UsuarioModel {

    protected $table = 'usuario';
    private $idUsuario;
    private $login;
    private $senha;
    private $nome;
    private $status;
    private $nivelAcesso;

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setNivelAcesso($nivelAcesso) {
        $this->nivelAcesso = $nivelAcesso;
    }

    public function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (login,senha,nome,status,nivelAcesso) VALUES (?,md5(?),?,?,?)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->login, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->status, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->nivelAcesso, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id) {

        $sql = "UPDATE $this->table SET login = ?, nome = ?, nivelAcesso = ? WHERE idUsuario = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->login, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->nivelAcesso, PDO::PARAM_INT);
        $stmt->bindParam(4, $this->idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function changePassword() {

        $sql = "UPDATE $this->table SET senha = md5(?) WHERE idUsuario = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function changeStatus() {

        $sql = "UPDATE $this->table SET status = ? WHERE idUsuario = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function autenticar() {
        $sql = "SELECT * FROM $this->table WHERE login = ? and senha = md5(?) and status=1;";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->login, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->senha, PDO::PARAM_STR);
        $stmt->execute();
        $lista = $stmt->fetch();

        session_start(); // Inicia a sessão
        $_SESSION['idUsuario'] = $lista->idUsuario;
        $_SESSION['login'] = $lista->login;
        $_SESSION['nome'] = $lista->nome;
        $_SESSION['nivelAcesso'] = $lista->nivelAcesso;

        return $lista;
    }

}
