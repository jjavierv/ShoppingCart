<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CategoriaDAO
	 */
	public static function getCategoriaDAO(){
		return new CategoriaMySqlExtDAO();
	}

	/**
	 * @return ClienteDAO
	 */
	public static function getClienteDAO(){
		return new ClienteMySqlExtDAO();
	}

	/**
	 * @return ProductoDAO
	 */
	public static function getProductoDAO(){
		return new ProductoMySqlExtDAO();
	}

	/**
	 * @return ShoppingcartDAO
	 */
	public static function getShoppingcartDAO(){
		return new ShoppingcartMySqlExtDAO();
	}

	/**
	 * @return ShoppingcartdetalleDAO
	 */
	public static function getShoppingcartdetalleDAO(){
		return new ShoppingcartdetalleMySqlExtDAO();
	}


}
?>