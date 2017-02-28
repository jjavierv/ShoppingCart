<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/CategoriaDAO.class.php');
	require_once('class/dto/Categoria.class.php');
	require_once('class/mysql/CategoriaMySqlDAO.class.php');
	require_once('class/mysql/ext/CategoriaMySqlExtDAO.class.php');
	require_once('class/dao/ClienteDAO.class.php');
	require_once('class/dto/Cliente.class.php');
	require_once('class/mysql/ClienteMySqlDAO.class.php');
	require_once('class/mysql/ext/ClienteMySqlExtDAO.class.php');
	require_once('class/dao/ProductoDAO.class.php');
	require_once('class/dto/Producto.class.php');
	require_once('class/mysql/ProductoMySqlDAO.class.php');
	require_once('class/mysql/ext/ProductoMySqlExtDAO.class.php');
	require_once('class/dao/ShoppingcartDAO.class.php');
	require_once('class/dto/Shoppingcart.class.php');
	require_once('class/mysql/ShoppingcartMySqlDAO.class.php');
	require_once('class/mysql/ext/ShoppingcartMySqlExtDAO.class.php');
	require_once('class/dao/ShoppingcartdetalleDAO.class.php');
	require_once('class/dto/Shoppingcartdetalle.class.php');
	require_once('class/mysql/ShoppingcartdetalleMySqlDAO.class.php');
	require_once('class/mysql/ext/ShoppingcartdetalleMySqlExtDAO.class.php');

?>