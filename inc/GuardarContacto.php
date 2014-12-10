<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
include_once("Datos.php");



// {Nombre:rrrr,
// 	Telefonos:[{Numero:"8979798"},{Numero:"8979798"},{Numero:"8979798"}]
// }


$Contactos=new Datos();

extract($_POST);

//$Nombre="Jose return true;";
$Contactos->Conectar();

$C=$Contactos->Insert("insert into Usuario values('','$Nombre')");


$ida=$Contactos->Select('SELECT MAX(idUsuario) as "idUsuario"  FROM Usuario');

$id=$ida[0]['idUsuario'];
// 
//
//$id=1;


// $Telefonos = array('0' => array("Numero"=>"3344","Dir"=>"ddd"  ) 
				  
// 				  );

foreach ($Telefonos as $key => $value)  {
	   
     $i=$Contactos->Insert("insert into Telefono values('', '$value[Numero]',$id,'dir')");;

}



	$Mensaje = array('Mensaje' =>$id);
echo json_encode(	$Mensaje);





