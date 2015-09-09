function getTime(time){
    return Date.parse("1980-01-01 "+time);
}

addController({
    verCargas:function($scope,array,db,cargas){

        $scope.cargas = cargas;

        $scope.eliminar = function(carga){

            if(confirm("Esta seguro de que desea eliminar esta carga:\nToda la información sera eliminada permanentemente."))
                db.post("php/eliminarCarga.php",carga,function(data){

                    if(data.cod_carga != undefined)
                        array.remove(cargas,carga);
                    else
                        alert("El carga no se pudo eliminar.")
                })
            
        }
        
    },
    carga:function($scope,$filter,$location,array,db,carga){

        $scope.set = function(attr, value){

            $scope.nuevo[attr] = value;
            
        }

        $scope.cod_docente = carga;

        $scope.nuevo = carga;

        if(carga.id_carga){
            $scope.nuevo.cod_carga = carga.cod_carga
        }

        if(carga.aulas.length == 0){

            carga.aulas.push({});

        }

        $scope.colocarTurno = function(turno,aula){

            aula.turno = $scope.turnos[turno].nombre;

            aula.turno_actual = turno;
            
        }

        $scope.colocarHora = function(hora,aula,index){

            aula.hora_entrada = hora;
            aula.hora_salida = $scope.turnos[aula.turno_actual].horas[(aula.horas-1|0)+index][1];
            aula.index = index;

            $scope.conflictoHorario(aula);
            
        }

        $scope.validarAsignaciones = function(){

            var aulas=[],asignaciones=$scope.nuevo.asignaciones;

            angular.forEach($scope.nuevo.aulas,function(aula,i){
                
                aulas.push(aula.cod_asignacion);

            });

            aulas = RegExp("^("+aulas.join("|")+")$");

            for (var i = asignaciones.length - 1; i >= 0; i--) {
                var asignacion = asignaciones[i];

                if(aulas.test(asignacion.cod_asignacion)){

                    array.removeIndex(asignaciones,i);

                }

            };

            angular.forEach($scope.nuevo.aulas,function(aula){
                
                $scope.conflictoHorario(aula);

            })
            
        }

        $scope.conflictoHorario = function(aula){

            if(!!aula.dia_semana && !!aula.hora_entrada && !!aula.hora_salida){

                $scope.nuevo.conflicto = false;

                angular.forEach($scope.nuevo.asignaciones.concat($scope.nuevo.aulas),function(asignacion,i){

                    if(aula != asignacion && aula.dia_semana == asignacion.dia_semana){

                        var 
                        entradaA = getTime(aula.hora_entrada),
                        salidaA = getTime(aula.hora_salida),
                        entradaB = getTime(asignacion.hora_entrada),
                        salidaB =  getTime(asignacion.hora_salida);

                        if(entradaB <= entradaA && entradaA <= salidaB){

                            $scope.nuevo.conflicto = true;

                        }else
                        if(entradaB <= salidaA && salidaA <= salidaB){
                            $scope.nuevo.conflicto = true;

                        }

                        if($scope.nuevo.conflicto)
                            alert("Conflicto de Horario:\nEste Docente ya tiene carga asignada el dia "+asignacion.dia_semana+" de "+$filter('time')(asignacion.hora_entrada)+" a "+$filter('time')(asignacion.hora_salida));

                    }

                })

            }
            
        }

        $scope.setAulas = function() {

            for (var i = 0; i < $scope.nuevo.aulas.length; i++) {
                
                var aula = $scope.nuevo.aulas[i];

                angular.forEach($scope.turnos,function(turno,nombre){

                    for (var j = 0; j < turno.horas.length; j++) {
                        
                        if(turno.horas[j][0] == aula.hora_entrada){

                            aula.index = j;

                            aula.turno_actual = nombre;

                        }

                    };

                });

            };
            
        }

        $scope.removerSalon = function(aula){

            array.remove($scope.nuevo.aulas,aula);

            $scope.updateDuration();
            
        }

        $scope.updateDuration = function(){

            var horas = 0;

            for (var i = $scope.nuevo.aulas.length - 1; i >= 0; i--) {

                horas += parseInt($scope.nuevo.aulas[i].horas || 0);

            };

            $scope.nuevo.horas = horas
            
        }

        $scope.cambioDuracion = function(aula){

            $scope.updateDuration();

            var horas = $scope.nuevo.horas;

            if(horas > carga.horas_semanales){

                alert("Las sesiones de clase no puede superar las "+carga.horas_semanales+" horas.");
                aula.horas = 1;

            }

            if(aula.index != undefined && aula.horas != undefined){

                var horas = $scope.turnos[aula.turno_actual].horas,
                index = (aula.horas||1)-1+aula.index;

                if(index > horas.length-1){

                    alert("La hora de salida no puede superar las "+$filter('time')(horas[horas.length-1][1])+".");
                    delete aula.horas;
                    return;

                }

                aula.hora_salida = horas[index][1];

            }

            $scope.conflictoHorario(aula);
            
        }

        $scope.colocarDia = function(dia,aula){

            aula.dia_semana = dia;

            $scope.conflictoHorario(aula);
            
        }

        $scope.anadirSalon = function(){

            $scope.nuevo.aulas.push({});
            
        }

        $scope.guardar = function(){

            if($scope.formulario.$valid == false){

                return;

            }
            
            db.post("php/guardarCarga.php",$scope.nuevo,function(data){

                if(!!data && data.cod_carga != undefined){

                    $location.path("/periodo/ver/"+$scope.nuevo.cod_periodo)

                }
                
            });

        }

        $scope.dias = [
        {text:"Lunes",value:"lunes"},
        {text:"Martes",value:"martes"},
        {text:"Miércoles",value:"miercoles"},
        {text:"Jueves",value:"jueves"},
        {text:"Viernes",value:"viernes"},
        {text:"Sábado",value:"sabado"}];

        $scope.turno = "Turno";

        $scope.turnos = {

            amanana:{

                nombre : "Mañana",
                horas : [

                    ["07:00:00","07:45:00"],
                    ["07:45:00","08:30:00"],
                    ["08:35:00","09:20:00"],
                    ["09:20:00","10:05:00"],
                    ["10:10:00","10:55:00"],
                    ["10:55:00","11:40:00"]
                    
                ]

            },
            btarde:{

                nombre : "Tarde",
                horas : [

                    ["13:05:00","13:45:00"],
                    ["13:50:00","14:35:00"],
                    ["14:35:30","15:20:00"],
                    ["15:25:00","16:10:00"],
                    ["16:10:30","16:55:00"],
                    ["17:00:00","17:45:00"]
                    
                ]

            },
            cnoche:{

                nombre : "Noche",
                horas : [

                    ["17:00:00","17:45:00"],
                    ["17:50:00","18:35:00"],
                    ["18:35:30","19:20:00"],
                    ["19:25:00","20:10:00"],
                    ["20:10:30","20:55:00"],
                    ["21:00:00","21:45:00"]
                    
                ]

            }

        }

        $scope.setAulas();

        $scope.$watch("nuevo.asignaciones",function(){
            
            $scope.validarAsignaciones(); 

        });

        $scope.updateDuration();

    }
});