<?php

/**
 * Datos básicos de una tabla
 *
 * @author Andrés Javier López <ajavier.lopez@gmail.com>
 * @copyright Klan Estudio (www.klanestudio.com) - GNU Lesser General Public License
 * @date Sep 2012
 * @version 2
 * @ingroup Database
 */

class BasicTable
{
	protected $table;
	
	protected $fields = array();
	
	protected $alias = array();
	
	public function setTable($table) {
		$this->table = $table;
	}
	
	public function setFields($fields) {
		$this->fields = $fields;
	}
	
	public function addAlias($field, $alias) {
		$this->alias[$field] = $alias;
	}
	
	public function getTable() {
		return $this->table;
	}
	
	/**
	 * Devuelve una cadena con la lista de campos de la tabla, usado para insert y update
	 * @param array $values contiene los valores válidos para la inserción
	 * @return string
	 */
	protected function getFields($values = array())
	{
		// Esta función se movio para una clase más básica
		$fields = array();
	
		// Las llaves foráneas ya están en la lista de campos
		foreach($this->fields as $alias => $field)
		{
			if(empty($values))
			{
				// Eliminado el sufijo del nombre de la tabla
				
				// Incluido alias
				if(array_key_exists($field, $this->alias)) {
					$alias = ' AS '.SC.$this->alias[$field].SC;
				}
				elseif(is_string($alias)) {
					$alias = ' AS '.SC.$alias.SC;
				}
				else {
					$alias = '';
				}
				
				$fields[] = SC.$this->table.SC.'.'.SC.$field.SC.$alias;
			}
			elseif(isset($values[$field]))
			{
				// Eliminado el sufijo del nombre de la tabla
				$fields[] = SC.$field.SC;
			}
		}
	
		$string = implode(', ', $fields);
		return $string;
	}
}
