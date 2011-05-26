<?php
require('fpdf.php');

// Clase usada para generar el comprobante en PDF
class Registro extends FPDF{

	function Header(){
		$this->Ln(15);
		//Cabecera del PDF
		$this->Image(APPPATH.'cadcc.png', 10, 18, 40); //Colocar imagen de CADCC aquí
		$this->SetFont('Arial', 'B', 16);
		//$this->Cell(80); // Caja para "centrar" el proximo texto. Unidades en milímetros
		$this->Cell(210, 0, utf8_decode('Comprobante de inscripción de equipo'), 0, 1, 'C');
		$this->Ln(25);
	}

	function cabeza($teadat, $capdat){
		$this->SetFont('Arial', '', 11);
		$this->Cell(10); //Sangría
		$this->Write(5, utf8_decode('El registro de nuevo equipo se completó con éxito.'));
		$this->Ln(10);
		$this->Cell(10); //Sangría
		$this->Write(5, utf8_decode('Imprima una copia de este documento y dirigase a la oficia del CADCC con una cuota de 6.000 para formalizar su inscripción. El no realizar la formalización significará el borrado de los datos de su equipo cuando sea pertinente.'));
		$this->Ln(10);
		$this->Cell(10); //Sangría
		$this->Write(5, utf8_decode('Los datos registrados del equipo son los siguientes:'));
		$this->Ln(15);
		$this->Cell(10); //Sangría
		$this->SetFont('Arial', 'B', 11);
		$this->Cell(0, 5, utf8_decode('Datos del Equipo'), 0 , 1);
		$this->SetFont('Arial', '', 11);
		$str1 = array('Nombre del equipo: ', 'Color Primario: ', 'Color secundario: ', 'Correo electrónico: ');
		$str2 = array('nombre', 'c1', 'c2', 'email');
		for($i=0; $i<4; $i++){
			$this->Cell(15);
			$this->Cell(0, 5, utf8_decode($str1[$i].$teadat[$str2[$i]]), 0, 1);
		}
		$this->Ln(10);
		$this->Cell(10); //Sangría
		$this->SetFont('Arial', 'B', 11);
		$this->Cell(0, 5, utf8_decode('Datos del Capitán'), 0, 1);
		$this->SetFont('Arial', '', 11);
		$str1 = array('Nombre: ', 'RUT: ', 'Departamento: ', 'Matrícula: ');
		$capdat['nam'] = $capdat['nombre'].' '.$capdat['apellido'];
		$str2 = array('nam', 'rut', 'depto', 'mat');
		for($i=0; $i<4; $i++){
			$this->Cell(15);
			$this->Cell(0, 5, utf8_decode($str1[$i].$capdat[$str2[$i]]), 0, 1);
		}
		$this->Ln(10);
		$this->Cell(10); //Sangría
		$this->SetFont('Arial', 'B', 11);
		$this->Cell(0, 5, utf8_decode('Datos de los jugadores'), 0, 1);
		$this->SetFont('Arial', '', 11);
		$this->Ln(5);
	}

	function mainTable($header, $data){
		//Nombre, Apellido, Rut, Depto, Matricula
		//Anchos de la columnas
		$w = array(30, 30, 30, 30, 30);
		//Cabeceras
		$this->Cell(25); //Para centrar
		for($i=0; $i<count($header); $i++)
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
		$this->Ln();
		//Datos
		foreach($data as $row){
			$this->Cell(25); //Para Centrar
			$this->Cell($w[0], 6, $row[0], 'LR');
			$this->Cell($w[1], 6, $row[1], 'LR');
			$this->Cell($w[2], 6, $row[2], 'LR');
			$this->Cell($w[3], 6, $row[3], 'LR');
			$this->Cell($w[4], 6, $row[4], 'LR');
			$this->Ln();
		}
		//Linea de cierre
		$this->Cell(25);
		$this->Cell(array_sum($w), 0, '', 'T');
	}

	function pie(){
		$this->Ln(40);
		$this->Cell(130);
		$this->Cell(50, 5, 'CADCC', 'T', 1, 'C');
	}

