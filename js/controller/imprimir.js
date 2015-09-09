function ordenar(imprimir,$scope,array) {

    $scope.imprimir = imprimir;

    var horas = 0, materias = [], trimestres = [],trayectos = [],carga_horario = {},excepcion = {},turnos = [
        ["07:00:00","07:45:00"],
        ["07:45:00","08:30:00"],
        ["08:35:00","09:20:00"],
        ["09:20:00","10:05:00"],
        ["10:10:00","10:55:00"],
        ["10:55:00","11:40:00"],
        ["13:05:00","13:45:00"],
        ["13:50:00","14:35:00"],
        ["14:35:30","15:20:00"],
        ["15:25:00","16:10:00"],
        ["16:10:30","16:55:00"],
        ["17:00:00","17:45:00"],
        ["17:00:00","17:45:00"],
        ["17:50:00","18:35:00"],
        ["18:35:30","19:20:00"],
        ["19:25:00","20:10:00"],
        ["20:10:30","20:55:00"],
        ["21:00:00","21:45:00"]
    ];

    angular.forEach(imprimir.carga,function(carga){

        if(trimestres.length == 0 || array.find(trimestres,carga.trimestre))
            trimestres.push(carga.trimestre);

        if(trayectos.length == 0 || array.find(trayectos,carga.trayecto))
            trayectos.push(carga.trayecto);

        if(materias.length == 0 || array.find(materias,carga.nombre_uc))
            materias.push(carga.nombre_uc);

        if(!carga_horario[carga.dia_semana]){
            carga_horario[carga.dia_semana] = {};
            excepcion[carga.dia_semana] = [];
        }

        carga_horario[carga.dia_semana][carga.hora_entrada] = carga;

        horas+=parseInt(carga.horas);

        var index = array.find(turnos,carga.hora_entrada,"0"),end = index+parseInt(carga.horas);

        for (var i = index+1; i < end; i++) {
            
            excepcion[carga.dia_semana].push(turnos[i][0]);

        };

    });

    angular.forEach(excepcion,function(e,index){
        excepcion[index]=RegExp("^("+excepcion[index].join("|")+")$");
    });

    $scope.horario = carga_horario;

    $scope.filtrarHora = function(hora,dia){

        return excepcion[dia]?!excepcion[dia].test(hora):true;
        
    }

    $scope.dias = [
    {text:"Lunes",value:"lunes"},
    {text:"Martes",value:"martes"},
    {text:"Miércoles",value:"miercoles"},
    {text:"Jueves",value:"jueves"},
    {text:"Viernes",value:"viernes"},
    {text:"Sábado",value:"sabado"}];

    $scope.turnos = turnos;

    imprimir.trimestres = trimestres.join(",");
    imprimir.trayectos = trayectos.join(",");
    imprimir.materias = materias.join(",");
    imprimir.horas = horas;

}

app.controller({
    imprimir:function($scope,imprimir,array){

        $scope.imprimir = imprimir;

        var horas = 0, materias = [], trimestres = [],trayectos = [],carga_horario = {},excepcion = {},turnos = [
            ["07:00:00","07:45:00"],
            ["07:45:00","08:30:00"],
            ["08:35:00","09:20:00"],
            ["09:20:00","10:05:00"],
            ["10:10:00","10:55:00"],
            ["10:55:00","11:40:00"],
            ["13:05:00","13:45:00"],
            ["13:50:00","14:35:00"],
            ["14:35:30","15:20:00"],
            ["15:25:00","16:10:00"],
            ["16:10:30","16:55:00"],
            ["17:00:00","17:45:00"],
            ["17:00:00","17:45:00"],
            ["17:50:00","18:35:00"],
            ["18:35:30","19:20:00"],
            ["19:25:00","20:10:00"],
            ["20:10:30","20:55:00"],
            ["21:00:00","21:45:00"]
        ];

        angular.forEach(imprimir.carga,function(carga){

            if(trimestres.length == 0 || array.find(trimestres,carga.trimestre))
                trimestres.push(carga.trimestre);

            if(trayectos.length == 0 || array.find(trayectos,carga.trayecto))
                trayectos.push(carga.trayecto);

            if(materias.length == 0 || array.find(materias,carga.nombre_uc))
                materias.push(carga.nombre_uc);

            if(!carga_horario[carga.dia_semana]){
                carga_horario[carga.dia_semana] = {};
                excepcion[carga.dia_semana] = [];
            }

            carga_horario[carga.dia_semana][carga.hora_entrada] = carga;

            horas+=parseInt(carga.horas);

            var index = array.find(turnos,carga.hora_entrada,"0"),end = index+parseInt(carga.horas);

            for (var i = index+1; i < end; i++) {
                
                excepcion[carga.dia_semana].push(turnos[i][0]);

            };

        });

        angular.forEach(excepcion,function(e,index){
            excepcion[index]=RegExp("^("+excepcion[index].join("|")+")$");
        });

        $scope.horario = carga_horario;

        $scope.filtrarHora = function(hora,dia){

            return excepcion[dia]?!excepcion[dia].test(hora):true;
            
        }

        $scope.dias = [
        {text:"Lunes",value:"lunes"},
        {text:"Martes",value:"martes"},
        {text:"Miércoles",value:"miercoles"},
        {text:"Jueves",value:"jueves"},
        {text:"Viernes",value:"viernes"},
        {text:"Sábado",value:"sabado"}];

        $scope.turnos = turnos;

        imprimir.trimestres = trimestres.join(",");
        imprimir.trayectos = trayectos.join(",");
        imprimir.materias = materias.join(",");
        imprimir.horas = horas;


    },imprimirVarios:function($scope,imprimir){

        $scope.impresiones = imprimir;

    },imprime:function($scope,array){

        $scope.init = function(imprimir){
        
            ordenar(imprimir,$scope,array);
            
        }

    }
})