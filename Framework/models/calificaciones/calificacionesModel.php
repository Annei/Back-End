<?php
class CalificacionesModel extends Model
{
	public function getcalif($matricula,$ultimo_p){

		$con = $this->DB->DBFconnect('DLISTA');
		$conn = $this->DB->DBFConnect("DMATER");
		$materia = [];
		$aux = [];
		if($con && $conn){
			$numero_registros = dbase_numrecords($con);
			$numero_registross = dbase_numrecords($conn);
			$filaa = '';

			for($i=1; $i<=$numero_registros; $i++){
				$fila = dbase_get_record_with_names($con, $i);
				if (strcmp($fila["ALUCTR"], $matricula) == 0  && $fila["PDOCVE"] == $ultimo_p ){
					$aux = [
						'Clave' => $fila['MATCVE'],
						'Nombre'=>'#',
						'Parcial1' =>$fila['LISPA1'],
						'Parcial2' =>$fila['LISPA2'],
						'Parcial3' =>$fila['LISPA3'],
						'Parcial4' =>$fila['LISPA4'],
						'Parcial5' =>$fila['LISPA5']
					];
					array_push($materia,$aux);
				}
			}
			for($s=1; $s <= $numero_registross;$s++){
				$filaa = dbase_get_record_with_names($conn, $s);
				for($e=0 ; $e <sizeof($materia); $e++ ){
				if (strcmp($materia[$e]['Clave'], $filaa['MATCVE']) == 0){
					//lo igualamos Nombre de la materia a nuestra variable
						$materia[$e]['Nombre'] = $filaa['MATNOM'];
					}
				}
			}
			return $materia;
			dbase_close($con);
		}
	 	return null;
	}
	public function calificaciones($matricula){
		return "Hola";
	}
}
?>