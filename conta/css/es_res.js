function restar(){
		 	var num1=parseFloat(document.getElementById('n_1').value);
		  	var num2=parseFloat(document.getElementById('n_2').value);
		  	var res=num1-num2;
		  	document.getElementById('total').value=res;
		}
function sumargo(){
		 	var num1=parseFloat(document.getElementById('go_1').value);
		  	var num2=parseFloat(document.getElementById('go_2').value);
		  	var res=num1+num2;
		  	document.getElementById('totalGO').value=res;
		}
function restarPUO(){
		 	var num1=parseFloat(document.getElementById('total').value);
		  	var num2=parseFloat(document.getElementById('totalGO').value);
		  	var res=num1-num2;
		  	document.getElementById('totalPUO').value=res;
		  	if (Math.sign(res)==1) {
		  		var fechacompleta = '<h4>UTILIDAD DE OPERACIÓN</h4>';
		  	}else{
		  		var fechacompleta = '<h4 >PERDIDA DEL PERIODO</h4>';
		  	}
		  	var objetivo = document.getElementById('texto_nav1');
			objetivo.innerHTML = fechacompleta;			  	
		}
function restaRIF(){
		 	var num1=parseFloat(document.getElementById('RIF_1').value);
		  	var num2=parseFloat(document.getElementById('RIF_2').value);
		  	if (num1===null) {
		  		var res=num2;
		  	}else {
		  		var res=num1;
		  	}
		  	
		  	document.getElementById('totalRIF').value=res;
		}

