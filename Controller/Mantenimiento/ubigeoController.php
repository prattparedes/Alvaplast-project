<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Mantenimiento/Ubigeo.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el frontend
    if (isset($_POST['id_ubigeo'])) {
        // Si se proporciona id_provincia, obtener distritos
        $id_ubigeo = $_POST['id_ubigeo'];
        $id = substr($id_ubigeo, 0, 2);
        $provincias = Ubigeo::getProvincias($id);
        echo json_encode($provincias);
    } elseif (isset($_POST['id_provincia'])) {
        $id_distritos = $_POST['id_provincia'];
        $id = substr($id_distritos, 0, 4);
        $distritos = Ubigeo::getDistritos($id);
        echo json_encode($distritos);
    }
}
