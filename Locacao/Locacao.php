<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/Locacao/LocacaoModel.php';

class Locacao extends LocacaoModel {

    protected $table = 'locacao';
    protected $taTable = 'locacaoCarro';
    private $idCarro;
    private $idLocacao;
    private $idLocacaoCarro;
    private $idCliente;
    private $status;
    private $valor;
    private $dataDevolucao;
    private $dataCadastro;
    private $dataEntrega;

    public function setIdLocacaoCarro($idLocacaoCarro) {
        $this->idLocacaoCarro = $idLocacaoCarro;
    }

    public function getIdLocacaoCarro() {
        return $this->idLocacaoCarro;
    }

    public function setIdLocacao($idLocacao) {
        $this->idLocacao = $idLocacao;
    }

    public function getIdLocacao() {
        return $this->idLocacao;
    }

    public function setIdCarro($idCarro) {
        $this->idCarro = $idCarro;
    }

    public function getIdCarro() {
        return $this->idCarro;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setDataDevolucao($dataDevolucao) {
        $this->dataDevolucao = $dataDevolucao;
    }

    public function getDataDevolucao() {
        return $this->dataDevolucao;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataEntrega($dataEntrega) {
        $this->dataEntrega = $dataEntrega;
    }

    public function getDataEntrega() {
        return $this->dataEntrega;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function insert() {
        $db = DB::banco();

        $retorno;
        $sql = "INSERT INTO $this->table(idUsuario, idCliente, dataEntrega, status,valor,dataCadastro) VALUES (?,?,?,?,?,now())";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $_SESSION['idUsuario'], PDO::PARAM_INT);
        $stmt->bindParam(2, $this->idCliente, PDO::PARAM_INT);
        $stmt->bindParam(3, $this->dataEntrega, PDO::PARAM_INT);
        $stmt->bindParam(4, $this->status, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->valor, PDO::PARAM_INT);

        $stmt->execute();
        $retorno = $db->lastInsertId();

        return $retorno;
    }

    public function insertTA($locacao) {
        $retorno = false;

        $sql = "INSERT INTO $this->taTable( idCarro, idLocacao,status) VALUES (?,?,?)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $locacao->idCarro, PDO::PARAM_INT);
        $stmt->bindParam(2, $locacao->idLocacao, PDO::PARAM_INT);
        $stmt->bindParam(3, $locacao->status, PDO::PARAM_INT);

        $retorno = $stmt->execute();

        return $retorno;
    }

    public function update() {
        $sql = "UPDATE locacao SET idCliente=?,dataEntrega=?,valor=?,dataDevolucao=?,status=? WHERE idLocacao=?";
        $stmt = DB::prepare($sql);
        /* echo $sql;
          echo "</br>idCliente" . $this->idCliente . "</br>";
          echo "</br>dataEntrega" . $this->dataEntrega . "</br>";
          echo "</br>valor" . $this->valor . "</br>";
          echo "</br>dataDevolucao" . $this->dataDevolucao . "</br>";
          echo "</br>status" . $this->status . "</br>";
          echo "</br>idLocacao" . $this->idLocacao . "</br>";
         */
        $stmt->bindParam(1, $this->idCliente, PDO::PARAM_INT);
        $stmt->bindParam(2, $this->dataEntrega, PDO::PARAM_INT);
        $stmt->bindParam(3, $this->valor, PDO::PARAM_INT);
        $stmt->bindParam(4, $this->dataDevolucao, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->status, PDO::PARAM_INT);
        $stmt->bindParam(6, $this->idLocacao, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
