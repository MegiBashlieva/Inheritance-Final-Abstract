<?php
namespace classes\Person;

class Person
{
	protected  $name;
	protected  $age;
	protected  $isMale;

	public function __construct($name, $age, $isMale)
	{
		$this->name = $name;
		$this->age = $age;
		$this->isMale = $isMale;
	}

	public function showPersonInfo()
	{
		return "name : $this->name".PHP_EOL.
		"age : $this->age".PHP_EOL."ismale : $this->isMale".PHP_EOL;
	}
}