<?php

  class TestemunhoDAO extends BaseDAO{

      public function __construct(){
        parent::__construct();
      }

      public function adicionar($testemunho){
        $retorno = false;
        try{

          $sql = $this->db->prepare(
            "INSERT INTO testemunho VALUES(null,:Usuario_idUsuario, :email, :descricao, :nome)"
          );
          $sql->bindValue(":email", $testemunho->getEmail());
          $sql->bindValue(":descricao", $testemunho->getDescricao());
          $sql->bindValue(":nome", $testemunho->getNome());
          $sql->bindValue(":Usuario_idUsuario", unserialize($_SESSION['usuario'])->getId());
          if($sql->execute()){
            $retorno = true;
          }
        }catch(Exception $e){
          throw $e->getMessage();
        }
        return $retorno;

      }
      public function getTestemunhos($page, $perPage){
        $offset = ($page - 1) * $perPage;

        $testemunhos = array();
        $sql= $this->db->prepare("SELECT testemunho.idTestemunho,
           testemunho.email,
           testemunho.descricao,
           testemunho.nome as testemunhoPessoa,
           usuario.nome as usuarionome
           FROM testemunho
           INNER JOIN usuario on usuario.idUsuario=testemunho.Usuario_idUsuario
           LIMIT $offset, $perPage;");
        $sql->execute();

        if($sql->rowCount()>0){
          foreach($sql->fetchAll() as $test){
            $testemunho = new Testemunho();
            $testemunho->setEmail($test['email']);
            $testemunho->setDescricao($test['descricao']);
            $testemunho->setId($test['idTestemunho']);
            $testemunho->setNome($test['testemunhoPessoa']);
            $usuario = new Usuario();
            $usuario->setNome($test['usuarionome']);
            $testemunho->setUsuario($usuario);
            $testemunhos[] =$testemunho;
          }
          return $testemunhos;
        }
      }
      public function getTestemunhosLike($like ,$page, $perPage){
        $offset = ($page - 1) * $perPage;

        $testemunhos = array();
        $sql= $this->db->prepare("SELECT testemunho.idTestemunho,
           testemunho.email,
           testemunho.descricao,
           testemunho.nome as testemunhoPessoa,
           usuario.nome as usuarionome
           FROM testemunho
           INNER JOIN usuario on usuario.idUsuario=testemunho.Usuario_idUsuario
           WHERE testemunho.nome LIKE '%$like%'
           ;");
        $sql->execute();

        if($sql->rowCount()>0){
          foreach($sql->fetchAll() as $test){
            $testemunho = new Testemunho();
            $testemunho->setEmail($test['email']);
            $testemunho->setDescricao($test['descricao']);
            $testemunho->setId($test['idTestemunho']);
            $testemunho->setNome($test['testemunhoPessoa']);
            $usuario = new Usuario();
            $usuario->setNome($test['usuarionome']);
            $testemunho->setUsuario($usuario);
            $testemunhos[] =$testemunho;
          }
          return $testemunhos;
        }
      }

      public function getTestemunho($id){
        $testemunho;
        $sql = $this->db->prepare("SELECT idTestemunho, nome, email, descricao FROM testemunho WHERE idTestemunho=:id");
        $sql->bindValue("id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
          $dado = $sql->fetch();
          $testemunho = new Testemunho();
          $testemunho->setEmail($dado['email']);
          $testemunho->setDescricao($dado['descricao']);
          $testemunho->setId($dado['idTestemunho']);
          $testemunho->setNome($dado['nome']);
          return $testemunho;
        }
        return null;
      }
  public function apagar($id){
    $retorno = false;
    try{
        if(!empty($id)){
          $sql = $this->db->prepare("DELETE FROM testemunho WHERE idTestemunho=:id");
          $sql->bindValue("id", $id);
          if($sql->execute()){
            $retorno = true;
          }
        }
      }catch(Exception $e){
        throw $e->getMessage();
      }
    return $retorno;
  }
  public function alterar($testemunho){
    $retorno = false;
    try{
      $sql = $this->db->prepare("UPDATE testemunho SET email=:email, nome=:nome, descricao=:descricao WHERE idTestemunho = :id");
      $sql->bindValue(":email", $testemunho->getEmail());
      $sql->bindValue(":nome", $testemunho->getNome());
      $sql->bindValue(":descricao", $testemunho->getDescricao());
      $sql->bindValue(":id", $testemunho->getId());
      if($sql->execute()){
        $retorno = true;
      }
    }catch(Exception $e){
      throw $e->getMessage();
    }
    return $retorno;
  }
  public function getTotal(){
    $sql = $this->db->query("SELECT COUNT(*) as c FROM testemunho");
    $data = $sql->fetch();

    return $data['c'];
  }
}
 ?>
