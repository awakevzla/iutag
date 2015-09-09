addDirective({
    datepicker:function(){
        return {
            restrict:'A',
            require : 'ngModel',
            link: function(scope,elem,attrs,ngModelCtrl) {

                var format='dd/mm/yy';

                ngModelCtrl.$parsers.push(function(value){

                    try{

                        if(value)
                            value = $.datepicker.formatDate("yy-mm-dd",$.datepicker.parseDate(format,value));

                        ngModelCtrl.$setValidity('date', true);

                        return value;
                        
                    }catch(e){

                        ngModelCtrl.$setValidity('date', false);

                    }
                    
                    return value;

                });

                elem.datepicker(
                    {
                        dateFormat:format,
                        onSelect:function (date) {
                            elem.trigger('change');
                            scope.$apply(function () {
                                ngModelCtrl.$setViewValue(date);
                            });
                        }
                    }
                );

            }
        }
    }
});