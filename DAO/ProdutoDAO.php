<?php

require_once 'Conexao.php';

define('InserirProduto', 'InserirProdutoDAO');
define('AlterarProduto', 'AlterarProdutoDAO');
define('ExcluirProduto', 'ExcluirProdutoDAO');
define('InserirProdutoTag', 'InserirProdutoDAO');
define('ExcluirProdutoTag', 'ExcluirProdutoDAO');

class ProdutoDAO extends Conexao
{

    /** @var PDO */
    private $conexao;

    /** @var PDOStatement */
    private $sql;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
        $this->sql = new PDOStatement();
    }

    public function InserirProdutoDAO(ProdutoVO $vo)
    {
        $comando_sql = 'insert into tb_produto 
                            (nome_produto, tb_usuario_id_usuario) 
                        value (?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeProduto());
        $this->sql->bindValue($i++, $vo->getIdUser());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), InserirProduto);
            return -7;
        }
    }

    public function AlterarProdutoDAO(ProdutoVO $vo)
    {
        $comando_sql = 'update tb_produto 
                            set nome_produto=?
                            where id_produto = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeProduto());
        $this->sql->bindValue($i++, $vo->getidProduto());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), AlterarProduto);
            return -7;
        }
    }

    public function ExcluirProdutoDAO($idProduto)
    {
        $comando_sql = 'delete from tb_produto where id_produto = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $idProduto);

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), ExcluirProduto);
            return -2;
        }
    }

    public function ConsultarProdutoDAO()
    {
        $comando_sql = 'select	prod.id_produto,
                                prod.nome_produto,
                                count(prodtag.tb_tag_id_tag) as total_de_tags
                        from tb_produto as prod
                            left join  tb_produto_tag as prodtag on prodtag.tb_produto_id_produto = prod.id_produto
                        GROUP BY prod.nome_produto';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ConsultarProdutoSeparadoDAO()
    {
        $comando_sql = 'select 
                            prod.id_produto, 
                            prod.nome_produto
                        from tb_produto as prod
                        where id_produto 
                        not in (select tb_produto_id_produto
                                from tb_produto_tag
                                where tb_produto_id_produto = id_produto)
                        order by nome_produto';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ConsultarProdutoComTagsDAO()
    {
        $comando_sql = 'select prod.id_produto,
                               prod.nome_produto,
                               prodtag.tb_tag_id_tag
                            from tb_produto as produto 

                            inner join tb_produto_tag as prodtag
                                on prod.id_produto = prodtag.tb_tag_id_tag';

        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function AdicionarProdutoTagDAO(ProdutoVO $vo)
    {
        $comando_sql = 'insert into tb_produto_tag
                            (tb_produto_id_produto, tb_tag_id_tag)
                        value (?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);
        $i=1;
        $this->sql->bindValue($i++, $vo->getidProduto());
        $this->sql->bindValue($i++, $vo->getIdTag());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), InserirProdutoTag);
            return -1;
        }
    }

    public function RemoverItemTagDAO(ProdutoVO $vo)
    {
        $comando_sql = 'delete from tb_produto_tag
                            where tb_produto_id_produto = ? AND tb_tag_id_tag = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $i=1;
        $this->sql->bindValue($i++, $vo->getidProduto());
        $this->sql->bindValue($i++, $vo->getIdTag());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), ExcluirProdutoTag);
            return -1;
        }
    }

    public function ConsultarProdutoTagDAO($idProduto)
    {
        $comando_sql = 'select itens.tb_produto_id_produto,
                               itens.tb_tag_id_tag,
                               tag.nome_tag,
                               prod.nome_produto
                            from tb_produto_tag as itens

                            inner join tb_tag as tag
                                on itens.tb_tag_id_tag = tag.id_tag
                            inner join tb_produto as prod
                                on itens.tb_produto_id_produto = prod.id_produto

                            where itens.tb_produto_id_produto = ?';


        $this->sql = $this->conexao->prepare($comando_sql);
        $i = 1;
        $this->sql->bindValue($i++, $idProduto);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function DetalharProdutoDAO($idProduto)
    {
        $comando_sql = 'select *
                        from tb_produto
                        where id_produto=?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $idProduto);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

}
