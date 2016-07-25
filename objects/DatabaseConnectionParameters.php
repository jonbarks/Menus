<?php

require_once 'interfaces/IDatabaseConnectionParameters.php';
		
class DatabaseConnectionParameters implements IDatabaseConnectionParameters  
{
	private $_host;
	private $_dbname;
	private $_username;
	private $_password;
	private $_port;
	
	public function __construct( $host, $dbname, $username, $password, $port = null)
	{
		$this->_host = $host;
		$this->_dbname = $dbname;
		$this->_username = $username;
		$this->_password = $password;
		$this->_port = $port; 
	}
	public function getHost() { return $this->_host; }
	public function getDbName() { return $this->_dbname; }
	public function getUsername() { return $this->_username; }
	public function getPassword() { return $this->_password; }
	public function getPort() { return $this->_port; }
	
}

$databaseConnectionParameters = new DatabaseConnectionParameters( 
'localhost',
'menu',
'ldbuser',
'pw4ldbuser', 
'3306'
);

?>

