<?php  
/**
 * 	Controlador que gestiona el kardex
 */


#
class CalificacionesController extends Controller
{
	function __construct()
	{

		$this->auth = new AuthValidator();
		$this->validatorAuth($this->auth);
		// if (!$auth->makeAuth()) 
			// $this->localRedirect('login');		
		
		parent::__construct();
		$this->modeln    = "calificaciones"; 
		$this->path      = "calificaciones";
		$this->routeView = "calificaciones/calificaciones";
	}

	public function render(){
		$this->view->render($this->routeView);
	}

	public function getCalificaciones(){
		if ($this->validatorAuth($this->auth)) {
			$datos = $this->model->calificaciones($_SESSION['usuario']['matricula']);
			$this->view->datos = $datos;
			$this->render();
		}else{
			$this->localRedirect('login');
		}
	}
}
?>