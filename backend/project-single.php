<?php
    use Backend\MYAPI\Read as Read;

    require_once __DIR__.'/MYAPI/Read.php';

    $productos = new Read('infraestructura_test');
    $productos->single( $_POST['id'] );
    echo $productos->getData();
?>