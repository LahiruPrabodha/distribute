<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>white rabbit</title>

 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
 
$(function() {
 
    $(".search_button").click(function() {
        // getting the value that user typed
        var searchString    = $("#usertype").val();
        // forming the queryString
        var data            = 'search='+ searchString;
         
        // if searchString is not empty
        if(searchString) {
            // ajax call
            $.ajax({
                type: "POST",
                url: "do_search.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $("#results").html(''); 
                    $("#searchresults").show();
                    $(".utype").html(searchString);
               },
               success: function(html){ // this happens after we get results
                    $("#results").show();
                    $("#results").append(html);
              }
            });    
        }
        return false;
    });
});
</script>
 
 <style type="text/css">
 body{ font-family:Arial, Helvetica, sans-serif; }
*{ margin:0;padding:0; }
#container { margin: 0 auto; width: 600px; }
ul.update { list-style:none;font-size:1.1em; margin-top:10px }
ul.update li{ height:30px; border-bottom:#dedede solid 1px; text-align:left;}
ul.update li:first-child{ border-top:#dedede solid 1px; height:30px; text-align:left; }
#flash { margin-top:20px; text-align:left; }
#searchresults { text-align:left; margin-top:20px; display:none; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; }
.word { font-weight:bold; color:#000000; }
#search_box { padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
.search_button { border:#000000 solid 1px; padding: 6px; color:#000; font-weight:bold; font-size:16px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }

h2 { margin-right: 70px; }
 </style>

</head>
<body>
<div id="container">
<div style="margin:20px auto; text-align: center;">
<legend>User List</legend>

<form method="post" action="do_search.php">
    
    

        <select id="usertype" name="usertype" class="form-control col-xs-3">
          <option value="adm">Admin List</option>
          <option value="mng">Manager List</option>
          
        </select>

        

    <input type="submit" value="Search" class="search_button" /><br />
</form>
</div>      
<div>
 
<table width="80%" class="table table-bordred table-striped" >
<thead>
<th> ID</th>
<th>Name</th>
<th>E-mail</th>
</thead>
<tr id="results" class="update">
</tr>
 </table>

</div>
</div>
   
</body>
</html>