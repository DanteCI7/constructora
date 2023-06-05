<?php
require_once(__DIR__."/sistema.php");
class Usuario extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from usuario";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from usuario where id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getRolUsuario($id_usuario)
    {
        $this->db();
        $sql = "select rol from rol  inner join usuario_rol ur on rol.id_rol = ur.id_rol where id_usuario =:id_usuario";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getId($correo)
    {
        $this->db();
            $sql = "select id_usuario from usuario where correo=:correo";
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $correo, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['id_usuario'];
    }

    

    public function new($data, $roles)
    {
        try{
            if($this->insertUser($data)){
                $id_usuario = $this->getId($data['correo']);
                $this->addRoles($id_usuario, $roles);
                $rc = 1;
            }
        }
        catch (PDOException $Exception){
            $rc = 0;
        }
        return $rc;
    }

    public function insertUser($data){
        $this->db();
        try {
            $this->db->beginTransaction();
            $sql = "INSERT into usuario (correo, contrasena) 
            values (:correo, md5(:contrasena))";
            $st = $this->db->prepare($sql);
            $st->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function newRol($id, $data)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $sql = "INSERT into usuario_rol (id_usuario, id_rol) 
            values (:id_usuario, :id_rol)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_usuario", $id[0]['id_usuario'], PDO::PARAM_INT);
            $st->bindParam(":id_rol", $data['id_rol'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function editRol($data)
    {
        $this->db();
        try{
            $this->db->beginTransaction();  
            $sql = "UPDATE usuario_rol SET id_rol =:id_rol where id_usuario =:id_usuario";

        $st = $this->db->prepare($sql);
            $st->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
            $st->bindParam(":id_rol", $data['id_rol'], PDO::PARAM_INT);
        
        $st->execute();
        $rc = $st->rowCount();
        $this->db->commit();
        }catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollback();
        }
        return $rc;
    }


    public function delete($id)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
        $sql = "delete from usuario where id_usuario= :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        
        $sql2 = "delete from usuario_rol where id_usuario= :id";
        $st2 = $this->db->prepare($sql2);
        $st2->bindParam(":id", $id, PDO::PARAM_INT);
        $st2->execute();
        
        $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollback();
        }
        return $rc;
    }

    public function getRolNotUser(){
        $this->db();
        $sql = "select * from rol where rol != 'usuario'";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function edit($id_usuario, $correo, $roles)
    {
        try {
            $this->removeRoles($id_usuario);
            $this->updaUser($id_usuario, $correo);
            if(!is_null($roles)){
                $this->addRoles($id_usuario, $roles);
            }
            $rc = 1;
            return $rc;
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
            return $rc;
        }
    }

    public function removeRoles($id_usuario)
    {
        $this->db();
        $sql = "delete from usuario_rol where id_usuario=:id_usuario";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function updaUser($id_usuario, $correo)
    {
        $this->db();
        $sql = "update usuario set correo=:correo where id_usuario=:id_usuario";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $st->bindParam(":correo", $correo, PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function addRoles($id_usuario, $roles)
    {
        $this->db();
        foreach ($roles as $key => $rol) {
            try {
                $this->db->beginTransaction();
                $sql = "insert into usuario_rol (id_usuario, id_rol) values (:id_usuario, :id_rol)";
                $st = $this->db->prepare($sql);
                $st->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
                $st->bindParam(":id_rol", $rol, PDO::PARAM_INT);
                $st->execute();
                $this->db->commit();
            } catch (PDOException $Exception) {
                $rc = 0;
                $this->db->rollBack();
            }
        }
    }

}

$usuario = new Usuario; 
?>
