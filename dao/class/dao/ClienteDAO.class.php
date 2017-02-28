<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
interface ClienteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cliente 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param cliente primary key
 	 */
	public function delete($idcliente);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cliente cliente
 	 */
	public function insert($cliente);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cliente cliente
 	 */
	public function update($cliente);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCedula($value);

	public function queryByNombres($value);

	public function queryByApellidos($value);

	public function queryByEmail($value);

	public function queryByDireccion($value);

	public function queryByFechaNac($value);

	public function queryByDescuento($value);


	public function deleteByCedula($value);

	public function deleteByNombres($value);

	public function deleteByApellidos($value);

	public function deleteByEmail($value);

	public function deleteByDireccion($value);

	public function deleteByFechaNac($value);

	public function deleteByDescuento($value);


}
?>