addDirective({
    ngEntero:function(){
        return {
            restrict:'A',
            require : 'ngModel',
            link: function(scope,elem,attrs,ngModelCtrl) {

                ngModelCtrl.$parsers.push(function(value){

                    if(value){

                        if(!/^\d*$/.test(elem.val())){

                            ngModelCtrl.$setValidity('integer', false);

                        }else{

                            ngModelCtrl.$setValidity('integer', true);

                        }

                        return parseInt(elem.val());

                    }

                });

            }
        }
    }
});