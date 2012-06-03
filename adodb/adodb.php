<?php

$dbname="test.db";
$ds="Provider=microsoft.jet.oledb.4.0;data source=$dbname";

if(!file_exists($dbname)){
 $catalog = new com("ADOX.Catalog");
 $catalog->create($ds);
}
$db = new com("adodb.connection");
$db->open($ds);

$tablename ='test';
$name ='name';
try{
$db->execute("create table $tablename (id AUTOINCREMENT,$name  text)");
}catch(exception $e){}

$db->execute("insert into $tablename ($name ) values(".time().")");

$rs = new com("adodb.recordset");

$rs->open("select * from $tablename  order by id desc",$db,1,1);
//$rs->Pagesize=10;
$rs->absolutepage=1;

for($i=1;$i<=$rs->pagesize;$i++){
    if($rs->EOF){
      break;
    }  
   echo($rs["id"].":".$rs[$name]."\n");
   $rs->movenext();
}