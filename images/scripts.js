/* Funciones Javascript usadas en el sitio */

function addNewUser(){
	// Función que modifica el arbol DOM dinámicamente
	// para agregar jugadores a la vista
	
	//Obtener la cantidad de jugadores actuales (incial = 1)
	var players = parseInt(document.getElementById("num_pla").value);
	players = players+1;
	
	//Actualizar el hidden field
	document.getElementById("num_pla").setAttribute("value", players);
	
	//Insertar en el div
	var lista = document.getElementById("pla_lst")
	
	//Crear elementos nuevo a insertar
	var div1 = document.createElement("div");
	var lab1 = document.createElement("label");
	var rem = document.createElement("input");
	lab1.innerHTML = "Jugador "+players;
	lab1.setAttribute("id", "juga"+players);
	div1.setAttribute("id", "jug"+players);
	rem.setAttribute("id", "rem"+players);
	var nuevo_jug = document.createElement("center");
	var tab = document.createElement("table");
	tab.setAttribute("id", "tab"+players);
	
	rem.setAttribute("type", "button");
	rem.setAttribute("class", "button");
	rem.setAttribute("value", "Quitar Jugador");
	rem.setAttribute("onclick", "removeUser("+players+")");
	
	//Elementos para fila 1
	var f1 = document.createElement("tr");
	var c1f1 = document.createElement("td");
	var lc1f1 = document.createElement("label");
	var tlc1f1 = document.createTextNode("Nombre*");
	var c2f1 = document.createElement("td");
	var ic2f1 = document.createElement("input");
	
	//Armar la fila
	ic2f1.setAttribute("name", "j"+players+"_nam");
	ic2f1.setAttribute("id", "j"+players+"_nam");
	ic2f1.setAttribute("type", "text");
	c2f1.appendChild(ic2f1);
	lc1f1.appendChild(tlc1f1);
	c1f1.appendChild(lc1f1);
	f1.appendChild(c1f1);
	f1.appendChild(c2f1);
	
	//Elementos para fila 2
	var f2 = document.createElement("tr");
	var c1f2 = document.createElement("td");
	var lc1f2 = document.createElement("label");
	var tlc1f2 = document.createTextNode("Apellido*");
	var c2f2 = document.createElement("td");
	var ic2f2 = document.createElement("input");
	
	//Armar la fila
	ic2f2.setAttribute("name", "j"+players+"_ape");
	ic2f2.setAttribute("id", "j"+players+"_ape");
	ic2f2.setAttribute("type", "text");
	c2f2.appendChild(ic2f2);
	lc1f2.appendChild(tlc1f2);
	c1f2.appendChild(lc1f2);
	f2.appendChild(c1f2);
	f2.appendChild(c2f2);
	
	//Elementos para fila 3
	var f3 = document.createElement("tr");
	var c1f3 = document.createElement("td");
	var lc1f3 = document.createElement("label");
	var tlc1f3 = document.createTextNode("RUT*");
	var c2f3 = document.createElement("td");
	var ic2f3 = document.createElement("input");
	
	//Armar la fila
	ic2f3.setAttribute("name", "j"+players+"_rut");
	ic2f3.setAttribute("id", "j"+players+"_rut");
	ic2f3.setAttribute("type", "number");
	c2f3.appendChild(ic2f3);
	lc1f3.appendChild(tlc1f3);
	c1f3.appendChild(lc1f3);
	f3.appendChild(c1f3);
	f3.appendChild(c2f3);
	
	//Elementos para fila 4
	var f4 = document.createElement("tr");
	var c1f4 = document.createElement("td");
	var lc1f4 = document.createElement("label");
	var tlc1f4 = document.createTextNode("Numero de Matricula*");
	var c2f4 = document.createElement("td");
	var ic2f4 = document.createElement("input");
	
	//Armar la fila
	ic2f4.setAttribute("name", "j"+players+"_mat");
	ic2f4.setAttribute("id", "j"+players+"_mat");
	ic2f4.setAttribute("type", "number");
	c2f4.appendChild(ic2f4);
	lc1f4.appendChild(tlc1f4);
	c1f4.appendChild(lc1f4);
	f4.appendChild(c1f4);
	f4.appendChild(c2f4);
	
	//Elementos para fila 5
	var f5 = document.createElement("tr");
	var c1f5 = document.createElement("td");
	var lc1f5 = document.createElement("label");
	var tlc1f5 = document.createTextNode("Especialidad*");
	var c2f5 = document.createElement("td");
	var ic2f5 = document.createElement("select");
	
	//Armar la fila
	ic2f5.setAttribute("name", "j"+players+"_dep");
	ic2f5.setAttribute("id", "j"+players+"_dep");
	ic2f5.setAttribute("onchange","checkDoc("+players+")");
	ic2f5.innerHTML = "<option selected=\"selected\" value=\"DCC\">DCC</option><option value=\"DDCC\">Docente DCC</option><option value=\"DAS\">DAS</option><option value=\"DFI\">DFI</option><option value=\"DGF\">DGF</option><option value=\"DGEO\">DGeo</option><option value=\"DIM\">DIM</option><option value=\"DII\">DII</option><option value=\"DIC\">DIC</option><option value=\"DIE\">DIE</option><option value=\"DIMIN\">DIMIN</option><option value=\"DIMEC\">DIMEC</option><option value=\"DIQBT\">DIQBT</option><option value=\"DCM\">DCM</option><option value=\"SN\">Externo</option>";
	c2f5.appendChild(ic2f5);
	lc1f5.appendChild(tlc1f5);
	c1f5.appendChild(lc1f5);
	f5.appendChild(c1f5);
	f5.appendChild(c2f5);
	
	//Elementos para fila 6
	var f6 = document.createElement("tr");
	var c1f6 = document.createElement("td");
	var lc1f6 = document.createElement("label");
	var tlc1f6 = document.createTextNode("Correo electronico*");
	var c2f6 = document.createElement("td");
	var sc2f6 = document.createElement("input");
	
	//Armar la fila
	sc2f6.setAttribute("name", "j"+players+"_ema");
	sc2f6.setAttribute("id", "j"+players+"_ema");
	sc2f6.setAttribute("type", "email");
	c2f6.appendChild(sc2f6);
	lc1f6.appendChild(tlc1f6);
	c1f6.appendChild(lc1f6);
	f6.appendChild(c1f6);
	f6.appendChild(c2f6);
	
	//Elementos para fila 7
	var f7 = document.createElement("tr");
	var c1f7 = document.createElement("td");
	var lc1f7 = document.createElement("label");
	var tlc1f7 = document.createTextNode("Telefono");
	var c2f7 = document.createElement("td");
	var ic2f7 = document.createElement("input");
	
	//Armar la fila
	ic2f7.setAttribute("name", "j"+players+"_tel");
	ic2f7.setAttribute("id", "j"+players+"_tel");
	ic2f7.setAttribute("type", "number");
	c2f7.appendChild(ic2f7);
	lc1f7.appendChild(tlc1f7);
	c1f7.appendChild(lc1f7);
	f7.appendChild(c1f7);
	f7.appendChild(c2f7);
	
	//Elementos para fila 8
	var f8 = document.createElement("tr");
	var c1f8 = document.createElement("td");
	var lc1f8 = document.createElement("label");
	var tlc1f8 = document.createTextNode("Apodo");
	var c2f8 = document.createElement("td");
	var ic2f8 = document.createElement("input");
	
	//Armar la fila
	ic2f8.setAttribute("name", "j"+players+"_apo");
	ic2f8.setAttribute("id", "j"+players+"_apo");
	ic2f8.setAttribute("type", "number");
	c2f8.appendChild(ic2f8);
	lc1f8.appendChild(tlc1f8);
	c1f8.appendChild(lc1f8);
	f8.appendChild(c1f8);
	f8.appendChild(c2f8);
	
	//Terminar de pegar las filas en la tabla
	tab.appendChild(f1);
	tab.appendChild(f2);
	tab.appendChild(f3);
	tab.appendChild(f4);
	tab.appendChild(f5);
	tab.appendChild(f6);
	tab.appendChild(f7);
	tab.appendChild(f8);
	nuevo_jug.appendChild(tab);
	
	div1.appendChild(lab1);
	div1.appendChild(rem);
	div1.appendChild(nuevo_jug);
	
	lista.appendChild(div1);
}

