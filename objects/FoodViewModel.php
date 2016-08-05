<?php
// TODO: Create base class ViewModel and IViewModel.  FoodViewModel extends ViewModel
class FoodViewModel
{
	private $vars;
	
	public function __construct()
	{
		$this->vars = array();
	}

	public function setVar( $key, $value)
	{
		return $this->vars[$key] = $value;
	}
	
	public function getVars()
	{
		return $this->getVars();
	}
	
	function display($file) 
	{
		foreach ($this->vars AS $key => $value) {
		  ${$key} = $value;
		}

		require_once($file);
	}
}