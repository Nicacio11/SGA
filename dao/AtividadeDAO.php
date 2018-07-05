<?php
  class AtividadeDAO extends BaseDAO{

    public function __construct(){
      parent::__construct();
    }

    public function adicionar($atividade){
      $sql->$this->db->prepare("INSERT INTO atividade (titulo, descricao, foto, tipo, idUsuario) VALUES(:titulo, :descricao, :foto, :tipo, :idUsuario)");
      $sql->bindValue(":titulo", $atividade->getTitulo());
      $sql->bindValue(":descricao", $atividade->getDescricao());
      $sql->bindValue(":foto", $atividade->getFoto());
      $sql->bindValue(":tipo", $atividade->getTipo());
      $sql->bindValue(":idUsuario", unserialize($_SESSION['usuario'])->getId());
      $sql->execute();
    }

    public function getAtividades(){
        $array = array();

        $sql = $this->db->query("SELECT titulo, descricao, foto, tipo, idUsuario FROM atividade");
        if($sql ->rowCount()>0){
          foreach ($sql->fetchAll() as $activity) {
            $atividade = new Atividade($activity['id'],
                                      $activity['titulo'],
                                      $activity['descricao'],
                                      $activity['foto'],
                                      $activity['idUsuario']);
            $array[] = $atividade;
          }
        }
        return $array;

    }
  }
