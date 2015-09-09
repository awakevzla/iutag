<div style="text-align: center;">
<a id="btnImprimir" class="btn btn-danger" onclick="(function(){window.print();})(event, this)"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
</div><br>
<div class="well col-sm-12 col-centered horario">

    <div data-ng-repeat="imp in impresiones" class="pagina" data-ng-controller="imprime" data-ng-init="init(imp)">

        <img class="cintillo" style="width:100%;heigh:auto" src="img/cintillo.png">

        <h1>Distribución de Carga Académica</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Periodo</th>
                    <td colspan="2">{{imprimir.carga[0].fecha_inicio|date:'MM - yy'}}</td>
                    <th>Trayecto</th>
                    <td>{{imprimir.trayectos}}</td>
                    <th>Trimestre</th>
                    <td>{{imprimir.trimestres}}</td>
                </tr>
                <tr>
                    <th colspan="2">Docente</th>
                    <td colspan="2">{{imprimir.apellido}},{{imprimir.nombre}}</td>
                    <th>Cédula</th>
                    <td colspan="2">{{imprimir.nacionalidad}}-{{imprimir.cedula}}</td>
                </tr>
                <tr>
                    <th>Condición</th>
                    <td>{{imprimir.condicion}}</td>
                    <th>Categoría</th>
                    <td>{{imprimir.categoria}}</td>
                    <th>Dedicación</th>
                    <td colspan="2">{{imprimir.dedicacion}}</td>
                </tr>
                <tr>
                    <th colspan="2">H.A.D PNF</th>
                    <td>{{imprimir.horas}}</td>
                    <th colspan="3">Horas Asesoría y Permanencia</th>
                    <td>{{30-imprimir.horas}}</td>
                </tr>
                <tr>
                    <th colspan="2">Unidades Curriculares PNFA</th>
                    <td colspan="5">{{imprimir.materias}}</td>
                </tr>
            </thead>
        </table>
        <table class="table">
            <tbody>
                <tr class="center">
                    <td>
                        <span>Días</span>
                        -
                        <span>Horas</span>
                    </td>
                    <td data-ng-repeat="dia in dias">{{dia.text}}</td>
                </tr>
                <tr data-ng-repeat="turno in turnos">
                    <td>{{turno[0]|time}} - {{turno[1]|time}}</td>
                    <td data-ng-init="carga = horario[dia.value][turno[0]]" data-ng-repeat="dia in dias" data-ng-if="filtrarHora(turno[0],dia.value)" rowspan="{{carga.horas}}">
                        <span data-ng-if="!!carga" class="center">
                            <div>{{carga.nombre_uc}}</div>
                            <div>{{carga.aula}}</div>
                            <div>Sec. {{carga.nro}} T{{carga.trayecto}} T{{carga.trimestre}}</div>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="6">Observaciones</th>
                    <th>Cubículo</th>
                </tr>
                <tr>
                    <td colspan="6">{{imprimir.observaciones||'N/A'}}</td>
                    <td>{{imprimir.cubiculo||'N/A'}}</td>
                </tr>
            </thead>
        </table>
        <div class="firmas">
            <div class="col-sm-3 col-centered firma">
                <div>{{imprimir.apellido}},{{imprimir.nombre}}</div>
                <div>Profesor</div>
            </div>
            <div class="col-sm-4 col-centered firma docente">
                <div>Ing. Domingo Primera</div>
                <div>Jefe División Docente</div>
            </div>
            <div class="col-sm-4 col-centered firma docente">
                <div>Lic. José Á. Payares</div>
                <div>Jefe del Departamento</div>
            </div>
        </div>
    </div>
</div>