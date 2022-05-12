<?php
class clase_mysqli{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*identificacion de error y texto de error*/
	var $Errno = 0;
	var $Error = "";
	/*identificacion de conexion y consulta*/
	var $Conexion_ID=0;
	var $Consulta_ID=0;
	/*constructor de la clase*/
	function clase_mysqli($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	/*conexion al servidor de db*/
	function conectar($host, $user, $pass, $db){
		if($db != "")$this->BaseDatos=$db;
		if($host != "")$this->Servidor=$host;
		if($user != "")$this->Usuario=$user;
		if($pass != "")$this->Clave=$pass;
		/*conectar al servidor*/
		$this->Conexion_ID=new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if(!$this->Conexion_ID){
			$this->Error="Ha fallado la conexion";
			return 0;
		}
		return$this->Conexion_ID;
	}
	function consulta($sql=""){
		if($sql==""){
			$this->Error="NO hay ninguna sentencia sql";
			return 0;
		}
		/*Ejecutar la cunsulta*/
		//$this->Consulta_ID=$this->Conexion_ID->query($sql);
		$this->Consulta_ID=mysqli_query($this->Conexion_ID,$sql);

		if(!$this->Consulta_ID){
			print $this->Conexion_ID->error;
			//$this->Errno->error;
		}
		return $this->Consulta_ID;
	}

	/*retorna el numero de campos de la consulta*/
	function numcampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}
	/*retorna de campos de la consulta*/
	function numregistros(){
		return mysqli_num_rows($this->Consulta_ID);
	}
	function verconsulta(){
		echo "<table class='tablecud' border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsultareporte(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".utf8_decode($row[$i])."</td>";
				//echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsulta_resultQr(){
		echo "<table class='tablecud '>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<th>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo  "<th>Ver resultados</th>";
		echo  "<th>Eliminar</th>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo "<td><a href='nuevo.php?numrand=$row[2]'><i class='fa fa-bar-chart' aria-hidden='true'></i></a></td>";
			echo "<td><a href='update.php?opt=2&numrand=$row[2]'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsulta_res(){
		$eval_class[1]="Excelente";
		$eval_class[2]="Bueno";
		$eval_class[3]="Regular";
		$eval_class[4]="Debe mejorar";

		$sentoAlumn[1]="Feliz";
		$sentoAlumn[2]="Interesado";
		$sentoAlumn[3]="Motivado";
		$sentoAlumn[4]="Entusiasmado";
		$sentoAlumn[5]="Preocupado";
		$sentoAlumn[6]="Temeroso";
		$sentoAlumn[7]="Triste";
		$sentoAlumn[8]="Candaso";
		$cont=1;
		echo "<table class='tablecud shortTable'>";
		echo "<tr>";
		echo "<td>#</td>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			if($i==0){

			}else{echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";}
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			echo "<td>".$cont++."</td>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				if($i==0){

				}elseif($i==4){
					echo "<td>".$eval_class[$row[$i]]."</td>";
				}else{
					echo "<td>".$row[$i]."</td>";
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsulta_crud(){
		echo "<table id='example' class='table table-bordered  display nowrap tablecud'  width='99%'>";
		echo " <thead><tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<th>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo  "<th>Actualizar</th>";
		echo  "<th>Borrar</th>";
		echo "</tr> </thead>";
		echo "<tbody>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "<td><a href='actualizar.php?id=$row[0]'><i class='fas fa-edit'></i></a></td>";
			echo "<td><a href='borrar.php?idr=$row[0]'><i class='fas fa-trash-alt'></i></a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo " <tfoot><tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<th>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo  "<th>Actualizar</th>";
		echo  "<th>Borrar</th>";
		echo "</tr> </tfoot>";

		echo "</table>";
	}

	function verconsulta_qr(){
		echo "<table id='example' class='table table-bordered  display nowrap tablecud'  width='99%'>";
		echo "<thead><tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<th>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo  "<th>Generar código Aquí</th>";
		echo "</tr></thead>";
		echo "<tbody>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "<td class='iconMediano'><a href='actualizar.php?id=$row[0]'><i class='fa fa-qrcode'></i></a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "<tfoot><tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<th>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo  "<th>Generar código Aquí</th>";
		echo "</tr></thead>";
		echo "<tfoot>";
		echo "</table>";
	}
	function consulta_lista_select($nameinput){
		echo "<br><laber class='labels' for='$nameinput'> $nameinput </label>";
		echo "<select id='$nameinput' name='$nameinput'>";
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			//for ($i=0; $i < $this->numcampos(); $i++) { 
				
				echo "<option value='$row[0]'>$row[1]</option>";
			//}
			//return $row;
		}
		echo "</select> ";
	}

	function consulta_lista(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}
	function verconsulta_jsonchart(){
		$result = array();
		$row=null;
		$calif[1]="Excelente";
		$calif[2]="Bueno";
		$calif[3]="Regular";
		$calif[4]="Debe Mejorar";
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			array_push($result, array($calif[$row[0]], $row[1] ));
			//$data[]=$row;
		}
		//echo json_encode(array("sensores"=>$data));
		print json_encode($result, JSON_NUMERIC_CHECK);
	}

	function consulta_json(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			$data[]=$row;
		}
		echo json_encode(array("sensores"=>$data));
	}
	function consulta_busqueda_json(){
		if($this->numcampos() > 0){
			while ($row = mysqli_fetch_array($this->Consulta_ID)) {
				$data[]=$row;
			}
		    $resultData = array('status' => true, 'postData' => $data);
	    }else{
	    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
	    }

	    echo  json_encode($resultData);
	}
	function consulta_busqueda2_json(){
		if($this->numcampos() > 0){
			while ($row = mysqli_fetch_array($this->Consulta_ID)) {
				$data[]=$row;
			}
		    $resultData = array('status' => true, 'postData' => $data);
	    }else{
	    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
	    }

	    //return json_encode($resultData);
	    echo  json_encode($resultData);
	}

}
?>