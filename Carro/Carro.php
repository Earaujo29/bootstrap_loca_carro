<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaLocadora//Carro/CarroModel.php';

class Carro extends CarroModel {

    protected $table = 'carro';
    private $idCarro;
    private $idCategoria;
    private $nome;
    private $sinopse;
    private $diretor;
    private $ano;
    private $produtora;
    private $quantidade;
    private $trailer;
    private $status;
    private $imagem;
    private $valorLocacao;

    public function setIdCarro($idCarro) {
        $this->idCarro = $idCarro;
    }

    public function getIdCarro() {
        return $this->idCarro;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }

    public function getSinopse() {
        return $this->sinopse;
    }

    public function setDiretor($diretor) {
        $this->diretor = $diretor;
    }

    public function getDiretor() {
        return $this->diretor;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setProdutora($produtora) {
        $this->produtora = $produtora;
    }

    public function getProdutora() {
        return $this->produtora;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setTrailer($trailer) {
        $this->trailer = $trailer;
    }

    public function getTrailer() {
        return $this->trailer;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setValorLocacao($valorLocacao) {
        $this->valorLocacao = $valorLocacao;
    }

    public function getValorLocacao() {
        return $this->valorLocacao;
    }

    public function insert() {
        
        
        $sql = "INSERT INTO $this->table "
                . "(nome, sinopse, diretor, ano, produtora, quantidade, trailer, status, idUsuario, idCategoria,imagem,valor_locacao) "
                . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->sinopse, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->diretor, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->ano, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->produtora, PDO::PARAM_STR);
        $stmt->bindParam(6, $this->quantidade, PDO::PARAM_INT);
        $stmt->bindParam(7, $this->trailer, PDO::PARAM_STR);
        $stmt->bindParam(8, $this->status, PDO::PARAM_INT);
        $stmt->bindParam(9, $_SESSION['idUsuario'], PDO::PARAM_INT);
        $stmt->bindParam(10, $this->idCategoria, PDO::PARAM_INT);
        $stmt->bindParam(11, $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(12, $this->valorLocacao, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function update() {
        $sql = "UPDATE $this->table SET nome=?,sinopse=?,diretor=?,ano=?,produtora=?,"
                . "quantidade=?,trailer=?,idCategoria=?,imagem=?, valor_locacao=? WHERE idCarro = ?";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->sinopse, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->diretor, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->ano, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->produtora, PDO::PARAM_STR);
        $stmt->bindParam(6, $this->quantidade, PDO::PARAM_INT);
        $stmt->bindParam(7, $this->trailer, PDO::PARAM_STR);
        $stmt->bindParam(8, $this->idCategoria, PDO::PARAM_INT);
        $stmt->bindParam(9, $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(10, $this->valor_locacao, PDO::PARAM_STR);
        $stmt->bindParam(11, $this->idCarro, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateNovo() {
        $sql = "UPDATE $this->table SET nome = ? WHERE idCarro = ?";
        echo $this->nome . $sql . $this->idCarro;
        $stmt = DB::prepare($sql);
        $stmt->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->idCarro, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function upload_imagem($imagem) {

        // Verifica se o arquivo da imagem existe
        if (empty($imagem)) {
            return;
        }

        // Configura os dados da imagem
        // Nome e extensão
        $nome_imagem = strtolower($imagem['name']);
        $ext_imagem = explode('.', $nome_imagem);
        $ext_imagem = end($ext_imagem);
        $nome_imagem = preg_replace('/[^a-zA-Z0-9]/', '', $nome_imagem);
        $nome_imagem .= '_' . mt_rand() . '.' . $ext_imagem;

        // Tipo, nome temporário, erro e tamanho
        $tipo_imagem = $imagem['type'];
        $tmp_imagem = $imagem['tmp_name'];
        $erro_imagem = $imagem['error'];
        $tamanho_imagem = $imagem['size'];

        // Os mime types permitidos
        $permitir_tipos = array(
            'image/bmp',
            'image/x-windows-bmp',
            'image/gif',
            'image/jpeg',
            'image/pjpeg',
            'image/png',
        );

        // Verifica se o mimetype enviado é permitido
        if (!in_array($tipo_imagem, $permitir_tipos)) {
            // Retorna uma mensagem
            echo 'formato invalido';
            return;
        }

        // Tenta mover o arquivo enviado
        if (!move_uploaded_file($imagem['tmp_name'], '../imgCapa/' . $nome_imagem)) {
            // Retorna uma mensagem
            echo 'não foi possivel mover o arquivo';
            return;
        }

        // Retorna o nome da imagem
        return $nome_imagem;
    }

}
