# sugarcrm-getObjectByEmail
a php method to find Leads, Contacts, Users or any other "person" class searching only by the person's email address

Called like this:


    //login --------------------------------------------

    $login_parameters = array(
         "user_auth"=>array(
              "user_name"=>$username,
              "password"=>md5($password),
              "version"=>"1"
         ),
         "application_name"=>"fin lead by email",
         "name_value_list"=>array(),
    );

    $login_result = call("login", $login_parameters, $url);

    //get session id
    $session_id = $login_result->id;

$Contacts = GetObjectByEmail( $session_id, $url, 'Leads', 'scavengineer@gmail.com');
$results = $Contacts[0]["result_count"];
print "Returned $results leads\n";
if ( $results > 0 )
 var_dump($Contacts);
 
 
 This works for Contacts, Leads, Users or any other "person" type object.
