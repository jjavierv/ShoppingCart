<?php
/**
 * Class that operate on table 'shoppingcart'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
class ShoppingcartMySqlDAO implements ShoppingcartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ShoppingcartMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM shoppingcart WHERE idshoppingcart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM shoppingcart';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM shoppingcart ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param shoppingcart primary key
 	 */
	public function delete($idshoppingcart){
		$sql = 'DELETE FROM shoppingcart WHERE idshoppingcart = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idshoppingcart);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ShoppingcartMySql shoppingcart
 	 */
	public function insert($shoppingcart){
		$sql = 'INSERT INTO shoppingcart (idcliente, subtotal, iva, total, fecha) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($shoppingcart->idcliente);
		$sqlQuery->set($shoppingcart->subtotal);
		$sqlQuery->set($shoppingcart->iva);
		$sqlQuery->set($shoppingcart->total);
		$sqlQuery->set($shoppingcart->fecha);

		$id = $this->executeInsert($sqlQuery);	
		$shoppingcart->idshoppingcart = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ShoppingcartMySql shoppingcart
 	 */
	public function update($shoppingcart){
		$sql = 'UPDATE shoppingcart SET idcliente = ?, subtotal = ?, iva = ?, total = ?, fecha = ? WHERE idshoppingcart = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($shoppingcart->idcliente);
		$sqlQuery->set($shoppingcart->subtotal);
		$sqlQuery->set($shoppingcart->iva);
		$sqlQuery->set($shoppingcart->total);
		$sqlQuery->set($shoppingcart->fecha);

		$sqlQuery->setNumber($shoppingcart->idshoppingcart);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM shoppingcart';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdcliente($value){
		$sql = 'SELECT * FROM shoppingcart WHERE idcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySubtotal($value){
		$sql = 'SELECT * FROM shoppingcart WHERE subtotal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIva($value){
		$sql = 'SELECT * FROM shoppingcart WHERE iva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotal($value){
		$sql = 'SELECT * FROM shoppingcart WHERE total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM shoppingcart WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdcliente($value){
		$sql = 'DELETE FROM shoppingcart WHERE idcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubtotal($value){
		$sql = 'DELETE FROM shoppingcart WHERE subtotal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIva($value){
		$sql = 'DELETE FROM shoppingcart WHERE iva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotal($value){
		$sql = 'DELETE FROM shoppingcart WHERE total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM shoppingcart WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ShoppingcartMySql 
	 */
	protected function readRow($row){
		$shoppingcart = new Shoppingcart();
		
		$shoppingcart->idshoppingcart = $row['idshoppingcart'];
		$shoppingcart->idcliente = $row['idcliente'];
		$shoppingcart->subtotal = $row['subtotal'];
		$shoppingcart->iva = $row['iva'];
		$shoppingcart->total = $row['total'];
		$shoppingcart->fecha = $row['fecha'];

		return $shoppingcart;
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
	 * @return ShoppingcartMySql 
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