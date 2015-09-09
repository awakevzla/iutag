addDirective({
    form:function(){

        var errores = {

            "required":"Debe llenar los siguientes campo(s):",
            "integer":"\nLos siguientes campos deben ser numeros enteros:"

        }

        return {
            restrict:'E',
            link: function(scope,input,attrs,ngModelCtrl) {

                input.on('submit',function(event){

                    if(!!scope.formulario && scope.formulario.$invalid){

                        var error = [];

                        console.log(scope.formulario.$error);

                        angular.forEach(scope.formulario.$error,function(elem,key){

                            if(!elem)
                                return;

                            error.push(errores[key]);

                            for (var i = elem.length - 1; i >= 0; i--) {

                                error.push(elem[i].$name.replace(/\{\{.*\}\}/gi,""));
                            };
                            
                        });

                        alert(error.join("\n"));

                    }
                    
                })

            }
        }
    }
});