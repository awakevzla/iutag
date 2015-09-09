
addFilter({
	time:function(){

		return function(data){
			
			var time = data.split(':'), 
			hour = parseInt(time[0]),
			meridiano = hour < 12 ?' am':' pm';

			return (hour - (hour > 12? 12:0))+':'+time[1]+meridiano;

		}

	},date:function(){

		return function(fecha,format){

			if(!angular.isDate(fecha)){
				fecha = new Date(Date.parse(fecha+" 00:00:00"));
			}

			return $.datepicker.formatDate(format||"d 'de' MM 'del' yy",fecha);

		}

	}
});