<?php
use App\Models\Categories;
$Categories=Categories::where("parent_id",'0')->orderBy('name', 'ASC')->get();

?>	
