<?php
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
    include('class/connect.php');
    $db = new db();
    // never trust what user wrote! We must ALWAYS sanitize user input
    $utype = mysql_real_escape_string($_POST['search']);
    $utype = htmlentities($utype);
    // build your search query to the database
   // $sql = "SELECT * FROM tb_user WHERE u_name LIKE '%" . $word . "%'  ORDER BY u_id LIMIT 10";
    $sql = "SELECT * FROM staff WHERE staffType = '".$utype."'  ";
    // get results
    $row = $db->select_list($sql);
    if(count($row)) {
        $end_result = '';
        foreach($row as $r) {
            $result_id        = $r['staffID'];
            $result_name       = $r['staffName'];
            $result_email       = $r['staffEmail'];
            // we will use this to bold the search word in result
            $bold           = '<span class="found">' . $utype . '</span>'; 

            $end_result     .= '<td>' . str_ireplace($utype, $bold, $result_id) . '</td><td>' . str_ireplace($utype, $bold, $result_name) .'</td><td>' . str_ireplace($utype, $bold, $result_email) .  '</td>';            
        }
        echo $end_result;
    } else {
        echo '<li>No results found</li>';
    }
}
?>