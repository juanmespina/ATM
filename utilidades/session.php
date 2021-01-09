<?php
session_start();
if (!isset($_SESSION['nombre']) && !isset($_SESSION['idusuario']) && !isset($_SESSION['cedula'])) {
    header('Location:../../../index.php');
}
