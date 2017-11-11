<?php
class dt_localidades extends Ingreso2018_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_localidad, localidad FROM localidades ORDER BY localidad";
		return toba::db('Ingreso2018')->consultar($sql);
	}



}
?>