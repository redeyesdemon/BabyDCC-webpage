<?php
class Babydcc extends Controller{

	private $userRut;

	private $permissions = array();
	private $actionLinks = array();

	function Babydcc(){
		parent::Controller();
		// Definir permisos de los grupos de usuarios
		$this->permissions[0] = array();
		$this->permissions[1] = array('data' => 'Mi perfil');
		$this->permissions[2] = array(	'data' => 'Mi perfil',
						'admteam' => 'Administrar mi equipo');
		$this->permissions[3] = array(	'data' => 'Mi perfil',
						'admteams' => 'Administrar equipos',
						'admpart' => 'Administrar partidos',
						'genpap' => 'Generar papeleta de partido',
						'genfixt' => 'Autogenerar Fixture');

		// Defnir los vinculos para cada accion
		$base = base_url().'index.php';
		$this->actionLinks = array(	'data' => $base.'/babydcc/perfil/',
						'admteam' => $base.'/babydcc/admequipo/',
						'admteams' => $base.'/babydcc/admequipos/',
						'admpart' => $base.'/babydcc/admpartidos/',
						'genpap' => $base.'/babydcc/generarpapeleta/',
						'genfixt' => $base.'/babydcc/genfixture/');
		//$this->load->library('input');
	}

	function principal(){
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Home", 
				"mode" => "",
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('main', $data);
		$this->load->view('footer', $data);
	}

	function perfil(){
		$this->_setUserRut();
		$this->load->model('jugador');
		$usuario = $this->jugador->getJugadorByRut($this->userRut);
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Home", 
				"mode" => "",
				"nomb" => $usuario->nombre,
				"apell" => $usuario->apellido,
				"rut" => $usuario->RUT,
				"matri" => $usuario->matricula,
				"emai" => $usuario->email,
				"tele" => $usuario->telefono,
				"apod" => $usuario->apodo,
				"depar" => $usuario->departamento,
				"ava_nomb" => base_url().'uploads/avatares/'.($usuario->avatar_name==""?"null_avatar.jpg":$usuario->avatar_name),
				"ava_wi" => $usuario->avatar_width==0?100:$usuario->avatar_width,
				"ava_he" => $usuario->avatar_height==0?100:$usuario->avatar_height,
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('modprof', $data);
		$this->load->view('footer', $data);
	}

	function avatar(){
		$this->_setUserRut();
		$this->load->model('jugador');
		$usuario = $this->jugador->getJugadorByRut($this->userRut);
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Home", 
				"mode" => "",
				"ava_nomb" => base_url().'uploads/avatares/'.($usuario->avatar_name==""?"null_avatar.jpg":$usuario->avatar_name),
				"ava_wi" => $usuario->avatar_width==0?100:$usuario->avatar_width,
				"ava_he" => $usuario->avatar_height==0?100:$usuario->avatar_height,
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('modava', $data);
		$this->load->view('footer', $data);
	}

	function modPerfil(){
		$this->_setUserRut();
		// Chequear que no se están modificando datos ajenos
		$rut_post = $this->input->post('neo_rut');
		if($rut_post != $this->userRut){
			// Código para redirigir con error TODO
			echo 'Imposible realizar la modificacion.';
			return;
		}

		// Obtener el objeto usuario
		$usuario = $this->user->getUserByUsername($this->userRut);

		// Obtener los datos nuevos
		$new_ema = $this->input->post('new_ema');
		$new_tel = $this->input->post('new_tel');
		$new_apo = $this->input->post('new_apo');
		$new_pass = $this->input->post('new_pass');
		$new_pass2 = $this->input->post('new_pass2');
		$usu_pass = $this->input->post('usu_pass');

		// Chequear que las nuevas passwords coinciden
		if($new_pass != $new_pass2){
			// Código para redirigir con error TODO
			echo 'Las passwords nuevas no coinciden.';
			return;
		}
		$this->load->model('jugador');
		$jugador = $this->jugador->getJugadorByRut($rut_post);

		// Procesar la contraseña y dejarla lista para la BD

		if($new_pass == "" || $new_pass2 == "")
			$new_pass = $usuario->contrasena;
		else
			$new_pass = dohash($new_pass);

		if($new_ema == "")
			$new_ema = $jugador->email;
		if($new_tel == "" || $new_tel == 0)
			$new_ema = $jugador->telefono;
		if($new_apo == "")
			$new_apo = $jugador->apodo;

		// Modificar los datos del usuario
		$r1 = $this->jugador->updateJugador($rut_post, $new_ema, $new_tel, $new_apo);
		$r2 = $this->user->updatePassword($rut_post, $new_pass);
		if(!$r1 && !$r2){
			//Código para redirigir con error TODO
			echo 'Ocurrio un error actualizando los datos';
			return;
		}

		$this->session->set_flashdata('succ_title', "Actualizaci&oacute;n exitosa");
		$this->session->set_flashdata('succ_msg', "Tus datos fueron correctamente actualizados.");
		redirect('/babydcc/success/');
	}

	function modAvatar(){
		$this->_setUserRut();

		// Obtener el nuevo avatar
		$config['upload_path'] = AVATAR_UPLOAD_PATH;
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size'] = '250';
		$config['max_width'] = '100';
		$config['max_height'] = '100';
		$config['overwrite'] = TRUE;
		$exten = explode('.', $_FILES['new_ava']['name']);
		$config['file_name'] = 'avatar_'.$this->userRut.'.'.$exten[1];

		$this->load->library('upload', $config);

		$sin_archivo = FALSE;
		$data = FALSE;
		$result = $this->upload->do_upload('new_ava');
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

		$this->load->model('jugador');
		$resultado = $this->jugador->updateAvatar($this->userRut, $data);

		// Mensaje de éxito o error.
		if($resultado == TRUE){
			$this->session->set_flashdata('succ_msg', "Se actualiz&oacute; correctamente tu avatar");
			$this->session->set_flashdata('succ_title', "Actualizaci&oacute;n exitosa");
			redirect('/babydcc/success/');
		}else{
			$this->session->set_flashdata('err_msg', "Ocurri&oacute; un error mientras se actualizaba tu avatar");
			redirect('/babydcc/success/');
		}
	}

	function success(){
		// Cargar la vista
		$data = array(	"titulo" => "Baby DCC 2011 - Home", 
				"mode" => "",
				"msg_title" => $this->session->flashdata('succ_title'),
				"msg" => $this->session->flashdata('succ_msg'),
				"permissions" => $this->permissions,
				"links" => $this->actionLinks,
				"per" => $this->_loadUserPermissions());
		$this->load->view('head', $data);
		$this->load->view('right', $data);
		$this->load->view('success', $data);
		$this->load->view('footer', $data);
		// Borraar mensajes antiguos
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

	function logout(){
		// Borrar información de la cookie
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('hashp');

		// Redirigir a main/index
		redirect('/main/index/');
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

	function _setUserRut(){
		// Obtener la información del usuario
		$rut = $this->session->userdata('user');
		// Redirigir en caso que sea necesario
		if($rut == false)
			redirect('/main/index/');
		$this->userRut = $rut;
	}
}
?>
