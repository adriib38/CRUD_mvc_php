<?php
    include('inc/personas.inc.php');

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($personas);
?>