function removeUser(id){
	if(confirm("Esta seguro que desa remover al jugador "+id+"?")){
		var cant = parseInt(document.getElementById("num_pla").value);
		//Remover
		var lista = document.getElementById("pla_lst");
		lista.removeChild(document.getElementById("jug"+id));
		
		//Cambiar nombres
		for(var aux = id+1; aux <= cant; aux++){
			var prev = aux-1;
			document.getElementById("juga"+aux).innerHTML = "Jugador "+prev;
			document.getElementById("juga"+aux).setAttribute("id", "juga"+prev);
			document.getElementById("jug"+aux).setAttribute("id", "jug"+prev);
			document.getElementById("rem"+aux).setAttribute("onclick", "removeUser("+prev+")");
			document.getElementById("rem"+aux).setAttribute("id", "rem"+prev);
			document.getElementById("tab"+aux).setAttribute("id", "tab"+prev);
			
			
			document.getElementById("j"+aux+"_nam").setAttribute("name", "j"+prev+"_nam");
			document.getElementById("j"+aux+"_ape").setAttribute("name", "j"+prev+"_ape");
			document.getElementById("j"+aux+"_rut").setAttribute("name", "j"+prev+"_rut");
			document.getElementById("j"+aux+"_mat").setAttribute("name", "j"+prev+"_mat");
			document.getElementById("j"+aux+"_dep").setAttribute("name", "j"+prev+"_dep");
			document.getElementById("j"+aux+"_ema").setAttribute("name", "j"+prev+"_ema");
			document.getElementById("j"+aux+"_tel").setAttribute("name", "j"+prev+"_tel");
			document.getElementById("j"+aux+"_apo").setAttribute("name", "j"+prev+"_apo");
			
			
			document.getElementById("j"+aux+"_nam").setAttribute("id", "j"+prev+"_nam");
			document.getElementById("j"+aux+"_ape").setAttribute("id", "j"+prev+"_ape");
			document.getElementById("j"+aux+"_rut").setAttribute("id", "j"+prev+"_rut");
			document.getElementById("j"+aux+"_mat").setAttribute("id", "j"+prev+"_mat");
			document.getElementById("j"+aux+"_dep").setAttribute("id", "j"+prev+"_dep");
			document.getElementById("j"+aux+"_ema").setAttribute("id", "j"+prev+"_ema");
			document.getElementById("j"+aux+"_tel").setAttribute("id", "j"+prev+"_tel");
			document.getElementById("j"+aux+"_apo").setAttribute("id", "j"+prev+"_apo");
		}
		document.getElementById("num_pla").value--;
		alert("Removido el jugador "+id);
	}
}

