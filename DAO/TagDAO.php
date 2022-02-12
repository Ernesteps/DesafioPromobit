<?php

require_once 'Conexao.php';

define('InserirTag', 'InserirTagDAO');
define('AlterarTag', 'AlterarTagDAO');
define('ExcluirTag', 'ExcluirTagDAO');

class TagDAO extends Conexao
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

    public function InserirTagDAO(TagVO $vo)
    {
        $comando_sql = 'insert into tb_tag
                            (nome_tag, tb_usuario_id_usuario) 
                        value (?,?)';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeTag());
        $this->sql->bindValue($i++, $vo->getIdUser());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), InserirTag);
            return -7;
        }
    }

    public function AlterarTagDAO(TagVO $vo)
    {
        $comando_sql = 'update tb_tag 
                            set nome_tag=?
                            where id_tag = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $i = 1;
        $this->sql->bindValue($i++, $vo->getNomeTag());
        $this->sql->bindValue($i++, $vo->getidTag());

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), AlterarTag);
            return -7;
        }
    }

    public function DetalharTagDAO($idTag)
    {
        $comando_sql = 'select
                            tag.id_tag,
                            tag.nome_tag
                        from tb_tag as tag
                        where tag.id_tag = ?';
        $this->sql = $this->conexao->prepare($comando_sql);

        $this->sql->bindValue(1, $idTag);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ExcluirTagDAO($idTag)
    {
        $comando_sql = 'delete from tb_tag where id_tag = ?';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->bindValue(1, $idTag);

        try {
            $this->sql->execute();
            return 1;
        } catch (Exception $ex) {
            parent::GravarErro($ex->getMessage(), ExcluirTag);
            return -2;
        }
    }

    public function ConsultarTagDAO()
    {
        $comando_sql = 'select	tag.id_tag,
                                tag.nome_tag,
                                count(prodtag.tb_produto_id_produto) as total_de_produtos
                        from tb_tag as tag
                        left join  tb_produto_tag as prodtag on prodtag.tb_tag_id_tag = tag.id_tag
                        GROUP BY tag.nome_tag';
        $this->sql = $this->conexao->prepare($comando_sql);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    public function ConsultarTagFiltradoDAO($codproduto)
    {
        $comando_sql = 'select  tag.id_tag,
                                tag.nome_tag
                        from tb_tag as tag';

        $comando_sql .= ' left join tb_produto_tag as prodtag
	                        on tag.id_tag = prodtag.tb_tag_id_tag > prodtag.tb_produto_id_produto
    
                            where tag.id_tag
                            not in (select prodtag1.tb_tag_id_tag
                                    from tb_produto_tag as prodtag1
                                    where prodtag1.tb_produto_id_produto = ?)';

        $comando_sql .= ' order by nome_tag';

        $this->sql = $this->conexao->prepare($comando_sql);

        $this->sql->bindValue(1, $codproduto);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }

    
    public function ConsultarDetalheTagProdutoDAO($idTag)
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

                            where itens.tb_tag_id_tag = ?';


        $this->sql = $this->conexao->prepare($comando_sql);
        $i = 1;
        $this->sql->bindValue($i++, $idTag);
        $this->sql->setFetchMode(PDO::FETCH_ASSOC);
        $this->sql->execute();

        return $this->sql->fetchAll();
    }
}
