<?php
require_once(__DIR__."/sistema.php");

class PaginaWeb extends Sistema
{
    public function getCasoExito($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from caso_exito";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from caso_exito where id_caso= :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }   
  
}
$paginaWeb= new PaginaWeb;
?>