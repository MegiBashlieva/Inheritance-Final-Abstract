<?php
namespace classes\Person;

class Employee extends Person
{
	private $daySalary;
	private $workHours;
	
	public function __construct($name, $age, $isMale,$daySalary,$workHours)
	{
		parent::__construct($name, $age, $isMale);
		$this->daySalary = $daySalary;
		$this->workHours = $workHours;
	}
	
	public function calculateOvertime($hours)
	{	if($this->age > 18){
			$salaryPerHour = $this->daySalary / $this->workHours;
			$sum = $hours * $salaryPerHour * 1.5;
			$this->daySalary += $sum; 
			$this->workHours += $hours;
			
		return $sum;
		}
	}
	
	public function showEmployeeInfo()
	{
		return parent::showPersonInfo()."day salary : $this->daySalary".PHP_EOL.
			"works hours : $this->workHours".PHP_EOL;
	}
	
}