<?php
require_once '../db/Database.php';

class Tarjeta
{

    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function selectTarjeta($idUsuario)
    {
        $sql = "SELECT tarjeta.numerotarjeta FROM tarjeta WHERE tarjeta.usuario_id='$idUsuario' AND tarjeta.activo=1";
        $resultados = $this->bd->query($sql);
        while ($row = $resultados->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function insertarTarjeta($idUsuario, $pin,  $numeroTarjeta)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO tarjeta(numerotarjeta,pin,activo,usuario_id)VALUES ('$numeroTarjeta','$pin',1,'$idUsuario')";
            $resultado = $this->bd->query($sql);
            $this->bd->commit();
            return $resultado;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function selectTarjetaNumero($numero)
    {
        $sql = "SELECT tarjeta.id, tarjeta.numerotarjeta,tarjeta.activo,usuario.cedula FROM tarjeta
         INNER JOIN usuario ON tarjeta.usuario_id=usuario.id WHERE tarjeta.numerotarjeta= '$numero' 
         AND tarjeta.activo=1";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function selectTarjetaCedula($cedula)
    {
        $sql = "SELECT tarjeta.id, tarjeta.numerotarjeta,tarjeta.activo,usuario.cedula FROM tarjeta
         INNER JOIN usuario ON tarjeta.usuario_id=usuario.id WHERE usuario.cedula= '$cedula' 
         AND tarjeta.activo=1";
        $resultados = $this->bd->query($sql);
        if ($resultados->num_rows > 0) {
            while ($row = $resultados->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }
    function updateTarjetaActiva($numeroTarjeta)
    {
        try {
            $sql = "UPDATE tarjeta SET tarjeta.activo=0 WHERE tarjeta.numerotarjeta='$numeroTarjeta'";
            $this->bd->query($sql);

            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function actualizarTarjeta($numeroTarjeta, $pin)
    {
        try {
            $sql = "UPDATE tarjeta SET tarjeta.pin='$pin' WHERE tarjeta.numerotarjeta='$numeroTarjeta'";
            $this->bd->query($sql);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
}
