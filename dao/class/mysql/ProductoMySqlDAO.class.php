<?php
/**
 * Class that operate on table 'producto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
class ProductoMySqlDAO implements ProductoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProductoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM producto WHERE idproducto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM producto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM producto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param producto primary key
 	 */
	public function delete($idproducto){
		$sql = 'DELETE FROM producto WHERE idproducto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idproducto);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProductoMySql producto
 	 */
	public function insert($producto){
		$sql = 'INSERT INTO producto (descripcion, precio, imagen, idcategoria) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($producto->descripcion);
		$sqlQuery->set($producto->precio);
		$sqlQuery->set($producto->imagen);
		$sqlQuery->setNumber($producto->idcategoria);

		$id = $this->executeInsert($sqlQuery);	
		$producto->idproducto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProductoMySql producto
 	 */
	public function update($producto){
		$sql = 'UPDATE producto SET descripcion = ?, precio = ?, imagen = ?, idcategoria = ? WHERE idproducto = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($producto->descripcion);
		$sqlQuery->set($producto->precio);
		$sqlQuery->set($producto->imagen);
		$sqlQuery->setNumber($producto->idcategoria);

		$sqlQuery->setNumber($producto->idproducto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM producto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescripcion($value){
		$sql = 'SELECT * FROM producto WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrecio($value){
		$sql = 'SELECT * FROM producto WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagen($value){
		$sql = 'SELECT * FROM producto WHERE imagen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdcategoria($value){
		$sql = 'SELECT * FROM producto WHERE idcategoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescripcion($value){
		$sql = 'DELETE FROM producto WHERE descripcion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrecio($value){
		$sql = 'DELETE FROM producto WHERE precio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagen($value){
		$sql = 'DELETE FROM producto WHERE imagen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdcategoria($value){
		$sql = 'DELETE FROM producto WHERE idcategoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProductoMySql 
	 */
	protected function readRow($row){
		$producto = new Producto();
		
		$producto->idproducto = $row['idproducto'];
		$producto->descripcion = $row['descripcion'];
		$producto->precio = $row['precio'];
		$producto->imagen = $row['imagen'];
		$producto->idcategoria = $row['idcategoria'];

		return $producto;
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
	 * @return ProductoMySql 
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