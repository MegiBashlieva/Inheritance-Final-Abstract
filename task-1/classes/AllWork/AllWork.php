<?php
namespace classes\AllWork;

use classes\Task\Task;

class AllWork
{
	private $tasks = [] ;
	private $freePlacesForTasks;
	private $currentUnassignedTask;
	
	public function __construct()
	{
		$this->freePlacesForTasks = 10;
		$this->currentUnassignedTask = 0;
	}
	
	public function addTask(Task $task)
	{	
		if($this->freePlacesForTasks > 0){
			$this->tasks[] = $task;
			echo $task->getName()." has been added to the tasks!".PHP_EOL;
			$this->freePlacesForTasks -=1;
		}else echo "cant add more tasks";
	}
	
	public function getNextTask()
	{		
			
	if($this->currentUnassignedTask < 10){
			return $this->tasks[$this->currentUnassignedTask++];
		}else return "no more tasks!!!".PHP_EOL;
		 	
	}
	
	public function allWorkIsDone()
	{
		$allWarkIsDone = true;
		foreach ($this->tasks as $key=>$value){
			$hours = $this->tasks[$key]->getWorkingHours();
			if($hours != 0){
				$allWarkIsDone = false;
			}
		}
		return $allWarkIsDone;
	}
}