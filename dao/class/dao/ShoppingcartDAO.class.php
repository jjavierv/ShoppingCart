<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
interface ShoppingcartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Shoppingcart 
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
 	 * @param shoppingcart primary key
 	 */
	public function delete($idshoppingcart);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Shoppingcart shoppingcart
 	 */
	public function insert($shoppingcart);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Shoppingcart shoppingcart
 	 */
	public function update($shoppingcart);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdcliente($value);

	public function queryBySubtotal($value);

	public function queryByIva($value);

	public function queryByTotal($value);

	public function queryByFecha($value);


	public function deleteByIdcliente($value);

	public function deleteBySubtotal($value);

	public function deleteByIva($value);

	public function deleteByTotal($value);

	public function deleteByFecha($value);


}
?>