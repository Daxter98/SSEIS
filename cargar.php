<head>
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
</head>

<?php
require __DIR__ . '/vendor/autoload.php';
include 'conexion.php';

if(isset($_FILES['file']))
{
    $file = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];
    $info = pathinfo($file_name);

    $file_type = $_FILES['file']['type'];
    $file_ext = $info['extension'];
    // echo ($file_type);
    // application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
    if ($file_type == "application/vnd.ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") 
    {
        $success = true;
        // Creamos el lector y lo ponemos de solo lectura
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader(ucfirst($file_ext));
        $reader->setReadDataOnly(true);

        // Obtenemos la informacion de las hojas
        $workSheetData = $reader->listWorksheetInfo($file);
        // El archivo solo debe de tener una hoja TODO: Validar
        $workSheetName = $workSheetData[0]['worksheetName'];

        // Cargamos la informacion de la hoja y la colocamos como activa
        $reader->setLoadSheetsOnly($workSheetName);
        $spreadSheet = $reader->load($file);
        $workSheet = $spreadSheet->getActiveSheet();

        // Cargar archivos a MySQL
        $data = $workSheet->toArray(); // Convertimos los datos de la hoja a array.

        //Se asume que tiene mas de una fila por los encabezados
        if (count($data) > 1)
        {
            for ($i=1; $i < count($data); $i++) 
            {
                $query = "INSERT INTO alumno(boleta, a_paterno, a_materno, nombres, foto, correo, correo_tutor) VALUES (?,?,?,?,?,?,?)";
                
                $stmt = mysqli_prepare($conexion, $query);
                mysqli_stmt_bind_param($stmt, 'sssssss', $boleta, $apaterno, $amaterno, $nombres, $foto, $correo, $correo_tutor);
                list($boleta, $apaterno, $amaterno, $nombres, $foto, $correo, $correo_tutor) = $data[$i];

                try {
                    mysqli_stmt_execute($stmt);
                } catch (\Throwable $th) {
                    echo "Error: ".$th->getMessage();

                    echo '<h3>Esto pudo haber sido causado por:</h3>';
                    echo '<ol>' . PHP_EOL;
                    echo '<li>Ya existe un alumno con esa boleta en la B.D</li>';
                    echo '<li>El archivo de excel no tiene el formato correcto. Consulte el manual</li>';
                    echo '</ol>' . PHP_EOL;
                    $success = false;
                }
            }
        }
        
        // Creacion de tabla de resultados si la insercion fue exitosa;
        if($success)
        {
            echo '<h2>Alumnos cargados</h2>';
            echo '<table class="table table-striped"><tbody>' . PHP_EOL;
            foreach ($workSheet->getRowIterator() as $row) 
            {
                echo '<tr>' . PHP_EOL;
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); 
                // Esto recorre todas las celdas,
                // incluso si no se establece un valor de celda.
                // De forma predeterminada, solo las celdas que tienen un valor
                // se repetirá en la iteración.
                foreach ($cellIterator as $cell) {
                    echo '<td>' .
                    $cell->getValue() .
                    '</td>' . PHP_EOL;
                }
                echo '</tr>' . PHP_EOL;
            }
            echo '</tbody></table>' . PHP_EOL;
        }
    } 
    else 
    {
        echo "Archivo no soportado. Por favor, suba un archivo de Excel (Xlsx).";
    }
}
?>