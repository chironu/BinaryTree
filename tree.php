<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BinaryTree</title>
	<?
if(!$_POST[prefix]) $prefix="251-*32*+97/-";
if($_POST[prefix]) $prefix=$_POST[prefix];

	?>
	<br>
	<form name="f_p" action="?" method="POST">

Postfix Input:<input type="text" name="prefix" value="<?=$prefix?>">
		</form>
<?
function calculate_string( $mathString )    {
    $mathString = trim($mathString);     // trim white spaces
    $mathString = ereg_replace ('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
    $compute = create_function("", "return (" . $mathString . ");" );
    return 0 + $compute();
}
 
$ad = array();
$oper1=array("^","*", "/", "+", "-");
$oper="^*/+-";

//$data="12*34*+5*";
//$data="251-*32*+";
//$data="251-*32*+97/-";
$data=$prefix;
//echo "<br>Postfix Input: $data<br>";
$st_op=eregi_replace('[a-zA-Z0-9._]','',$data);
$root_a=strlen($st_op)-1;
for($i=0;$i<=strlen($st_op)-1;$i++)
{
$op1[]=substr($st_op,$i,1);
}

for($i=0;$i<=strlen($st_op)-1;$i++)
{
if($i=="0"){
$n=$root_a;
	$tt0="text: 'Root(".$op1[$n].")'";
}
else{
	$n1=$n-1;
	$n2=$n-2;
if($n1>0)$tt1="{ text: 'Child1(".$op1[$n1].")'}";
if($n2>0)$tt2=", { text: 'Child2(".$op1[$n2].")'}";
$tt_a=$tt1.$tt2;
}
$tt=", nodes:[".$tt_a."]";

$n--;
}

$tt=$tt0.$tt;

$len=strlen($data);
$l=0;
for($i=0;$i<=$len-1;$i++)
{
$dd=substr($data,$i,1);
if(strpos($oper, $dd)=== false){
	//echo $dd."=number <br>";
$ad[$i]=$dd;
}
else{
	//echo $dd."=op <br>";
//echo "->".count($ad);
if(count($ad)>1)
	{

	if(count($ad)==2)
		{
	$value1 = array_pop($ad);
    $value2 = array_pop($ad);
		$av[]="(".$value2.$dd.$value1.")";
	//echo print_r($dv_op)."<br>";
		}
		else
		{
	$value1 = array_pop($ad);
    $value2 = array_pop($ad);
			$dv_op[$l]="(".$value2.$dd.$value1.")";
		}

	}
else 
	{
if(count($ad)==1){
$value1= array_pop($ad);
$av[]="(".$value1.$dd.$dv_op[$l-1].")";
//echo print_r($dv_op)."<br>";
}
else{
if($dv_op[$l-1])$av[]=$dv_op[$l-1];
if($dd)$av[]=$dd;
}
$l++;
}
$l++;
}
//echo "<br>";
}
//echo print_r($av)."<br>";
echo "<hr>";
$av=array_reverse($av);
for($i=count($av)-1;$i>=0;$i--){
if(strlen($av[$i])!="1")
	{
	$value[$i]= array_pop($av);
	}
else{
$dda=$dda.$value[$i+2].$av[$i].$value[$i+1];
array_pop($av);
}
}
//print_r($value);
echo "Prefix Calculate: ".$dda."<br>";
echo "Result: ".calculate_string($dda)."<br>";
?>


        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-treeview.css" rel="stylesheet">

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap-treeview.js"></script>
        <script type="text/javascript">
        $(function(){
            var defaultData = [
              { 
				<?=$tt?>
              }
            ];
            $('#treeview10').treeview({
                color: "#428bca",
                enableLinks: false,
                data: defaultData
            });
          });
          </script>
    </head>
    <body>
        <div id="treeview10" class=""></div>
    </body>
</html>
