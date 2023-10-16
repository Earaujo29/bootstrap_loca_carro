<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//Cliente/ClienteModel.php';

class Cliente extends ClienteModel {

    protected $table = 'cliente';
    private $idCliente;
    private $nome;
    private $cpf;
    private $datanascimento;
    private $sexo;
    private $email;
    private $telefone;
    private $status;

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setDatanascimento($datanasimento) {
        $this->datanascimento = $datanasimento;
    }

    public function getDatanasimento() {
        return $this->datanascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    
     public function insert() {
        $sql = "INSERT INTO $this->table(
nome,cpf,dataNascimento,sexo,email,telefone,status,idUsuario) value (?,?,?,?,?,?,?,?)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->datanascimento, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->sexo, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->email, PDO::PARAM_INT);
        $stmt->bindParam(6, $this->telefone, PDO::PARAM_INT);
        $stmt->bindParam(7, $this->status, PDO::PARAM_INT);
        $stmt->bindParam(8, $_SESSION['idUsuario'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update() {
        $sql = "UPDATE cliente SET nome=?,cpf=?,dataNascimento=?,sexo=?,email=?,telefone=? where idCliente=?"; 
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->datanascimento, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->sexo, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->email, PDO::PARAM_INT);
        $stmt->bindParam(6, $this->telefone, PDO::PARAM_INT);
        
        $stmt->bindParam(7, $this->idCliente, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
