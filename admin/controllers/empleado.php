<?php
require_once(__DIR__."/sistema.php");
class Empleado extends Sistema
{
    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from empleado e  left join departamento d 
            on e.id_departamento = d.id_departamento ";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from empleado e  left join departamento d 
            on e.id_departamento = d.id_departamento where e.id_empleado=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function convImgToBlob($path)
    {
        $mimetype = "image/".pathinfo($path,PATHINFO_EXTENSION);
        $source = file_get_contents($path);
        $base64 = base64_encode($source);
        return $source;
    }
    public function new($data)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO empleado (nombre, primer_apellido, segundo_apellido,
            fechaNacimiento, rfc, curp, foto, id_departamento) 
            VALUES (:nombre, :primerApellido, :segundoApellido, :fechaNacimiento, 
            :rfc, :curp, :foto, :id_departamento)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
            $st->bindParam(":fechaNacimiento", $data['fechaNacimiento'], PDO::PARAM_STR);
            $st->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
            $st->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
            $st->bindParam(":foto", $data['foto'], PDO::PARAM_LOB);
            $st->bindParam(":id_departamento", $data['id_departamento'], PDO::PARAM_INT);

            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            //print "DBA FAIL:" . $Exception->getMessage();
            $this->db->rollBack();
        }
        unlink("./views/empleado/foto.png");
        return $rc;
    }

    public function edit($data)
    {
        $this->db();
        try {
            $this->db->beginTransaction();
            $sql = "UPDATE empleado SET nombre =:nombre, primer_apellido =:primer_apellido,
            segundo_apellido =:segundo_apellido, fechaNacimiento =:fechaNacimiento,
            rfc =:rfc, curp =:curp, foto=:foto, id_departamento =:id_departamento where id_empleado =:id_empleado";

            $st = $this->db->prepare($sql);
            $st->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $st->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $st->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
            $st->bindParam(":fechaNacimiento", $data['fechaNacimiento'], PDO::PARAM_STR);
            $st->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
            $st->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
            $st->bindParam(":foto", $data['foto'], PDO::PARAM_LOB);
            $st->bindParam(":id_departamento", $data['id_departamento'], PDO::PARAM_INT);
            $st->bindParam(":id_empleado", $data['id_empleado'], PDO::PARAM_INT);

            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
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
            $sql = "DELETE FROM empleado WHERE id_empleado=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();

            $rc = $st->rowCount();
            $this->db->commit();

        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollback();
        }

        return $rc;
    }

    
    public function validarRFC($valor){
        $valor = str_replace("-", "", $valor); 
        $Valor4 = substr($valor, 3, 1);
        //Caso 1: Sin homoclave

        if(strlen($valor)==10){
            $letras = substr($valor, 0, 4); 
            $numeros = substr($valor, 4, 6);
            if (ctype_alpha($letras) && ctype_digit($numeros)) { 
                return true;
            }
            return false;            
        }

        // Caso 2: solo homoclave
        else if (strlen($valor) == 3) {
            $homoclave = $valor;
            if(ctype_alnum($homoclave)){
                return true;
            }
            return false;
        }
        
        //Caso 3: persona moral
        else if (ctype_digit($Valor4) && strlen($valor) == 12) { 
            $letras = substr($valor, 0, 3); 
            $numeros = substr($valor, 3, 6); 
            $homoclave = substr($valor, 9, 3); 
            if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) { 
                return true; 
            } 
            return false;

        //Caso 4: persona fisica. 
        } else if (ctype_alpha($Valor4) && strlen($valor) == 13) { 
            $letras = substr($valor, 0, 4); 
            $numeros = substr($valor, 4, 6);
            $homoclave = substr($valor, 10, 3); 
            if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) { 
                return true; 
            }
            return false; 
        }else { 
            return false; 
        }  
 }

 function validarCURP($valor) {     
    if(strlen($valor)==18){         
       $letras= substr($valor, 0, 4);
       $numeros= substr($valor, 4, 6);   
       $sexo= substr($valor, 10, 1);
       $mxState= substr($valor, 11, 2); 
       $letras2 = substr($valor, 13, 3);

       echo ctype_alpha($letras);
       echo ctype_alpha($letras2);
       echo ctype_digit($numeros);
       
         if(ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros)  && $this->is_mx_state($mxState) && $this->is_sexo_curp($sexo)){ 
           return true; 
       }         
   return false;
    }else{
        return false; 
   } 
}

function is_mx_state($state){     
    $mxStates = [         
        'AS','BS','CL','CS','DF','GT',         
        'HG','MC','MS','NL','PL','QR',         
        'SL','TC','TL','YN','NE','BC',         
        'CC','CM','CH','DG','GR','JC',         
        'MN','NT','OC','QT','SP','SR',         
        'TS','VZ','ZS'     
    ];     
    if(in_array(strtoupper($state),$mxStates)){         
        return true;     
    }     
    return false; 
}

function is_sexo_curp($sexo){     
    $sexoCurp = ['H','M'];     
    if(in_array(strtoupper($sexo),$sexoCurp)){         
       return true;     
    }     
    return false; 
}
}

$empleado = new Empleado; //Objeto de la clase Empleado
?>