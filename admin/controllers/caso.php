<?php
require_once(__DIR__."/sistema.php");

class Caso extends Sistema
{
    public function get($id = null)
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
    public function new ($data)
    {
        $this->db();

        $nombreImagen = str_replace(" ","_",$data['caso_exito']);
        $nombreImagen = substr($nombreImagen,0,20);
        $sql = "insert into caso_exito (caso_exito, descripcion, resumen, activo) 
        values (:caso_exito, :descripcion, :resumen, :activo)";
        $sesubio = $this->uploadfile("imagen","upload/caso/", $nombreImagen);    
        
       if($sesubio){
                    $sql = "insert into caso_exito (caso_exito, descripcion, resumen, imagen, activo) 
                    values (:caso_exito, :descripcion, :resumen, :imagen, :activo)";
        }
      
        $st = $this->db->prepare($sql);
        $st->bindParam(":caso_exito", $data['caso_exito'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":resumen", $data['resumen'], PDO::PARAM_STR);
        $st->bindParam(":activo", $data['activo'], PDO::PARAM_BOOL);
        if($sesubio){
            $st -> bindParam(":imagen", $sesubio, PDO::PARAM_STR);
        }
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($data)
    {
        $this->db();
        $nombreImagen = str_replace(" ", "_", $data['caso_exito']);
        $nombreImagen = substr($nombreImagen, 0, 20);
        $sesubio = $this->uploadfile("imagen", "upload/caso/", $nombreImagen);
        if ($sesubio) {
            $sql = "UPDATE caso_exito SET caso_exito=:caso_exito, 
            descripcion=:descripcion, resumen=:resumen, 
            imagen=:imagen, activo=:activo where id_caso= :id";
        } else {
            $sql = "UPDATE caso_exito SET caso_exito=:caso_exito, 
            descripcion =:descripcion, resumen =:resumen,  activo=:activo where id_caso= :id";
        }
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $data['id_caso'], PDO::PARAM_INT);
        $st->bindParam(":caso_exito", $data['caso_exito'], PDO::PARAM_STR);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":resumen", $data['resumen'], PDO::PARAM_STR);
        $st->bindParam(":activo", $data['activo'], PDO::PARAM_BOOL);
        if ($sesubio) {
            $st->bindParam(":imagen", $sesubio, PDO::PARAM_STR);
        }
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    
    public function delete($id)
    {
        $this->db();
        $sql = "delete from caso_exito where id_caso= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }


}
$caso= new Caso;
?>