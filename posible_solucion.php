<?php

// Definir funciones
function generarBloque() {
    $numPisos = rand(1, 10); // Número aleatorio de pisos
    $pisos = [];

    for ($i = 0; $i < $numPisos; $i++) {
        $pisos[] = generarPiso();
    }

    return $pisos;
}

function generarPiso() {
    $puertaInicio = chr(rand(ord('a'), ord('e')));
    $puertaFin = chr(rand($puertaInicio + 1, ord('e')));
    $puertas = range($puertaInicio, $puertaFin);

    return $puertas;
}

function generarVivienda() {
    $numPersonas = rand(1, 8);
    $nombres = cargarNombres();

    $personas = [];
    for ($i = 0; $i < $numPersonas; $i++) {
        $persona = $nombres[rand(0, count($nombres) - 1)];
        $personas[] = "$persona->nombre $persona->apellidos";
    }

    return $personas;
}

function cargarNombres() {
    $json = file_get_contents('nombres.json');
    $nombres = json_decode($json, true);
    return $nombres;
}

// Generar la urbanización
$urbanizacion = [];
for ($i = 0; $i < 3; $i++) {
    $urbanizacion[] = generarBloque();
}

// Mostrar la urbanización
foreach ($urbanizacion as $bloqueNum => $bloque) {
    echo "Bloque $bloqueNum:\n";

    foreach ($bloque as $pisoNum => $piso) {
        echo "  Piso $pisoNum:\n";

        foreach ($piso as $viviendaNum => $vivienda) {
            echo "    Vivienda $viviendaNum:\n";
            foreach ($vivienda as $persona) {
                echo "      - $persona\n";
            }
        }
    }
}

?>