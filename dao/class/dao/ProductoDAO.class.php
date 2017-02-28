<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
interface ProductoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Producto 
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
 	 * @param producto primary key
 	 */
	public function delete($idproducto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Producto producto
 	 */
	public function insert($producto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Producto producto
 	 */
	public function update($producto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescripcion($value);

	public function queryByPrecio($value);

	public function queryByImagen($value);

	public function queryByIdcategoria($value);


	public function deleteByDescripcion($value);

	public function deleteByPrecio($value);

	public function deleteByImagen($value);

	public function deleteByIdcategoria($value);


}
?>