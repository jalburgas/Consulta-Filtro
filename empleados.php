<?php
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    ini_set("include_path", "./..;./");
} else {
    ini_set("include_path", "./..:./");
}
require_once (conexion);
$institucion = $_SESSION['INSTITUCION'];
$sede = $_SESSION['SEDE'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta Datos B&aacute;sicos Personal</title>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./DataTables/datatables.min.css">
    <link rel="stylesheet" href="./DataTables/DataTables-1.10.23/dataTables.bootstrap.min.css">
    <link href="./-free-5.15/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #C7CBFC;
        }
        .container {
            margin-top: 20px; /* Reduced margin-top */
        }
        .form-group {
            margin-bottom: 10px; /* Reduced bottom margin */
        }
        .hidden {
            display: none;
        }
        .form-check {
            margin-right: 20px;
            display: inline-flex; /* Change to inline-flex */
            align-items: center; /* Align items in the center */
        }
        .form-check-label {
            white-space: nowrap;
            margin-left: 5px; /* Add space between checkbox and label text */
        }
        table.dataTable th,
        table.dataTable td {
            white-space: nowrap;
            text-align: center; /* Center align the text in table cells */
            vertical-align: middle; /* Vertical alignment in the middle */
        }
        .dataTables_scrollHeadInner, .dataTables_scrollBody table {
            width: 100% !important; /* Ensure the table is 100% width */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="titulo">Consulta Datos B&aacute;sicos Personal</h1>
    <h2>Selecciona los campos a mostrar</h2>
    <form id="campo-form">
<table>
    <tbody>
        <tr>
            <td><div class="form-check">
                <input type="checkbox" value="cedula" id="cedula" checked onchange="toggleColumn('cedula')">
                <label for="cedula" class="form-check-label">CEDULA</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="nombre_uno" id="nombre_uno" checked onchange="toggleColumn('nombre_uno')">
                <label for="nombre_uno" class="form-check-label">NOMBRE UNO</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="nombre_dos" id="nombre_dos" checked onchange="toggleColumn('nombre_dos')">
                <label for="nombre_dos" class="form-check-label">NOMBRE DOS</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="apellido_uno" id="apellido_uno" checked onchange="toggleColumn('apellido_uno')">
                <label for="apellido_uno" class="form-check-label">APELLIDO UNO</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="apellido_dos" id="apellido_dos" checked onchange="toggleColumn('apellido_dos')">
                <label for="apellido_dos" class="form-check-label">APELLIDO DOS</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="edocivil" id="edocivil" checked onchange="toggleColumn('edocivil')">
                <label for="edocivil" class="form-check-label">ESTADO CIVIL</label>
                </div>
            </td>
        </tr>
        <tr>
            <td><div class="form-check">
                <input type="checkbox" value="sexo" id="sexo" checked onchange="toggleColumn('sexo')">
                <label for="sexo" class="form-check-label">SEXO</label>
                </div>
            </td>
            <td> <div class="form-check">
                <input type="checkbox" value="fecha_nacimiento" id="fecha_nacimiento" checked onchange="toggleColumn('fecha_nacimiento')">
                <label for="fecha_nacimiento" class="form-check-label">FECHA NACIMIENTO</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="nacionalidad" id="nacionalidad" checked onchange="toggleColumn('nacionalidad')">
                <label for="nacionalidad" class="form-check-label">NACIONALIDAD</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="tipo_discapacidad" id="tipo_discapacidad" checked onchange="toggleColumn('tipo_discapacidad')">
                <label for="tipo_discapacidad" class="form-check-label">TIPO DISCAPACIDAD</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="Talla_camisa" id="Talla_camisa" checked onchange="toggleColumn('Talla_camisa')">
                <label for="Talla_camisa" class="form-check-label">TALLA CAMISA</label>
                </div>
            </td>
            <td> <div class="form-check">
                <input type="checkbox" value="email" id="email" checked onchange="toggleColumn('email')">
                <label for="email" class="form-check-label">EMAIL</label>
                </div>
            </td>
        </tr>
        <tr>
            <td><div class="form-check">
                <input type="checkbox" value="telfhab" id="telfhab" checked onchange="toggleColumn('telfhab')">
                <label for="telfhab" class="form-check-label">TELFHAB</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="telfcel" id="telfcel" checked onchange="toggleColumn('telfcel')">
                <label for="telfcel" class="form-check-label">TELFCEL</label>
                </div>
            </td>
            <td><div class="form-group">
            <div class="form-check">
                <input type="checkbox" value="nro_cuenta" id="nro_cuenta" checked onchange="toggleColumn('nro_cuenta')">
                <label for="nro_cuenta" class="form-check-label">NRO CUENTA</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="cargo" id="cargo" checked onchange="toggleColumn('cargo')">
                <label for="cargo" class="form-check-label">CARGO</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="categoria" id="categoria" checked onchange="toggleColumn('categoria')">
                <label for="categoria" class="form-check-label">CATEGORIA</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="departamento" id="departamento" checked onchange="toggleColumn('departamento')">
                <label for="departamento" class="form-check-label">DEPARTAMENTO</label>
                </div>
            </td>
        </tr>
        <tr>
            <td> <div class="form-check">
                <input type="checkbox" value="condicion" id="condicion" checked onchange="toggleColumn('condicion')">
                <label for="condicion" class="form-check-label">CONDICION</label>
                </div>
            </td>
             <td><div class="form-check">
                <input type="checkbox" value="fecha_ingreso" id="fecha_ingreso" checked onchange="toggleColumn('fecha_ingreso')">
                <label for="fecha_egreso" class="form-check-label">FECHA INGRESO</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="fecha_egreso" id="fecha_egreso" checked onchange="toggleColumn('fecha_egreso')">
                <label for="fecha_egreso" class="form-check-label">FECHA EGRESO</label>
                </div>
            </td>
            <td> <div class="form-group">
            <div class="form-check">
                <input type="checkbox" value="tipo_nomina" id="tipo_nomina" checked onchange="toggleColumn('tipo_nomina')">
                <label for="tipo_nomina" class="form-check-label">TIPO NOMINA</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="hr_diurna" id="hr_diurna" checked onchange="toggleColumn('hr_diurna')">
                <label for="hr_diurna" class="form-check-label">HR DIURNA</label>
                </div>
            </td>
            <td> <div class="form-check">
                <input type="checkbox" value="hr_nocturna" id="hr_nocturna" checked onchange="toggleColumn('hr_nocturna')">
                <label for="hr_nocturna" class="form-check-label">HR NOCTURNA</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="hr_administrativa" id="hr_administrativa" checked onchange="toggleColumn('hr_administrativa')">
                <label for="hr_administrativa" class="form-check-label">HR ADMINISTRATIVA</label>
                </div>
            </td>
        </tr>
        <tr>
            <td><div class="form-check">
                <input type="checkbox" value="sueldo" id="sueldo" checked onchange="toggleColumn('sueldo')">
                <label for="hr_administrativa" class="form-check-label">SUELDO</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="bn" id="bn" checked onchange="toggleColumn('bn')">
                <label for="hr_administrativa" class="form-check-label">BN</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="bua" id="bua" checked onchange="toggleColumn('bua')">
                <label for="hr_administrativa" class="form-check-label">BUA</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="bav" id="bav" checked onchange="toggleColumn('bav')">
                <label for="bav" class="form-check-label">BAV</label>
                </div>
            </td>
            <td> <div class="form-check">
                <input type="checkbox" value="cts" id="cts" checked onchange="toggleColumn('cts')">
                <label for="hr_administrativa" class="form-check-label">CTS</label>
                </div>
            </td>
            <td><div class="form-check">
                <input type="checkbox" value="prima" id="prima" checked onchange="toggleColumn('prima')">
                <label for="hr_administrativa" class="form-check-label">PRIMA</label>
                </div>
            </td>
        </tr>
        <tr>
            <td> <div class="form-check">
                <input type="checkbox" value="devengado" id="devengado" checked onchange="toggleColumn('devengado')">
                <label for="hr_administrativa" class="form-check-label">DEVENGADO</label>
                </div>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
</tbody>
</table>
</form>
</div>
    <table id="pro" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="cedula">CEDULA</th>
                <th class="nombre_uno">NOMBRE UNO</th>
                <th class="nombre_dos">NOMBRE DOS</th>
                <th class="apellido_uno">APELLIDO UNO</th>
                <th class="apellido_dos">APELLIDO DOS</th>
                <th class="edocivil">ESTADP_CIVIL</th>
                <th class="sexo">SEXO</th>
                <th class="fecha_nacimiento">FECHA_NAC</th>
                <th class="nacionalidad">NACIONALIDAD</th>
                <th class="tipo_discapacidad">TIPO_DISCAPACIDAD</th>
                <th class="Talla_camisa">TALLA CAMISA</th>
                <th class="email">EMAIL</th>
                <th class="telfhab">TELEFONO_HABITACION</th>
                <th class="telfcel">TELEFONO_CELULAR</th>
                <th class="nro_cuenta">MRO_CUENTA</th>
                <th class="cargo">CARGO</th>
                <th class="categoria">CATEGORIA</th>
                <th class="departamento">DEPARTAMENTO</th>
                <th class="condicion">CONDICION</th>
                <th class="fecha_ingreso">FECHA INGRESO</th>
                <th class="fecha_egreso">FECHA EGRESO</th>
                <th class="tipo_nomina">TIPO_NOMINA</th>
                <th class="hr_diurna">HORAS_DIURNAS</th>
                <th class="hr_nocturna">HORAS_NOCTURNAS</th>
                <th class="hr_administrativa">HORAS_ADMINISTRATIVAS</th>
                <th class="sueldo">SUELDO</th>
                <th class="bn">BN</th> 
                <th class="bua">BUA</th>  
                <th class="bav">BAV</th>                 
                <th class="cts">CTS</th>
                <th class="prima">PRIMA</th> 
                <th class="devengado">DEVENGADO</th>                 
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = sprintf("EXEC wCons_datos_empleados @institucion = %u, @sede = %u", $institucion, $sede);
            $stmt = odbc_exec($cnxODBC, $sql);
            while ($row = odbc_fetch_array($stmt)) {
                echo '<tr>';
                echo '<td class="cedula">' . $row['cedula'] . '</td>';
                echo '<td class="nombre_uno">' . $row['nombre_uno'] . '</td>';
                echo '<td class="nombre_dos">' . $row['nombre_dos'] . '</td>';
                echo '<td class="apellido_uno">' . $row['apellido_uno'] . '</td>';
                echo '<td class="apellido_dos">' . $row['apellido_dos'] . '</td>';
                echo '<td class="edocivil">' . $row['edocivil'] . '</td>';
                echo '<td class="sexo">' . $row['sexo'] . '</td>';
                echo '<td class="fecha_nacimiento">' . substr($row['fecha_nacimiento'],0,10) . '</td>';
                echo '<td class="nacionalidad">' . $row['nacionalidad'] . '</td>';
                echo '<td class="tipo_discapacidad">' . $row['tipo_discapacidad'] . '</td>';
                echo '<td class="Talla_camisa">' . $row['Talla_camisa'] . '</td>';
                echo '<td class="email">' . $row['email'] . '</td>';
                echo '<td class="telfhab">' . $row['telfhab'] . '</td>';
                echo '<td class="telfcel">' . $row['telfcel'] . '</td>';
                echo '<td class="nro_cuenta">' . $row['nro_cuenta'] . '</td>';
                echo '<td class="cargo">' . $row['cargo'] . '</td>';
                echo '<td class="categoria">' . $row['categoria'] . '</td>';
                echo '<td class="departamento">' . $row['departamento'] . '</td>';
                echo '<td class="condicion">' . $row['condicion'] . '</td>';
                echo '<td class="fecha_ingreso">' . $row['fecha_ingreso'] . '</td>';
                echo '<td class="fecha_egreso">' . $row['fecha_egreso'] . '</td>';
                echo '<td class="tipo_nomina">' . $row['tipo_nomina'] . '</td>';
                echo '<td class="hr_diurna">' . $row['hr_diurna'] . '</td>';
                echo '<td class="hr_nocturna">' . $row['hr_nocturna'] . '</td>';
                echo '<td class="hr_administrativa">' . $row['hr_administrativa'] . '</td>';
                echo '<td class="sueldo">' . number_format($row['sueldo'], 2, '.', ',') . '</td>';
                echo '<td class="bn">' . number_format($row['BN'], 2, '.', ',') . '</td>';
                echo '<td class="bua">' . number_format($row['BUA'], 2, '.', ',') . '</td>';
                echo '<td class="bav">' . number_format($row['BAV'], 2, '.', ',') . '</td>';
                echo '<td class="cts">' . number_format($row['CTS'], 2, '.', ',') . '</td>';
                echo '<td class="prima">' .  number_format($row['PRIMA'], 2, '.', ',') . '</td>';
                echo '<td class="devengado">' . number_format($row['devengado'], 2, '.', ',') . '</td>';                
                echo '</tr>';
            }
            odbc_free_result($stmt);
            ?>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="./DataTables/datatables.min.js"></script>
<script src="./DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
<script src="./DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script src="./DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="./DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="./DataTables/Buttons-1.6.5/js/buttons.html5.min.js"></script>
<script src="./fontawesome-free-5.15.1-web/js/all.js"></script>
<script>
function toggleColumn(columnClass) {
    var isChecked = document.getElementById(columnClass).checked;
    var elements = document.getElementsByClassName(columnClass);

    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = isChecked ? '' : 'none';
    }
}