function checkForm(form){
	var cant = parseInt(document.getElementById("num_pla").value);
	if(cant < 5){
		alert("La cantidad de jugadores no puede ser menor a 5");
		return false;
	}
	if(cant > 10){
		alert("La cantidad de jugadores no puede exceder los 10");
		return false;
	}
	// Chequear datos del equipo
	if(document.getElementById("tea_nam").value == ""){
		alert("El nombre del equipo no puede ser vacio");
		return false;
	}
	if(document.getElementById("tea_c1").value == ""){
		alert("El color primario del equipo no puede ser vacio");
		return false;
	}
	if(document.getElementById("tea_c2").value == ""){
		alert("El color secundario del equipo no puede ser vacio");
		return false;
	}
	
	//Chequear todos los campos obligatorios
	var data = new Array(8);
	data[0] = "_nom";
	data[1] = "_ape";
	data[2] = "_rut";
	data[3] = "_mat";
	data[4] = "_dep";
	data[5] = "_ema";
	data[6] = "_pass";
	data[7] = "_pass2";
	//chequear datos del capitan
	for(var i=0; i<8; i++){
		var prop = "cap"+data[i];
		if(document.getElementById(prop).value == ""){
			alert("Debe especificar todos los campos obligatorios");
			return false;
		}
	}
	
	//Chequear cada jugador
	for(var i=2; i<=cant; i++){
		for(var j=0; j<6; j++){
			var prop = "j"+i+data[j];
			if(document.getElementById(prop).value == ""){
				alert("Debe especificar todos los campos obligatorios");
				return false;
			}
		}
	}
	return true;
}

function checkDoc(id){
	if(id == 1){
		var dep = document.getElementById("cap_dep");
		var mat = document.getElementById("cap_mat");
		if(dep.value == "DDCC"){
			mat.value = "0";
			mat.setAttribute("disabled","disabled");
		}else{
			mat.value = "";
			mat.removeAttribute("disabled");
		}
	}else{
		var dep = document.getElementById("j"+id+"_dep");
		var mat = document.getElementById("j"+id+"_mat");
		if(dep.value == "DDCC"){
			mat.value = "0";
			mat.setAttribute("disabled","disabled");
		}else{
			mat.value = "";
			mat.rem
			mat.removeAttribute("disabled");
		}
	}
}