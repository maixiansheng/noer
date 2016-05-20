<?php 
	function showState($stateId){

		switch ($stateId) {
			case '1':
				return '注册未激活';
				
			
			case '2':
				return '已激活状态';
				break;
		}
	}



 ?>