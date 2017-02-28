<?php
/**
 * Class that operate on table 'shoppingcartdetalle'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
class ShoppingcartdetalleMySqlDAO implements ShoppingcartdetalleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ShoppingcartdetalleMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM shoppingcartdetalle WHERE idshoppingcartdetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM shoppingcartdetalle';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM shoppingcartdetalle ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param shoppingcartdetalle primary key
 	 */
	public function delete($idshoppingcartdetalle){
		$sql = 'DELETE FROM shoppingcartdetalle WHERE idshoppingcartdetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idshoppingcartdetalle);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ShoppingcartdetalleMySql shoppingcartdetalle
 	 */
	public function insert($shoppingcartdetalle){
		$sql = 'INSERT INTO shoppingcartdetalle (idshoppingcart, idproducto, cantidad) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($shoppingcartdetalle->idshoppingcart);
		$sqlQuery->setNumber($shoppingcartdetalle->idproducto);
		$sqlQuery->setNumber($shoppingcartdetalle->cantidad);

		$id = $this->executeInsert($sqlQuery);	
		$shoppingcartdetalle->idshoppingcartdetalle = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ShoppingcartdetalleMySql shoppingcartdetalle
 	 */
	public function update($shoppingcartdetalle){
		$sql = 'UPDATE shoppingcartdetalle SET idshoppingcart = ?, idproducto = ?, cantidad = ? WHERE idshoppingcartdetalle = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($shoppingcartdetalle->idshoppingcart);
		$sqlQuery->setNumber($shoppingcartdetalle->idproducto);
		$sqlQuery->setNumber($shoppingcartdetalle->cantidad);

		$sqlQuery->setNumber($shoppingcartdetalle->idshoppingcartdetalle);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM shoppingcartdetalle';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdshoppingcart($value){
		$sql = 'SELECT * FROM shoppingcartdetalle WHERE idshoppingcart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdproducto($value){
		$sql = 'SELECT * FROM shoppingcartdetalle WHERE idproducto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCantidad($value){
		$sql = 'SELECT * FROM shoppingcartdetalle WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdshoppingcart($value){
		$sql = 'DELETE FROM shoppingcartdetalle WHERE idshoppingcart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdproducto($value){
		$sql = 'DELETE FROM shoppingcartdetalle WHERE idproducto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCantidad($value){
		$sql = 'DELETE FROM shoppingcartdetalle WHERE cantidad = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ShoppingcartdetalleMySql 
	 */
	protected function readRow($row){
		$shoppingcartdetalle = new Shoppingcartdetalle();
		
		$shoppingcartdetalle->idshoppingcartdetalle = $row['idshoppingcartdetalle'];
		$shoppingcartdetalle->idshoppingcart = $row['idshoppingcart'];
		$shoppingcartdetalle->idproducto = $row['idproducto'];
		$shoppingcartdetalle->cantidad = $row['cantidad'];

		return $shoppingcartdetalle;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ShoppingcartdetalleMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>