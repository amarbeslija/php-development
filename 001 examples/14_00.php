<?php  
function option($places,$selection) {  
echo "<select>";  
foreach($places as $state => $city) {  
echo "<option ";  
if ($city==$selection)   
echo "selected=\"selected\"";  
echo "value=\"". $city ."\">";  
echo $state . "</option>";  
}  
echo "</select>";  
}  
?> 

<?php
$places=array("serbia"=>"belgrade","france"=>"paris","england"=>"london","spain"=>"madrid","germany"=>"berlin");  
option($places,"madrid"); 