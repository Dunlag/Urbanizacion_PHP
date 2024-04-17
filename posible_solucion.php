<?php

// Definir funciones

// Función para generar un bloque de pisos aleatorio
function generarBloque()
{
    // Generar un número aleatorio de pisos entre 1 y 10
    $numPisos = rand(1, 10);

    // Inicializar un array para almacenar los pisos del bloque
    $pisos = [];

    // Recorrer cada piso del bloque
    for ($i = 0; $i < $numPisos; $i++) {
        // Generar un piso aleatorio y agregarlo al array de pisos
        $pisos[] = generarPiso();
    }

    // Devolver el array de pisos del bloque
    return $pisos;
}

// Función para generar un piso aleatorio
function generarPiso()
{
    // Generar una letra aleatoria para la puerta inicial del piso (entre 'a' y 'e')
    $puertaInicio = chr(rand(ord('a'), ord('e')));

    // Generar una letra aleatoria para la puerta final del piso (mayor que la puerta inicial y menor o igual que 'e')
    $puertaFin = chr(rand($puertaInicio + 1, ord('e')));

    // Crear un array con las puertas del piso (rango entre puertaInicio y puertaFin)
    $puertas = range($puertaInicio, $puertaFin);

    // Devolver el array de puertas del piso
    return $puertas;
}

// Función para generar una vivienda aleatoria con personas
function generarVivienda()
{
    // Generar un número aleatorio de personas entre 1 y 8
    $numPersonas = rand(1, 8);

    // Cargar la lista de nombres desde un archivo JSON
    $nombres = cargarNombres();

    // Inicializar un array para almacenar las personas de la vivienda
    $personas = [];

    // Recorrer cada persona de la vivienda
    for ($i = 0; $i < $numPersonas; $i++) {
        // Seleccionar un nombre aleatorio de la lista
        $persona = $nombres[rand(0, count($nombres) - 1)];

        // Formatear el nombre completo (nombre y apellidos)
        $personaCompleta = "$persona->nombre $persona->apellidos";

        // Agregar la persona completa al array de personas
        $personas[] = $personaCompleta;
    }

    // Devolver el array de personas de la vivienda
    return $personas;
}

// Función para cargar la lista de nombres desde un archivo JSON
function cargarNombres()
{
    // Leer el contenido del archivo JSON de nombres
    $json = file_get_contents('nombres.json');

    // Decodificar el JSON en un array asociativo
    $nombres = json_decode($json, true);

    // Devolver el array de nombres
    return $nombres;
}

// Generar la urbanización

// Inicializar un array para almacenar los bloques de la urbanización
$urbanizacion = [];

// Generar 3 bloques aleatorios y agregarlos al array de la urbanización
for ($i = 0; $i < 3; $i++) {
    $urbanizacion[] = generarBloque();
}

// Mostrar la urbanización

// Recorrer cada bloque de la urbanización
foreach ($urbanizacion as $bloqueNum => $bloque) {
    // Mostrar el número del bloque
    echo "Bloque $bloqueNum:\n";

    // Recorrer cada piso del bloque
    foreach ($bloque as $pisoNum => $piso) {
        // Mostrar el número del piso
        echo "  Piso $pisoNum:\n";

        // Recorrer cada vivienda del piso
        foreach ($piso as $viviendaNum => $vivienda) {
            // Mostrar el número de la vivienda
            echo "    Vivienda $viviendaNum:\n";

            // Recorrer cada persona de la vivienda
            foreach ($vivienda as $persona) {
                // Mostrar el nombre completo de la persona
                echo "      - $persona\n";
            }
        }
    }
}
