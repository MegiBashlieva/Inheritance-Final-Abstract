<?php
namespace classes\Person;

class Student extends Person
{
	private $score;
	
	public function __construct($name, $age, $isMale,$score)
	{
		parent::__construct($name, $age, $isMale);
		if($score >= 2 && $score <= 6){
			$this->score = $score;
		}else $this->score="invalid";
	}
	
	public function showStudentInfo()
	{
		return parent::showPersonInfo()."score : $this->score".PHP_EOL;
	}
}