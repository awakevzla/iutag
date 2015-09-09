
window.forEach = function(obj,func,context){
    for(e in obj){
        if(func.apply(context||obj[e],[obj[e],e])===false)
            break;
    }
};

window.extend = function(){
    var a=arguments[0];
    forEach(arguments,function(e,i){
        if(i!=0)
            forEach(this,function(attr,index){
                this[index]=attr;
            },a);
    });
    return a;
};

angular.callback = function(func){

    if(this.isFunction(func))
        return func
    else
        return this.noop;
    
}

window.proxy = function(func,context){
    return function(){
        func.apply(context,arguments);
    }
}

// Crear la aplicacion

window.app = angular.module("carga",['ngRoute']);

window.addController=function(obj){
    app.controller(obj)
}

window.addDirective=function(obj){
    app.directive(obj)
}

window.addFilter=function(obj){
    app.filter(obj)
}

window.addService=function(obj){
    app.factory(obj)
}

$.datepicker.setDefaults({
    dateFormat:"dd/mm/yy",
    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
    dayNamesShort: [ "Dom", "Lun", "Mar", "Mer", "Jue", "Vie", "Sab" ],dayNamesMin: [ "Do", "Lu", "Ma", "Me", "Ju", "Vi", "Sa" ],
    dayNames:[ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
    onSelect:function(a,b){
        if(this.onSelect)
            return this.onSelect.call(this,$(this).datepicker("getDate"),b);
    },
    firstDay: 1
})