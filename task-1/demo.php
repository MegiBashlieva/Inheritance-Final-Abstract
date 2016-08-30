<?php
use classes\Task\Task;
use classes\AllWork\AllWork;
use classes\Employee\Employee;

require_once 'outload.php';

$t1 = new Task("Task 1", 15);
$t2 = new Task("Task 2", 4);
$t3 = new Task("Task 3", 6);
$t4 = new Task("Task 4", 1);
$t5 = new Task("Task 5", 32);
$t6 = new Task("Task 6", 40);
$t7 = new Task("Task 7", 18);
$t8 = new Task("Task 8", 2);
$t9 = new Task("Task 9", 3);
$t10 = new Task("Task 10", 2);

$allWork = new AllWork();
$tasks = [$t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8,$t9,$t10];

for($i = 0 ; $i < 10 ; $i++){
	$allWork->addTask($tasks[$i]);
}
$count = 1;
$e1 = new Employee("Ivan");
$e2 = new Employee("Niki");
$e3 = new Employee("Tina");


while(true){
	echo PHP_EOL;
	echo "Start working day $count".PHP_EOL;
	$count++;
	$e1->setAllWork($allWork);
	$e1->startWorkingDay();
	$e2->setAllWork($allWork);
	$e2->startWorkingDay();
	$e3->setAllWork($allWork);
	$e3->startWorkingDay();
	
	if($allWork->allWorkIsDone()){
		break;
	}
}