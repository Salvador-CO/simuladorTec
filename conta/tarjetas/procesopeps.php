<?php 
include("../../conexion.php");

foreach($_POST as $rownumber_name => $val) {

//remember to clean post values
        $rownumber = rtrim($rownumber_name);
        $val = rtrim($val);
		$cadena =trim($val);

        //from the fieldname:rownumber_id we need to get rownumber_id
        $split_data = explode(':', $rownumber);
        $rownumber_id = $split_data[1];
        $rownumber_name = $split_data[0];

$sql_1 = "UPDATE tarjetapeps SET $rownumber_name = '$cadena' WHERE id_peps = $rownumber_id";
if ($conexion->query($sql_1)) {
$last_id = $conexion->insert_id;
//echo $sql_1;
echo "Registro editandose espere: <img src='images/loader.gif' height='15px'>";
} else {
printf("Errormessage: %s\n", $conexion->error);
}

}
?>