<!doctype html>
<html lang="es">

<head>
    <title>Cedula de registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <img style="padding:16px;" src="{{ public_path('assets/images/registrocedula.png') }}" alt="Arriba" width='100%' />
    </header>

    <footer>
        Copyright &copy; <?php echo date('d/m/y'); ?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p class="text-center"><b>Universidad Politécnica de Quintana Roo</b><br>Dirección de Vinculación, Difusión y
            Extensión Universitaria</p>
        <div>
            <div class="text-center" style="display: inline-block; width:550px;"><b></b></div>
            <div class="text-right" style="display: inline-block; width:140px;">
                <div style="display: inline-block;">Estancia:</div>
                <div class="datos" style="width: 60px; display: inline-block;"> </div>
            </div>
        </div>
        <div class="panel">
            Datos del Alumno/a:
        </div>
        <table class="table table-borderless p-0 m-0">
            <tr class="p-0 m-0">
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->apepalumno}}"></small></div>
                        <div class="subT text-center"><small>Apellido Paterno</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->apemalumno}}"></small></div>
                        <div class="subT text-center"><small>Apellido Materno</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->nombrealumno}}"></small></div>
                        <div class="subT text-center"><small>Nombre(s)</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->numerotelalumno}}"></small></div>
                        <div class="subT text-center"><small>Teléfono</small></div>
                    </div>
                </th>
            </tr>
            <tr class="p-0 m-0">
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->matricula}}"></small></div>
                        <div class="subT text-center"><small>Matricula</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->Carreraalumno}}"></small></div>
                        <div class="subT text-center"><small>Carrera</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->emailalumno}}"></small></div>
                        <div class="subT text-center"><small>E-mail(PERSONAL)</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$requets->emailacademicoalumno}}"></small></div>
                        <div class="subT text-center"><small>E-mail(UPQROO)</small></div>
                    </div>
                </th>
            </tr>
            <tr class="p-0 m-0">
                <th class="p-1">
                    <div>
                        <small><input type="text" class="datos" value="{{$request->segurosocial}}"></small></div>
                        <div class="subT text-center"><small>No.SS</small></div>
                    </div>
                </th>
                <td colspan="3" class="p-1">
                    <div>
                        <div id="contenedor">
                            <div id="texto" class="datos-big">{{$request->direccionalumno}}</div>
                        </div>
                        <div class="subT text-center"><small>Dirección</small></div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="panel">
            Datos de la Empresa:
        </div>
        <table class="table table-borderless p-0 m-0">
            <tr class="p-0 m-0">
                <td colspan="3" class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->NombreEmpresa}}"><small></small></div>
                        <div class="subT text-center"><small>Nombre Comercial o Público</small></div>
                    </div>
                </td>
                <th class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->tipoempresa}}"><small></small></div>
                        <div class="subT text-center"><small>Giro</small></div>
                    </div>
                </th>
                <th colspan="2" class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->tamañoempresa}}"><small></small></div>
                        <div class="subT text-center"><small>Tipo</small></div>
                    </div>
                </th>
            </tr>
            <tr class="p-0 m-0">
                <td colspan="6" class="p-1">
                    <div>
                        <div id="contenedor">
                            <div id="texto" class="datos-big">{{$request->direccionempresa}}</div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="p-0 m-0">
                <th class="p-0" rowspan="2" style="vertical-align : middle;text-align:center;">
                    <div>
                        <div class="subT text-center"><small>Responsable de RH:</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->apepHR}}"><small></small></div>
                        <div class="subT text-center"><small>Apellido Paterno</small></div>
                    </div>
                </th>
                <td colspan="2" class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->apemHR}}"><small></small></div>
                        <div class="subT text-center"><small>Apellido Materno</small></div>
                    </div>
                </td>
                <td colspan="2" class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->nombreHR}}"><small></small></div>
                        <div class="subT text-center"><small>Nombre(s)</small></div>
                    </div>
                </td>
            </tr>
            <tr class="p-0 m-0">
                <th class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->numeroHR}}"><small></small></div>
                        <div class="subT text-center"><small>Número</small></div>
                    </div>
                </th>
                <th class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->EXTHR}}"><small></small></div>
                        <div class="subT text-center"><small>Ext</small></div>
                    </div>
                </th>
                <td colspan="2" class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->emailHR}}"><small></small></div>
                        <div class="subT text-center"><small>E-mail</small></div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="panel">
            Datos del Asesor Empresarial:
        </div>
        <table class="table table-borderless p-0 m-0">
            <tr class="p-0 m-0">
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->apepEmp}}"><small></small></div>
                        <div class="subT text-center"><small>Apellido Paterno</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->apemEmp}}"><small></small></div>
                        <div class="subT text-center"><small>Apellido Materno</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->nombreEmp}}"><small></small></div>
                        <div class="subT text-center"><small>Nombre(s)</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->cargoEMP}}"><small></small></div>
                        <div class="subT text-center"><small>Cargo</small></div>
                    </div>
                </td>
            </tr>
            <tr class="p-0 m-0">
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->numeroEMP}}"><small></small></div>
                        <div class="subT text-center"><small>Número</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->emailEMP}}"><small></small></div>
                        <div class="subT text-center"><small>E-mail</small></div>
                    </div>
                </td>
                <td class="p-1" style="width:150px;">
                    <div>
                        <div class="datos" style="height: 50px;"></div>
                        <div class="subT text-center"><small>Firma</small></div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="panel">
            Datos del Asesor Académico:
        </div>
        <table class="table table-borderless p-0 m-0">
            <tr class="p-0 m-0">
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->apepACA}}"><small></small></div>
                        <div class="subT text-center"><small>Apellido Paterno</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->apemACA}}"><small></small></div>
                        <div class="subT text-center"><small>Apellido Materno</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->nombreACA}}"><small></small></div>
                        <div class="subT text-center"><small>Nombre(s)</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->cargoACA}}"><small></small></div>
                        <div class="subT text-center"><small>Cargo</small></div>
                    </div>
                </td>
            </tr>
            <tr class="p-0 m-0">
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->numeroACA}}"><small></small></div>
                        <div class="subT text-center"><small>Número</small></div>
                    </div>
                </td>
                <td class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->emailACA}}"><small></small></div>
                        <div class="subT text-center"><small>E-mail</small></div>
                    </div>
                </td>
                <td class="p-1" style="width:150px;">
                    <div>
                        <div class="datos" style="height: 50px;"></div>
                        <div class="subT text-center"><small>Firma</small></div>
                    </div>
                </td>
            </tr>
        </table>
        <div class="panel">
            Datos del Proyecto:
        </div>
        <table class="table table-borderless p-0 m-0">
            <tr class="p-0 m-0">
                <td colspan="1" class="p-0">
                    <div class="subT text-center"><small>Nombre:</small></div>
                    </div>
                </td>
                <td colspan="4" class="p-1">
                    <div>
                        <input type="text" class="datos" value="{{$request->nombreproyecto}}"><small></small></div>
                        <div class="subT text-center"><small>Nombre Proyecto</small></div>
                    </div>
                </td>
            </tr>
            <br>
            <br>
            <tr class="p-0 m-0">
                <td colspan="1"></td>
                <td colspan="2" class="p-1">
                    <div>
                        <div style="border-bottom: 1px solid black;"></div>
                        <div class="subT text-center"><small>Firma de alumno</small></div>
                    </div>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>

<style>
    /** Define the margins of your page **/
    @page {}

    body {
        margin-top: .5cm;
        margin-left: 0px;
        margin-right: 0px;
        margin-bottom: .5cm;
    }

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        background-color: transparent;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        background-color: transparent;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    .panel {
        background-color: #FF671F;
        color: white;
        padding: 3px 3px 3px 3px;
    }

    .datos {
        width: 100%;
        text-align: center;
        background-color: #E1E1E1;
        border-bottom: 1px solid black;
    }

    .datos-big {
        width: 100%;
        text-align: center;
        background-color: #E1E1E1;
        border-bottom: 1px solid black;
        font-size:10px;
    }

    #contenedor{
        display: inline-block;
        min-width: 10px;
    }

    #texto{
        width: 100%;
    }
</style>
