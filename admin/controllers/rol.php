<?php
require_once(__DIR__."/sistema.php");

class Rol extends Sistema
{

    public function getRol($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from rol";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from rol where id_rol = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getRolPrivi($id_rol)
    {
        $this->db();
        $sql = "select privilegio from privilegio inner join rol_privilegio rp on privilegio.id_privilegio = rp.id_privilegio where id_rol= :id_rol";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getRolesUsuario($id)
    {
        $this->db();

        $sql = "select u.correo,ur.id_usuario, ur.id_rol, rol from usuario u join usuario_rol ur on u.id_usuario = ur.id_usuario
            join rol r on ur.id_rol = r.id_rol where u.id_usuario = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function new($rol, $privilegios)
    {
        try {
            if ($this->newRol($rol)) {
                $rolNuevo = $this->getOneRol($rol);
                if(!is_null($privilegios)){
                    $this->addPrivileges($rolNuevo, $privilegios);
                }
            }
            $rc = 1;
            return $rc;
        } catch (PDOException $Exception) {
            $rc = 0;
            return $rc;
        }
    }
    public function newRol($rol)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $sql = "insert into rol (rol) values (:rol)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":rol", $rol, PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function addPrivileges($id_rol, $privilegios)
    {
        $this->db();
        foreach ($privilegios as $key => $privilegio) {
            try {
                $this->db->beginTransaction();
                $sql = "insert into rol_privilegio (id_rol, id_privilegio) values (:id_rol, :id_privilegio)";
                $st = $this->db->prepare($sql);
                $st->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
                $st->bindParam(":id_privilegio", $privilegio, PDO::PARAM_INT);
                $st->execute();
                $this->db->commit();
            } catch (PDOException $Exception) {
                $rc = 0;
                $this->db->rollBack();
            }
        }
    }

    public function getOneRol($rol)
    {
        $this->db();
        $sql = "select id_rol from rol where rol = :rol";
        $st = $this->db->prepare($sql);
        $st->bindParam(":rol", $rol, PDO::PARAM_STR);
        $st->execute();
        $rolSele = $st->fetchAll(PDO::FETCH_ASSOC);
        return $rolSele[0]['id_rol'];
    }

    public function edit($id_rol, $rol, $privilegios)
    {
        try {
            $this->removePrivi($id_rol);
            $this->updaRol($id_rol, $rol);
            if(!is_null($privilegios)){
                $this->addPrivileges($id_rol, $privilegios);
            }
            $rc = 1;
            return $rc;
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
            return $rc;
        }
    }

    public function removePrivi($id_rol)
    {
        $this->db();
        $sql = "delete from rol_privilegio where id_rol=:id_rol";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
    public function updaRol($id_rol, $rol)
    {
        $this->db();
        $sql = "update rol set rol=:rol where id_rol=:id_rol";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $st->bindParam(":rol", $rol, PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id_rol){
        $this->db();
        $this->removePrivi($id_rol);
        $sql = "delete from rol where id_rol=:id_rol";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}

$rol = new Rol;
?>