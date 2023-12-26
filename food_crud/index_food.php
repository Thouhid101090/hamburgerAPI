<?php
include '../connection.php';
$data = [];


$sql = 'SELECT menu.*, category.c_name, CONCAT("http://localhost/hamburger/",image) as image FROM `menu`
join category on category.id=menu.category_id order by menu.id DESC';
$result=$db->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_object()){
		$data[]= $row;
	}
	echo json_encode(array("status" => 1,"data"=>$data));
}else{
	echo json_encode(array("status" => 0,"data"=>""));
}
	
