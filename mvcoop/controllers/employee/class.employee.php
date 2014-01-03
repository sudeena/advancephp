<?php 
require 'models/employee/class.employee_model.php';
class employee{
	private $id;
	
	function __construct(){
		
	}

	function getAll(){
		$employeemodelobj= new employee_model();
		$retdata = $employeemodelobj->returnAll();
		return $retdata;

	}
	
	function getsinglerow($id){
		$this->id=$id;
		$employeemodelobj=new employee_model();
		$val=$employeemodelobj->getonerow($this->id);
		return $val;
	}
	
	function addnew(){
		$sid=$_POST['editid'];
		$employeemodelobj = new employee_model();
		if($_POST){
			$sname=$_POST['name'];
			$saddress=$_POST['address'];
			$scontact=$_POST['contact'];
		}
		if($sid){
			$employeemodelobj->update($sid,$sname,$saddress,$scontact);
		}
		else{
			$employeemodelobj->addemployee($sname,$saddress,$scontact);
		}
		
	}
	function deleteEmployee(){
		$s_id=@$_GET['id'];
		$employeemodelobj = new employee_model();
		$employeemodelobj->deleteemployee($s_id);
	}
	function deleteallrecord(){
		$employeemodelobj=new employee_model();
		$employeemodelobj->truncatetable();
	}
}//end of class
//for add and edit operations
if(@$_GET['mode']){
	$employeeObj= new employee();
	$mode = $_GET['mode'];
	switch($mode){
		case 'add':
			$employeeObj->addNew();
		break;
		case 'delete':
			$employeeObj->deleteEmployee();
			break;
		case 'truncate':
			$employeeObj->deleteallrecord();
			break;
		default:

		}
	}


