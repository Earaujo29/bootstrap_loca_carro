<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora/DB/DB.php';

abstract class LocacaoModel extends DB {

    protected $table;
    protected $taTable;

    abstract public function insert();

    abstract public function update();

    public function find($id) {
        $sql = "SELECT idLocacao,idCliente, dataEntrega, dataDevolucao,valor, status, dataCadastro FROM $this->table where idLocacao = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findList($nome) {
        $sql = "SELECT c.nome,l.idLocacao,l.dataEntrega ,l.dataCadastro,  count(f.idCarro ) as qtdCarro, l.status,dataDevolucao  FROM $this->table l "
                . "inner join cliente c on(c.idCliente = l.idCliente) "
                . "inner join $this->taTable lc on(l.idLocacao = lc.idLocacao) "
                . "inner join carro f on(f.idCarro = lc.idCarro) where c.nome like ? group by l.idLocacao ;";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findAll() {
        $sql = "SELECT c.nome,l.idLocacao,l.dataEntrega ,l.dataCadastro,  count(f.idCarro ) as qtdCarro, l.status,dataDevolucao  FROM $this->table l "
                . "inner join cliente c on(c.idCliente = l.idCliente) "
                . "inner join $this->taTable lc on(l.idLocacao = lc.idLocacao) "
                . "inner join carro f on(f.idCarro = lc.idCarro) group by l.idLocacao ;";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findMontante() {
        $sql = "SELECT sum(valor) as valor FROM locacao l inner join cliente c on(c.idCliente = l.idCliente) inner join locacaoCarro lc on(l.idLocacao = lc.idLocacao) inner join carro f on(f.idCarro = lc.idCarro) where l.status = 2;";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findQtdLocados() {
        $sql = "SELECT count(f.idCarro) as qtdLocados FROM  locacaoCarro lc inner join locacao l on(l.idLocacao = lc.idLocacao) inner join carro f on(f.idCarro = lc.idCarro) where l.status = 1;";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listCategoriaLocada() {
        $sql = "SELECT categoria,count(c.idCategoria)  as qtdCategoria FROM  locacaoCarro lc  "
                . "inner join carro f on(f.idCarro = lc.idCarro) "
                . "inner join categoria c on(f.idCategoria = c.idCategoria) "
                . "where c.status=1 "
                . "group by c.idCategoria;";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listTop3() {
        $sql = "SELECT f.nome,f.idCarro,count(f.idCarro) as qtd,Month(l.dataCadastro) as mes, imagem,categoria  FROM  locacaoCarro lc "
                . " inner join locacao l on(l.idLocacao = lc.idLocacao) "
                . " inner join carro f on(f.idCarro = lc.idCarro) "
                . " inner join categoria c on(f.idCategoria = c.idCategoria) "
                . " where c.status = 1 and Month(now())=Month(l.dataCadastro)"
                . " group by f.idCarro "
                . " ORDER BY count(f.idCarro) DESC  limit 3;";
        $stmt = DB::prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listMontate() {
        $sql = "SELECT sum(valor) as valor,MONTHNAME(dataDevolucao) as mes  FROM locacao l inner join cliente c on(c.idCliente = l.idCliente) inner join locacaoCarro lc on(l.idLocacao = lc.idLocacao) inner join carro f on(f.idCarro = lc.idCarro) where l.status = 2 group by Month(dataDevolucao);";
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

    public function deleteAll($id) {
        $sql = "DELETE FROM $this->taTable WHERE idLocacao = :id";
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

}
