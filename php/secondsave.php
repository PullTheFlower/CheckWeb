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
		$formid=$_POST['formid'];
		//print_r($Target);
		//var_dump($Target);
		//echo "$CheckType";
		foreach ($Target as $Targets) {
			if ($Targets=="") {
				$Target_null=1;
			}
		}
		foreach ($CoalType as $CoalTypes) {
			if ($CoalTypes=="") {
				$CoalType_null=1;
			}
		}
		foreach ($CheckType as $CheckTypes) {
			if ($CheckTypes=="") {
				$CheckTypes_null=1;
			}
		}
		//echo $Target_null;
		//echo $CoalType_null;
		//echo $CheckTypes_null;
if ($ApplyCompany==""||$CustomerRemark==""||$ApplyTime==""||$CheckTypes_null==1||$CoalType_null==1||$Target_null==1) {
	Alter("数据输入不完整，请返回继续输入！");
	echo "<a href='/xiangmu/index.php'>返回重新添加</a>";
}else{


		$local='127.0.0.1';
		$username='root';
		$password='130320';
		$database='coal';

		$conn=mysqli_connect($local,$username,$password,$database)or die('Error to connect');
		$delete_sql="delete from checkform where formid=$formid";
		$delete_result=mysqli_query($conn,$delete_sql);
		$delete_sql2="delete from coallocation where formid=$formid";
		$delete_sql2_result=mysqli_query($conn,$delete_sql2);
		
		$sql="insert into checkform(applycompany,companyabbreviation,customerremark,applytime,saveorputup)values('$ApplyCompany','$CompanyAbbreviation','$CustomerRemark','$ApplyTime','$SaveOrPutup')";
		$result=mysqli_query($conn,$sql);
		
		

		$ArrNumber='0';
		foreach($Target as $Targers) {

		    $ArrNumber=$ArrNumber+1;
		}
		$get_formid_sql="select max(formid) from checkform";
		$formid_result=mysqli_query($conn,$get_formid_sql);
		$res=mysqli_fetch_assoc($formid_result);
		foreach ($res as $formid) {
			//echo $key;
		}
		
		//echo $formid;
		//echo $formid;
		//var_dump($formid_result);
		//var_dump($formid);
		//var_dump($res);
		
		//echo "$ArrNumber";
		for ($i=0; $i < $ArrNumber ; $i++) { 
			//echo "$Target[$i]";
			$sql1="insert into coallocation(formid,applycompany,target,coaltype,hurry,checktype)values('$formid','$ApplyCompany','$Target[$i]','$CoalType[$i]','$Hurry[$i]','$CheckType[$i]')";
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
		echo "<a href='/xiangmu/index.php'>返回继续添加</a>";
}
?>
</body>
</html>