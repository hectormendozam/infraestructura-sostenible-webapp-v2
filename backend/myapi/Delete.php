<?php
namespace Backend\MYAPI;

use Backend\MYAPI\Database;
require_once __DIR__ .'/Database.php';

class Delete extends Database {

    public function __construct($db, $user='root', $pass='12345678') {
        parent::__construct($user,$pass, $db);
    }

    public function delete($id) {
        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
        $this->data = array(
            'status'  => 'error',
            'message' => 'La consulta falló'
        );
        // SE VERIFICA HABER RECIBIDO EL ID
        if (isset($id) && is_numeric($id)) {
            // SANITIZAMOS EL ID PARA EVITAR INYECCIÓN SQL
            $id = $this->conexion->real_escape_string($id);

            $sqlCheck = "SELECT COUNT(*) AS total FROM reportes WHERE proyecto_id = {$id}";
            $resultCheck = $this->conexion->query($sqlCheck);
            if ($resultCheck) {
                $row = $resultCheck->fetch_assoc();
                if ($row['total'] > 0) {
                    $this->data['message'] = "No se puede eliminar el proyecto porque tiene reportes vinculados.";
                    return json_encode($this->data);
                }
            }

             // Si no hay reportes, proceder a marcar como eliminado
            $sql = "UPDATE proyectos SET eliminado = 1 WHERE id = {$id}";
            if ( $this->conexion->query($sql) ) {
                $this->data['status'] =  "success";
                $this->data['message'] =  "Proyecto eliminado correctamente.";
            } else {
                $this->data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        } 
        return json_encode($this->data);
    }
}	
?>