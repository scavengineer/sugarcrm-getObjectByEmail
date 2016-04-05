function GetObjectByEmail( $session_id, $url, $ModuleName, $email_address) {
//  NOTICE:  Returns an array of contacts or an empty array on no match //
   $search_by_module_parameters = array(
	    'session' => $session_id,
	    'search_string' => $email_address,
	    'modules' => array ( $ModuleName, ),
	    'offset' => 0,
	    'max_results' => 3,
	    'assigned_user_id' => '',
	    'select_fields' => array ( 'id' ),
	    'unified_search_only' => false,
         'Favorites' => false,
    );
    
    $search_by_module_result = call('search_by_module', $search_by_module_parameters, $url);
    $egels=objectToArray($search_by_module_result);

    $CR = array();
    foreach ($egels['entry_list'] as $K => $E ) {
     if ( $DEBUG > 0 ) print "record $K: ".print_r($E, true)."\n";
   $get_entry_list_parameters = array(
         'session' => $session_id,
         'module_name' => $ModuleName,
         'query' => strtolower( $ModuleName ).".id='".$E['records'][0]['id']['value']."'",
         'order_by' => "",
         'offset' => "0",
         'select_fields' => '',
         'max_results' => 1,
         'deleted' => 0,
         'Favorites' => false,
    );

    $get_entry_list_result = call('get_entry_list', $get_entry_list_parameters, $url);
    $gels=objectToArray($get_entry_list_result);
    $CR[] =  $gels;

return $CR;
}
}
