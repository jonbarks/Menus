<?php

require_once 'interfaces/IDatabaseConnection.php';
require_once 'objects/DatabaseConnectionParameters.php';

// Singleton for a Database Connection.
class DatabaseConnection implements IDatabaseConnection 
{
	// Hold the class instance.
	private static $_instance = null;
	private $_connection;

	private function __construct()
	{
		global $databaseConnectionParameters;
		
		$connection_string = "mysql:host=" . $databaseConnectionParameters->getHost();
		if( $databaseConnectionParameters->getPort()) {
			$connection_string .= ";port=" . $databaseConnectionParameters->getPort();
		}
		$connection_string .= ";dbname=" . $databaseConnectionParameters->getDbName();
		 
		// throws PDOException(s)
		$this->_connection = new PDO($connection_string , 
				$databaseConnectionParameters->getUsername(), $databaseConnectionParameters->getPassword());
		
		$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}

	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new DatabaseConnection();
		}
		 
		return self::$_instance;
	}

	public function getConnection()
	{
		return $this->_connection;
	}
}