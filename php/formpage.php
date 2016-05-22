<?php
  require_once("../header.php");
?>
   <div class="another"></div>
	<div class="top" >
        <div class="head" style="margin-top: 38px;">委托检验列表</div>
    </div>
    <table class="table" style="margin-bottom:0px;">
     <thead>
     	<th>序号</th>
     	<th>委托编号</th>
     	<th>委托单位</th>
     	<th>申请时间</th>
     	<th>委托单状态</th>
     	<th>操作</th>
     </thead>
     <tbody>
     	<tr>
     		
     	</tr>
     </tbody>
    </table>




<?php

 /*1.传入页码*/

 $page=$_GET['p'];
 /*2.根据页码取出数据*/
 $pagesize=3;
 $showpages=5;
 $localhost='127.0.0.1';
 $username='root';
 $password='130320';
 $database='coal';
 $conn=mysqli_connect($localhost,$username,$password,$database)or die('连接失败');
 if(!$conn){
      echo "数据库连接失败";
      exit;
  }   
    $offset = ($page-1)*$pagesize;
    $sql="select * from checkform limit $offset,$pagesize";
    //echo $sql;
    $result=mysqli_query($conn,$sql);
    //var_dump($result);
    //echo "<div class='another'>";
    echo '<table class="table from_table">';
    while ($row=mysqli_fetch_assoc($result)) {
         echo "<tr>";
         $id=$row['formid'];
         echo "<td style='width:109px; height:50px;'>{$row['formid']}</td>";
         //echo $row['created'];
         //echo gettype((int)$row['created']);
         //echo mktime(0, 0, 0, 7, 1, 2000);
         //echo date("Ymd",strtotime($row['created']));
         //$form_page_id=date("mdY",strtotime($row['created']))."".sprintf("%06d",$row['formid']);
         //var_dump($form_page_id);
         //echo $form_page_id;
         echo "<td style='width:181px; height:50px;'>".date("mdY",strtotime($row['created']))."".sprintf("%06d",$row['formid'])."</td>";
         echo "<td style='width:187px; height:50px;'>{$row['applycompany']}</td>";
         echo "<td style='width:181px; height:50px;'>{$row['applytime']}</td>";
         echo "<td style='width:181px; height:50px;'>{$row['saveorputup']}</td>";
         echo "<td>".($row['saveorputup']=="委托单保存"?"<a href='/xiangmu/check.php?id=$id' style='text-decoration:none;'>编辑&审核</a>":"<a href='/xiangmu/view.php?id=$id' style='text-decoration:none;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;查看</a>")."</td>";
    	 echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    //获取数据总数
    $total_sql="select * from checkform";
    $total_sql_result=mysqli_query($conn,$total_sql);
    
    //var_dump($total_sql_result);
    $total_result= $total_sql_result->num_rows;
    //echo $total_result;
    //$total=$total_result[0];
    $total_pages=ceil($total_result/$pagesize);
    mysqli_close($conn);
     /*显示数据加分页条*/
     $page_banner="<div class='page'>";
     //计算偏移量$page_offset
     $page_offset=($showpages-1)/2;
     $start=1;
     $end=$total_pages;
     
     if ($page>1) {
     	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
     	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>";
     }else{
     	$page_banner.="<span class='disable'>首页</span>";
     	$page_banner.="<span class='disable'>上一页</span>";
     }

     if ($total_pages>$showpages) {
     	if ($page>$page_offset+1) {
     		$page_banner.="...";
     	}
     	if ($page>$page_offset) {
     		$start=$page-$page_offset;
     		$end=$total_pages>$page+$page_offset?$page+$page_offset:$total_pages;
     	}else{
     		$start=1;
     		$end=$total_pages>$showpages?$showpages:$total_pages;
     	}
        if ($page+$page_offset>$total_pages) {
        	$start=$start-($page+$page_offset-$end);
        }
     }
     for ($i=$start; $i < $end+1; $i++) {
        if ($page==$i) {
         	$page_banner.="<span class='current'>{$i}</span>";
         } else{
     	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
         }
      }
     //尾部省略
     if ($total_pages>$showpages&&$total_pages>$page+$page_offset) {
     	$page_banner.="...";
     }
    if ($page<$total_pages) {
    	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."' aria-label='Next'> <span aria-hidden='true'>&raquo;</span></a>";
    	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
    }else{
    	$page_banner.="<span class='disable'>下一页</span>";
    	$page_banner.="<span class='disable'>尾页</span>";
    }
    
    $page_banner.="共{$total_pages}页";
    $page_banner.="<form action='formpage.php' method='get'>";
    $page_banner.="&nbsp;&nbsp;&nbsp;&nbsp;到第<input id='inputpage' type='text' name='p' size='3' style='border-radius:3px;border-style: none;border:1px solid black;' >页";
    $page_banner.="<div id='turnto' class='btn btn-primary'>跳转</div>";
    $page_banner.="</form></div>";
    echo $page_banner;
    
?>
</div>
<script type="text/javascript">
    $(function(){
           $(document).keypress(function(e) {  
                // 回车键事件  
           if(e.which == 13) {  
                 return false;
            }  
           }); 
        //var _totalpage=<?php echo $total_pages;?>;
            //console.log(_totalpage);
        $(".page #turnto").on("click",function(){
            var _page=document.getElementById('inputpage').value;
            //console.log(_page);
            var _totalpage=<?php echo $total_pages;?>;
            //console.log(_totalpage);
            if (_page>_totalpage||_page<1) {
                alert('不存在的页数！');
            }else{
                $("form").submit();
            }
        });
    });
</script>
<div class="footer">
        <div class="footer_intro">design by zzh.</div>
  </div>

</body>
</html>