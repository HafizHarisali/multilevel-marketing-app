<?php
function get_left_tree($parent){
	$query = \DB::table('users')
			->select('id','name','parent')
			->where('parent',$parent)
			->get();
	foreach ($query as $row) {
		$sub_query[] = \DB::table('users')
				->select('id','name','parent')
				->where('parent',$row->id)
				->get();
	}
	echo json_encode($sub_query);
	die;
}


?>