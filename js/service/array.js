addService({
    array: function() {
        return {
            remove:function(array,elem,all){
                for (var i = array.length - 1; i >= 0; i--) {
                    if(array[i]===elem){
                        array.splice(i,1);
                        if(all!==true)
                            break;
                    }
                }
            },removeIndex:function(array,index){
                array.splice(index,1);
            },empty:function(array){
                while(array.length > 0) {
                    array.pop();
                }
            },find:function(array,elem,attr){
                
                var i=-1,e;
                while(e=array[++i]) {
                    if(elem==(attr?e[attr]:e))
                        return i;
                }
                return false;

            }
        };
    }
});