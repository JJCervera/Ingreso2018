<?php
class dt_alumnos extends Ingreso2018_datos_tabla
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
			t_a.id_alumno,
			t_a.dni,
			t_a.cuil,
			t_a.id_localidad,
			t_a.id_tutor,
			t_a.apellidos,
			t_a.nombres,
			t_a.fecha_nac,
			t_a.barrio,
			t_a.calle,
			t_a.altura
		FROM
			alumnos as t_a
		ORDER BY apellidos";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('Ingreso2018')->consultar($sql);
	}

}

?>