	function Footer(){
		//Pie de página del PDF
		//Posición: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Número de página
		$this->Cell(0,10, utf8_decode('Página ').$this->PageNo(),0,0,'C');
	}
}

class Main extends Controller {

	// TODO Sistema para cerrar automáticamente las inscripciones de equipo.

	/********************************************************
	******** NOMENCLATURA PARA PERMISOS DE USUARIOS *********
	******	0	Usuario sin loguear		*********
	******	1	Jugador comun y corriente	*********
	******	2	Capitán de equipo		*********
	******	3	Admin de sistema		*********
	********************************************************/

	/******	Acciones de cada usuario:
	*	0	Nada
	*	1	Cambiar sus datos.
	*	2	Cambiar sus datos, Administrar su equipo.
	*	3	Cambiar sus datos, Administrar equipos, Administrar partidos, Autogenerar Fixture, Generar Papeleta de partido.
	***************************************************/
	private $permissions = array();
	private $actionLinks = array();


	function Main(){
		parent::Controller();
		// Definir permisos de los grupos de usuarios
		$this->permissions[0] = array();
		$this->permissions[1] = array('data' => 'Mi perfil');
		$this->permissions[2] = array('data' => 'Mi perfil',
					'admteam' => 'Administrar mi equipo');
		$this->permissions[3] = array('data' => 'Mi perfil',
					'admteams' => 'Administrar equipos',
					'admpart' => 'Administrar partidos',
					'genpap' => 'Generar papeleta de partido',
					'genfixt' => 'Autogenerar Fixture');

		// Defnir los vinculos para cada accion
		$base = base_url().'index.php';
		$this->actionLinks = array('data' => $base.'/babydcc/perfil/',
					'admteam' => $base.'/babydcc/admequipo/',
					'admteams' => $base.'/babydcc/admequipos/',
					'admpart' => $base.'/babydcc/admpartidos/',
					'genpap' => $base.'/babydcc/generarpapeleta/',
					'genfixt' => $base.'/babydcc/genfixture/');
	}
	
	function index(){
		//Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - P&aacute;gina principal",
				"mode" => "ind",
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('main', $data);
		$this->load->view('footer', $data);
	}

	function register(){
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Registro de equipos", 
				"mode" => "reg",
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('reg', $data);
		$this->load->view('footer', $data);
	}

