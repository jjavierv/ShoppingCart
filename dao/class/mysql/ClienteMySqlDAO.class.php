<?php
/**
 * Class that operate on table 'cliente'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-02-28 02:27
 */
class ClienteMySqlDAO implements ClienteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ClienteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cliente WHERE idcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cliente';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cliente ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cliente primary key
 	 */
	public function delete($idcliente){
		$sql = 'DELETE FROM cliente WHERE idcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idcliente);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ClienteMySql cliente
 	 */
	public function insert($cliente){
		$sql = 'INSERT INTO cliente (cedula, nombres, apellidos, email, direccion, fecha_nac, descuento) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cliente->cedula);
		$sqlQuery->set($cliente->nombres);
		$sqlQuery->set($cliente->apellidos);
		$sqlQuery->set($cliente->email);
		$sqlQuery->set($cliente->direccion);
		$sqlQuery->set($cliente->fechaNac);
		$sqlQuery->set($cliente->descuento);

		$id = $this->executeInsert($sqlQuery);	
		$cliente->idcliente = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ClienteMySql cliente
 	 */
	public function update($cliente){
		$sql = 'UPDATE cliente SET cedula = ?, nombres = ?, apellidos = ?, email = ?, direccion = ?, fecha_nac = ?, descuento = ? WHERE idcliente = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cliente->cedula);
		$sqlQuery->set($cliente->nombres);
		$sqlQuery->set($cliente->apellidos);
		$sqlQuery->set($cliente->email);
		$sqlQuery->set($cliente->direccion);
		$sqlQuery->set($cliente->fechaNac);
		$sqlQuery->set($cliente->descuento);

		$sqlQuery->setNumber($cliente->idcliente);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cliente';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCedula($value){
		$sql = 'SELECT * FROM cliente WHERE cedula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNombres($value){
		$sql = 'SELECT * FROM cliente WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByApellidos($value){
		$sql = 'SELECT * FROM cliente WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM cliente WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDireccion($value){
		$sql = 'SELECT * FROM cliente WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFechaNac($value){
		$sql = 'SELECT * FROM cliente WHERE fecha_nac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescuento($value){
		$sql = 'SELECT * FROM cliente WHERE descuento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCedula($value){
		$sql = 'DELETE FROM cliente WHERE cedula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNombres($value){
		$sql = 'DELETE FROM cliente WHERE nombres = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByApellidos($value){
		$sql = 'DELETE FROM cliente WHERE apellidos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM cliente WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDireccion($value){
		$sql = 'DELETE FROM cliente WHERE direccion = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFechaNac($value){
		$sql = 'DELETE FROM cliente WHERE fecha_nac = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescuento($value){
		$sql = 'DELETE FROM cliente WHERE descuento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ClienteMySql 
	 */
	protected function readRow($row){
		$cliente = new Cliente();
		
		$cliente->idcliente = $row['idcliente'];
		$cliente->cedula = $row['cedula'];
		$cliente->nombres = $row['nombres'];
		$cliente->apellidos = $row['apellidos'];
		$cliente->email = $row['email'];
		$cliente->direccion = $row['direccion'];
		$cliente->fechaNac = $row['fecha_nac'];
		$cliente->descuento = $row['descuento'];

		return $cliente;
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
	 * @return ClienteMySql 
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