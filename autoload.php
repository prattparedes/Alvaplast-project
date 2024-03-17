<?php
spl_autoload_register(function ($clase) {
    $namespace = str_replace('\\', '/', $clase) . '.php';
    require_once($_SERVER["DOCUMENT_ROOT"] . "/" . $namespace);
});