	function regEquipo(){
		$this->load->library('input');
		$players = $this->input->post('num_pla', TRUE);
		if($players < 5){
			//Código para redirigir con error TODO
			echo 'La cantidad de jugadores no puede ser menor que 5';
			return;
		}

		if($players > 10){
			//Código para redirigir con error TODO
			echo 'La cantidad de jugadores no puede ser mayor que 10';
			return;
		}
		// Obtener datos del equipo
		$tea_nam = $this->input->post('tea_nam');
		$tea_c1 = $this->input->post('tea_c1');
		$tea_c2 = $this->input->post('tea_c2');
		$tea_ema = $this->input->post('tea_ema');
		if($tea_nam == FALSE || $tea_c1 == FALSE || $tea_c2 == FALSE){
			//Código para redirigir con error TODO
			echo 'Algunos datos del equipo son vacíos';
			return;
		}

		$this->load->model('equipo');
		$this->load->model('jugador');

		// Obtener datos de los jugadores
		$play_data = array();
		$fields = array('_nam', '_mat', '_ape', '_rut', '_dep', '_ema', '_tel', '_apo', '_pass', '_pass2');
		for($i=1; $i<=$players; $i++){
			foreach($fields as $field){
				// Hacer get del campo
				$play_data[$i][$field] = $this->input->post(($i==1?'cap':('j'.$i)).$field);
				if($play_data[$i][$field] == FALSE && !($field == '_tel' || $field == '_apo') && ($i > 1 && !($field == '_pass' || $field == '_pass2'))){
					//Código para redirigir con error TODO
					echo 'Debe rellenar todos los campos obligatorios. i='.$i.', campo='.$field.'<br />'.($i==1?'cap':('j'.$i)).$field.'<br />';
				}
			}
		}

		// Chequear contraseñas del capitán
		if($play_data[1]['_pass'] != $play_data[1]['_pass2']){
			//Código para redirigir con error TODO
			echo 'Las contraseñas del capitán no coinciden';
			return;
		}

		// Obtener el logo del equipo TODO
		$config['upload_path'] = LOGOS_EQUIPO_UPLOAD_PATH;
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size'] = '250';
		$config['max_width'] = '100';
		$config['max_height'] = '100';
		$config['overwrite'] = TRUE;
		$exten = explode('.', $_FILES['tea_log']['name']);
		$config['file_name'] = 'logo_'.$tea_nam.'.'.$exten[1];

		$this->load->library('upload', $config);

		$sin_archivo = FALSE;
		$data = FALSE;
		$result = $this->upload->do_upload('tea_log');
		if($result == FALSE){
			// Falló la carga de la imagen
			$errores = $this->upload->get_upload_errors();
			foreach($errores as $error){
				if($error == 'upload_no_file_selected'){
					$sin_archivo = TRUE;
				}
			}
			if(!$sin_archivo){
				// Error real
				//Código para redirigir con errores TODO
				echo 'error';
				return;
			}
		}else{
			// Obtener datos de la subida
			$data = $this->upload->data();
		}

		// Registrar equipo
		$idEquipo = $this->equipo->regNewEquipo($tea_nam, $tea_c1, $tea_c2, $tea_ema, $data);

		// Registrar jugadores
		$idCap = 0;
		for($i=1; $i<=$players; $i++){
			// Registrar al jugador
			$idJuga = $this->jugador->registerNewJugador($play_data[$i], $i, $idEquipo);
			if($i==1) $idCap = $idJuga;
			// Registrar como usuario (user, pass, permisos, idJug)
			$this->user->registerNewuser($play_data[$i]['_rut'], dohash($play_data[$i]['_rut']), ($i==1?2:1), $idJuga);
		}

		// Asignar capitan al equipo
		if(!$this->equipo->assignCapitan($idEquipo, $idCap)){
			//Código para redirigir con error TODO
			echo 'Error actualizando el capitán del equipo, contacte al admin';
			return;
		}

		// Mostrar página de Success
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Registro de equipos completo", 
				"mode" => "reg",
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions(),
				"tea_nam" => $tea_nam,
				"tea_c1" => $tea_c1,
				"tea_c2" => $tea_c2,
				"tea_ema" => $tea_ema,
				"cap_nam" => $play_data[1]['_nam'],
				"cap_ape" => $play_data[1]['_ape'],
				"cap_rut" => $play_data[1]['_rut'],
				"id_tea" => $idEquipo);
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('regcom', $data);
		$this->load->view('footer', $data);
	}

	function comprobante($id){
		// Obtener el equipo por el id
		$this->load->model('equipo');
		$this->load->model('jugador');
		$equipo = $this->equipo->getEquipoById($id);
		if($equipo == FALSE){
			//Código para redirigir con error TODO
			echo 'No se encuentra el equipo con id '.$id;
			return;
		}
		$jugadores = $this->jugador->getJugadoresByIdEquipo($equipo->idEquipo);
		$capitan = $this->jugador->getJugadorById($equipo->capitan);
		if($capitan == FALSE || $jugadores == FALSE){
			//Código para redirigir con error TODO
			echo 'Error obteniendo datos de los jugadores';
			return;
		}

		//Formatear los datos de los jugadores para la funcion de la tabla
		//Nombre, Apellido, Rut, Depto, Matricula
		$data = array();
		$j = 0;
		foreach($jugadores as $jugador){
			if($jugador->RUT == $capitan->RUT)
				continue;
			for($i=0; $i<5; $i++){
				switch($i){
					case 0:{$data[$j][$i] = $jugador->nombre; break;}
					case 1:{$data[$j][$i] = $jugador->apellido; break;}
					case 2:{$data[$j][$i] = $jugador->RUT; break;}
					case 3:{$data[$j][$i] = $jugador->departamento; break;}
					case 4:{$data[$j][$i] = $jugador->matricula; break;}
					default: {echo 'Caso patologico'; return;}
				}
			}
			$j++;
		}
		// Generar PDF
		$pdf = new Registro();
		$pdf->AliasNbPages();
		// Agregar página al PDF
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		$capdat = array('nombre' => $capitan->nombre,
				'apellido' => $capitan->apellido,
				'rut' => $capitan->RUT,
				'depto' => $capitan->departamento,
				'mat' => $capitan->matricula);
		$teadat = array('nombre' => $equipo->nombre,
				'c1' => $equipo->color_pri,
				'c2' => $equipo->color_sec,
				'email' => $equipo->email);
		$pdf->cabeza($teadat, $capdat);
		$headers = array('Nombre', 'Apellido', 'RUT', 'Departamento', 'Matricula');
		$pdf->mainTable($headers, $data);
		$pdf->pie();
		// Flush data before end the function
		$pdf->output('registro.pdf', 'D');
	}

	function login(){
		$this->load->library('input');
		// Chequear el usuario en la BD
		$usuario = $this->user->getUserByUsername($this->input->post('usu', TRUE));
		if($usuario == FALSE){
			//Código para redirigir con error TODO
			echo 'Usuario '.$this->input->post('usu', TRUE).' inexistente';
			return;
		}

		// Chequear datos del usuario
		$hashpwd = dohash($this->input->post('con'));
		if($hashpwd != $usuario->contrasena){
			//Código para redirigir con error TODO
			echo 'contraseña incorrecta';
			return;
		}
		// Usuario correctamente identificado, setear la cookie
		$usrdatos = array(	'user' => $this->input->post('usu'),
					'hashp' => $hashpwd);
		$this->session->set_userdata($usrdatos);

		//Redirigir al controlador
		redirect('/babydcc/principal/');
	}

	function about(){
		// FIXME ESTE MÉTODO NO PUEDE QUEDAR ASÍ: NO PUEDE MOSTRAR FORMULARIO PARA REGISTRAR UN ADMIN
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Registro de nuevo admin", 
				"mode" => "abo",
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('adm', $data);
		$this->load->view('footer', $data);
	}

	function regAdmin(){
		// FIXME ESTE MÉTODO NO PUEDE QUEDAR ASÍ: SE DEBE ELIMINAR AL LANZAR LA VERSIÓN FINAL
		$this->load->library('input');
		$u = $this->input->post('rut', TRUE);
		$p = $this->input->post('pass', TRUE);
		$pe = $this->input->post('per', TRUE);
		if($this->user->addNewAdmin($u, dohash($p), $pe))
			echo 'registrado con exito';
		else
			echo 'ocurrio un error';
	}

	function equipos(){
		// TODO
		//echo LOGOS_EQUIPO_UPLOAD_PATH;
	}

	function tabla(){
		// TODO
	}

	function fixture(){
		// TODO
	}

	function verEquipo($idEquipo){
		// TODO
		// Permite mostrar en pantalla información del Equipo
	}

	function verJugador($idJugador){
		// TODO
		// Permite mostrar en pantalla información del Jugador Específico
	}

	function error(){
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Home", 
				"mode" => "",
				"err_title" => $this->session->flashdata('err_title'),
				"err_msg" => $this->session->flashdata('err_msg'),
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('err', $data);
		$this->load->view('footer', $data);
	}

	function _loadUserPermissions(){
		// Obtener información de la cookie
		$usuario = $this->session->userdata('user');
		$passhash = $this->session->userdata('hashp');
		if($usuario == FALSE || $passhash == FALSE){
			// Si la cookie se modificó a mano, rechazarla
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('hashp');
			return 0;
		}
		// Obtener el objeto usuario
		$usu = $this->user->getUserByUsername($usuario);
		if($usu == FALSE){
			//Código para error TODO
			return FALSE;
		}
		// Comprobar ambas hash de contraseñas
		if($passhash != $usu->contrasena){
			//Si la cookie se modificó a mano, rechazarla
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('hashp');
			return 0;
		}
		return $usu->permisos;
	}
}
?>
