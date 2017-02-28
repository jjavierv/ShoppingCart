<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
interface ShoppingcartdetalleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Shoppingcartdetalle 
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
 	 * @param shoppingcartdetalle primary key
 	 */
	public function delete($idshoppingcartdetalle);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Shoppingcartdetalle shoppingcartdetalle
 	 */
	public function insert($shoppingcartdetalle);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Shoppingcartdetalle shoppingcartdetalle
 	 */
	public function update($shoppingcartdetalle);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdshoppingcart($value);

	public function queryByIdproducto($value);

	public function queryByCantidad($value);


	public function deleteByIdshoppingcart($value);

	public function deleteByIdproducto($value);

	public function deleteByCantidad($value);


}
?>