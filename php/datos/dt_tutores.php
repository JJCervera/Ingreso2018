<?php
class dt_tutores extends Ingreso2018_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['dni'])) {
			$where[] = "dni ILIKE ".quote("%{$filtro['dni']}%");
		}
		if (isset($filtro['apellidos'])) {
			$where[] = "apellidos ILIKE ".quote("%{$filtro['apellidos']}%");
		}
		$sql = "SELECT
			t_t.id_tutor,
			t_t.dni,
			t_t.cuil,
			t_t.id_localidad,
			t_t.apellidos,
			t_t.nombres,
			t_t.fecha_nac,
			t_t.barrio,
			t_t.calle,
			t_t.altura,
			t_t.telefono
		FROM
			tutores as t_t
		ORDER BY apellidos";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Ingreso2018')->consultar($sql);
	}


	function get_descripciones()
	{
		$sql = "SELECT id_localidad, apellidos FROM tutores ORDER BY apellidos";
		return toba::db('Ingreso2018')->consultar($sql);
	}

}
?>