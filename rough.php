<?php

class calculator{

   private $internal =10;
   public $result =array();

	function add($a,$b){
    $sum = $a+$b+$this->internal;
		$this->result['sum']=$sum;
	}

	function subtract($a,$b){
    $sub = $a-$b;
		$this->result['sub']=$sub;
	}

	function multiply($a,$b){
		$mul = $a*$b;
		$this->result['mul']=$mul;
	}

	function divide($a,$b){
		$div = $a/$b;
		$this->result['div']=$div;
	}
	function modulus($a,$b){
		$mod = $a%$b;
		$this->result['mod']=$mod;
	}
	function average($a,$b){

    $this->add($a,$b);
    $avg = $this->result['sum']/2;
		$this->result['avg']=$avg;
    
	}
}



$calculate = new calculator;
$calculate->average(10,20);
print_r($calculate->result);
 ?>
