<?php
interface IDatabaseConnectionParameters
{
	public function getHost();
	public function getDbName();
	public function getUsername();
	public function getPassword();
	public function getPort();
}