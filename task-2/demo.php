<?php
require_once 'outload.php';
use classes\Person\Person;
use classes\Person\Student;
use classes\Person\Employee;

$people = [];

$person1 = new Person("megi", 22, "no");
$person2 = new Person("pesho", 30, "yes");
$student1 = new Student("juju", 19, "no", 4);
$student2 = new Student("niki", 23,"yes", 6);
$employee1 = new Employee("gosho", 35, "yes", 100, 8);
$employee2 = new Employee("krisi", 19, "no", 60, 6);

$people = [$person1,$person2,$student1,$student2,$employee1,$employee2];

foreach ($people as $key=>$value){
	if($people[$key] instanceof Employee){
		echo $value->showEmployeeInfo();
	}else if($people[$key] instanceof Student){
		echo $value->showStudentInfo();
	}else if($people[$key] instanceof Person){
		echo $value->showPersonInfo();
	}
}
echo "........................".PHP_EOL;
foreach ($people as $key=>$value){
	if($people[$key] instanceof Employee){
		echo "overtime salary : ".$value->calculateOvertime(2);
		echo PHP_EOL;
		echo $value->showEmployeeInfo();
	}
}
