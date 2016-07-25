<?php
interface IDatabaseConnection
{
	public static function getInstance();
	public function getConnection();
	
}