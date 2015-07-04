<!DOCTYPE html>
<html>
<head>
	<title>添加结果</title>
</head>
<body>
<?php

require_once("alter.php");
        echo '<meta charset="utf-8">';
        //print_r($_POST);
		$ApplyCompany=$_POST['apply_company'];
		$CompanyAbbreviation=$_POST['abbreviation'];
		$CustomerRemark=$_POST['customer_remark'];
		$ApplyTime=$_POST['apply_time'];
		$Target=$_POST['target'];
		$CoalType=$_POST['coal_type'];
		$Hurry=$_POST['hurry'];
		$CheckType=$_POST['check_type'];
		$SaveOrPutup=$_POST['save_or_putup'];
		//print_r($Target);
		//echo "$CheckType";
if ($ApplyCompany=="") {
	Alter("请输入公司");
}else{


		$local='127.0.0.1';
		$username='root';
		$password='130320';
		$database='coal';

		$conn=mysqli_connect($local,$username,$password,$database)or die('Error to connect');
		
		$sql="insert into checkform(applycompany,companyabbreviation,customerremark,applytime,saveorputup)values('$ApplyCompany','$CompanyAbbreviation','$CustomerRemark','$ApplyTime','$SaveOrPutup')";
		$result=mysqli_query($conn,$sql);
		
		
		

		$ArrNumber='0';
		foreach ($Target as $Targers) {

		    $ArrNumber=$ArrNumber+1;
		}
		
		//echo "$ArrNumber";
		for ($i=0; $i < $ArrNumber ; $i++) { 
			//echo "$Target[$i]";
			$sql1="insert into coallocation(applycompany,target,coaltype,hurry,checktype)values('$ApplyCompany','$Target[$i]','$CoalType[$i]','$Hurry[$i]','$CheckType[$i]')";
		    $result=mysqli_query($conn,$sql1);
		}
       

	    /* foreach ($Target as $Targers) {
             $sql1="insert into coallocation(applycompany,target,coaltype)values('$ApplyCompany','$Targers','$CoalTypes')";
             $result=mysqli_query($conn,$sql1);
        }
       foreach ($CoalType as $CoalTypes) {
        	$sql2="insert into coallocation(applycompany,coaltype)values('$ApplyCompany','$CoalTypes')";
            $result=mysqli_query($conn,$sql2);
        }
        foreach ($Hurry as $Hurrys) {
        	$sql3="insert into coallocation(applycompany,hurry)values('$ApplyCompany','$Hurrys')";
            $result=mysqli_query($conn,$sql3);
        }
        foreach ($CheckType as $CheckTypes) {
        	$sql4="insert into coallocation(applycompany,checktype)values('$ApplyCompany','$CheckTypes')";
            $result=mysqli_query($conn,$sql4);
        }*/
		mysqli_close($conn);
		echo "添加成功";
}
?>
</body>
</html>