$(document).ready(function() {
    var table = $('#pro').DataTable({
        scrollY: 400,
        scrollX: true,
        deferRender: true,
        stateSave: true,
        "aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<button class="btn btn-info"><i class="fas fa-copy"></i>',
                titleAttr: 'Copy',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]}
            },
            {
                extend:    'csvHtml5',
                text:      '<button class="btn btn-primary"> <i class="fas fa-file-csv"></i>',
                titleAttr: 'CSV',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]}
            },
            {
                extend: 'excelHtml5',
                text: '<button class="btn btn-success"> <i class="fas fa-file-excel"></i></button>',
                title: 'Empleados',
                exportOptions: {
                    columns: function(idx, data, node) {
                        return $(node).css('display') !== 'none';
                    }
                }
            },
            {
                extend:    'pdfHtml5',
                text:      '<button class="btn btn-danger"> <i class="fas fa-file-pdf"></i>',
                titleAttr: 'PDF',
                orientation: 'landscape',
                pageSize: 'letter',
                exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]}
            }
        ]
    });

    $('#campo-form input[type="checkbox"]').on('change', function() {
        var columnClass = $(this).attr('id');
        var isChecked = $(this).prop('checked');
        var column = table.column('.' + columnClass);
        if (isChecked) {
        column.visible(isChecked);
            table.columns.adjust().draw(false); // Adjust columns without resetting pagination
        } else {
            table.columns.adjust().draw(true); // Adjust columns without resetting pagination
        }
    });

    table.columns.adjust().draw(); // Adjust columns after the table is fully initialized
});
</script>

</body>
</html>

