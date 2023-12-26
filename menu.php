<?php
include 'connection.php';
$menus = [];

$sql = 'SELECT menu.*,category.c_name,CONCAT("http://localhost/hamburger/",image) as image FROM `menu` 
INNER JOIN category ON menu.category_id = category.id';

$result=$db->query($sql);
while($row = $result->fetch_assoc()){
	$menus[]= $row;
}
	echo json_encode($menus);




