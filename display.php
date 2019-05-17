<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
.pagination a.active {
  font-size: 25px;
  color: black;
}

.pagination a:hover:not(.active) {font-size: 15px;}
</style>
<script type="text/javascript">
  function createanchor(i)
{ 
  var page = document.createElement("A");            
  var node =document.createTextNode("i");        
  page.appendChild(node);
}
</script>

</head>
<body>
  <div class="pagination">
          
     </div>
</body>
</html>
<?php
include('dbconnect.php');
$sql="SELECT pname,pcost,pimage from tbl_products";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$pages=ceil($rowcount/5);
for ($i=1; $i <=$rowcount ; $i++) { 
    
    


}


?>