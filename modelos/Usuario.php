<?php
require_once '../db/Database.php';

class Usuario
{

    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function selectUsuarioPorTarjeta($llave, $pin)
    {
        $sql = "SELECT usuario.id,usuario.cedula,usuario.nombre,usuario.apellido, usuario.nivel_usuario_id FROM 
        usuario INNER JOIN tarjeta ON usuario.id= tarjeta.usuario_id WHERE tarjeta.numerotarjeta='$llave' AND tarjeta.pin='$pin'";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function selectUsuarioCedula($cedula)
    {
        $sql = "SELECT * FROM usuario  WHERE usuario.cedula='$cedula' AND usuario.activo=1";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function insertUsuario($nombre, $apellido, $cedula)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO usuario(nombre,apellido, cedula,activo,nivel_usuario_id)VALUES ('$nombre','$apellido','$cedula',1,2)";
            $this->bd->query($sql);
            $id = $this->bd->insert_id;
            $this->bd->commit();
            return $id;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function updateUsuarioActivo($cedula)
    {
        try {
            $sql = "UPDATE usuario SET usuario.activo=0 WHERE usuario.cedula='$cedula'";
            $this->bd->query($sql);
            $id = $this->bd->insert_id;
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
}
