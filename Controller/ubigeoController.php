<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/proyectogenesis/Models/maintenance_models/Ubigeo.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el frontend
    if (isset($_POST['id_ubigeo'])) {
        // Si se proporciona id_provincia, obtener distritos
        $id_ubigeo = $_POST['id_ubigeo'];
        $provincias = Ubigeo::getProvincias($id_ubigeo);
        echo json_encode($provincias);
    } elseif (isset($_POST['id_provincia'])) {
        $id_distritos = $_POST['id_provincia'];
        $distritos = Ubigeo::getDistritos($id_distritos);
        echo json_encode($distritos);
    }
}

?>