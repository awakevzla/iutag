<div style="text-align: center;">
    <a id="btnImprimir" class="btn btn-danger" onclick="(function(){window.print();})(event, this)"><span class="glyphicon glyphicon-print"></span> Imprimir</a>
</div><br>
<div class="well col-sm-12 col-centered horario">

    <div data-ng-repeat="imp in impresiones" class="pagina">

        <h1>Carga Requerida</h1>

    	<table data-ng-controller="imprime" data-ng-init="init(imp)" class="table">
            <thead>
                <tr>
                    <th>Aula</th>
                    <th>{{imprimir.nombre}}</th>
                    <th>Trayecto</th>
                    <th>{{imprimir.trayectos}}</th>
                    <th>Trimestre</th>
                    <th colspan="2">{{imprimir.trimestres}}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="center">
                    <td></td>
                    <td data-ng-repeat="dia in dias">{{dia.text}}</td>
                </tr>
                <tr data-ng-repeat="turno in turnos">
                    <td>{{turno[0]|time}} - {{turno[1]|time}}</td>
                    <td data-ng-init="carga = horario[dia.value][turno[0]]" data-ng-repeat="dia in dias" data-ng-if="filtrarHora(turno[0],dia.value)" rowspan="{{carga.horas}}">
                        <span data-ng-if="!!carga" class="center">
                            <div>{{carga.nombre_uc}}</div>
                            <div>{{carga.nombre}} {{carga.apellido}}</div>
                            <div>Sec. {{carga.nro}} T{{carga.trayecto}} T{{carga.trimestre}}</div>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>