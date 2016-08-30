<?php
namespace classes\Employee;

use classes\AllWork\AllWork;
use classes\Task\Task;
class Employee
{
	private $name;
	private $currentTask;
	private $hoursLeft;
	private $allWork;
	
	public function __construct($name)
	{
		$this->name = $name;
		$this->hoursLeft = 8;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getHoursLeft()
	{
		return $this->hoursLeft;
	}
	
	public function setHoursLeft($hours)
	{
		if($hours > 0){
			$this->hoursLeft = $hours;
		}
	}
	
	public function setCurrentTask(Task $task)
	{
		$this->currentTask = $task;
	}
	
	public function getCurrentTask()
	{
		return $this->currentTask;
	}
	
	public function work()
	{
		if(!empty($this->currentTask) && !empty($this->hoursLeft)){
			$currentTaskHours = $this->currentTask->getWorkingHours();
				
			$hours = $currentTaskHours - $this->hoursLeft;
			if($hours > 0){
				echo $this->name." is working on task".$this->currentTask->getName()." for "
						.$this->hoursLeft.PHP_EOL;
				$this->currentTask->setWorkingHours($hours);
				$this->hoursLeft = 0;
			}else if($hours < 0){
				echo $this->name." is working on task".$this->currentTask->getName()." for "
						.$this->currentTask->getWorkingHours().PHP_EOL;
				$this->currentTask->setWorkingHours(0);
				$this->hoursLeft = abs($hours);
			}else{
				$this->currentTask->setWorkingHours(0);
				$this->hoursLeft = 0;
			}
		}
	}
	
	public function startWorkingDay()
	{
		$this->doWork();
		$this->hoursLeft = 8 ;
	}
	
	private function doWork()
	{	
		
		if(empty($this->currentTask) || $this->currentTask->getWorkingHours() == 0 ){
			$task = $this->allWork->getNextTask();
			if(is_string($task)){
				echo $task; $this->hoursLeft=0; return 0;
			}
			$this->setCurrentTask($task);
			echo "Assigning task ".$this->currentTask->getName()." to ".$this->name.PHP_EOL;
			 
			
		}
			while($this->hoursLeft !=0){
				$this->work();
				
				$this->doWork();
				
			}
	}
	
	public function getAllWork()
	{
		return $this->allWork;
	}
	
	public function setAllWork(AllWork $allWork)
	{
		$this->allWork = $allWork;
	}
	public function showReport()
	{
		return "worker name - ".$this->name.PHP_EOL.
		"task name - ".$this->currentTask->getName().PHP_EOL.
		"worker left hours  - ".$this->getHoursLeft().PHP_EOL.
		"task hours left - ".$this->currentTask->getWorkingHours().PHP_EOL;
	}
	
	
}