
//let
//let count = 0;




var NUM_PLACE=0

function selec_lugar(id){
    qtd_lugar = document.getElementById('qtd_lugar');
    num_lugar = document.getElementById('num_lugar');
    //alert(num_lugar.length);

    if(document.getElementById('num'+id).style.backgroundColor=="green"){
			
		document.getElementById('num'+id).style.backgroundColor="blue";
		document.getElementById('lugarOcupado'+id).remove();

		num_lugar.value=num_lugar.value.replace(('num'+id),"");
		//num1.value=num1.value.trimStart();
		//num1.value=num1.value.trimEnd();
		NUM_PLACE-=1;
	
	}else if(document.getElementById('num'+id).style.backgroundColor=="blue"){
		//console.log('blue');

		if(NUM_PLACE<Number(qtd_lugar.value)){
			var lug_ocupado=document.getElementById('num'+id).innerHTML;
			//alert(lug_ocupado)

			document.getElementById('lugarocupado').innerHTML+=" <span id='lugarOcupado"+id+"\'"+" class='badge bg-info'>"+lug_ocupado+"</span>";
			
			document.getElementById('num'+id).style.backgroundColor="green";
			num_lugar.value= num_lugar.value+" "+id;
			//num1.value=num1.value.trimStart();
			//num1.value=num1.value.trimEnd();
			NUM_PLACE+=1;
		}
	}
	//(num_lugar.value);
	//console.log(document.getElementById(str).style.backgroundColor);
}

function validateForm() {
	//console.log("i reached");
	let x = document.getElementById('num_lugar').value;
	if ( NUM_PLACE==0 ) {
	  alert("Deve Escolher Um lugar Pelo Menos");
	  return false;
	}

	if(NUM_PLACE!=Number(document.getElementById('qtd_lugar').value)){
		alert("A quantidade de lugares escolhidos deve ser igual ao pretendido");
		return false;

	}
	return true;
}
    

function getUser(){
	if(validateForm()){
	//seccao_id=document.getElementById("id_seccao").value;
	lugar_id=document.getElementById("num_lugar").value;
    seccao_id=document.getElementById("id_seccao").value;
    //alert(lugar_id);
	lugar_id = (lugar_id.split(" "));
	lugar_id.shift()
	//console.log(lugar_id);
	lugares = "";
	for(let i=0; i<lugar_id.length; i++){
		
		lugares = lugares+lugar_id[i]+'&';
	}
	//console.log(lugares);
	
	//console.log(lugar_id);
	window.location.href = 'http://127.0.0.1:8000/user/'+lugares+seccao_id;

	//document.getElementById("lg").innerHTML += '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Modal title</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"> ...</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div></div></div>';
	}
}
   
     
