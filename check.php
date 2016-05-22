<?php
   require_once("/header.php");
?>

<?php
  $formid=$_GET['id'];
  //echo $formid;
  $local='127.0.0.1';
  $username='root';
  $password='13032011';
  $database='coal';
  $conn=mysqli_connect($local,$username,$password,$database)or die('连接失败');
  $sql="select * from checkform where formid=$formid";
  //echo $sql;
  $result=mysqli_query($conn,$sql);
  //var_dump($result)
  $row=mysqli_fetch_assoc($result);
  $ApplyCompany=$row['applycompany'];
  $CompanyAbbreviation=$row['companyabbreviation'];
  $Custmoerremark=$row['customerremark'];
  $ApplyTime=$row['applytime'];
 //mysqli_close($conn);
  //echo $ApplyCompany,$CompanyAbbreviation,$Custmoerremark,$ApplyCompany;
?>
<div class="main" id="show">
  <div class="top" >
        <div class="head"> 报检信息</div>
    </div>
  <form method="post" action="php/secondsave.php">
    <div class="table_top">
        <table class="table">
            <tr>
                <td><span class="red">*</span>委托单位</td>
                <td>
                    <select class="form-control apply_company" id="apply_company" name="apply_company">
                        <option disabled="disabled">-请选择公司-</option>
                        <option data-short="神华"  value="神华销售集团有限公司">神华销售集团有限公司</option>
                        <option data-short="华能"  value="华能国际电力燃料有限公司">华能国际电力燃料有限公司</option>
                        <option data-short="大唐"  value="大唐电力燃料有限公司">大唐电力燃料有限公司</option>
                        <option data-short="名华"  value="内蒙古名华能源集团有限公司">内蒙古名华能源集团有限公司</option>
                        <option data-short="国电"  value="中国国电集团">中国国电集团</option>
                        <option data-short="山煤"  value="山煤国际能源集团有限公司">山煤国际能源集团有限公司</option>
                    </select>
               </td>
                <td>简称</td>
                <td><input name="abbreviation" value="<?php echo $CompanyAbbreviation; ?>" class="abbreviation form-control" type="text" readonly="readonly" name="short_name"></td>
            </tr>
            <tr>
                <td>客户备注</td>
                <td><input type="text" name="customer_remark" class="form-control" value="<?php echo $Custmoerremark; ?>"></td>
                <td>申请时间</td>
                <td><input type="text" value="<?php echo $ApplyTime; ?>" name="apply_time" class="span2 form-control"  id="dp1" readonly="readonly" placeholder="点击选择时间" ><!--value="点击选择时间" onfocus="if (value =='点击选择时间'){value =''}" onblur="if (value ==''){value='点击选择时间'}"-->
                </td>
            </tr>
        </table>

    </div>
    
    <div class="head_middle">
       <div class="head_middle">批煤位置描述</div>
    </div>

    <div class="main_middle" style="position: relative;">
        <table class="table" id="table">
            <tr>
                <td><span class="glyphicon glyphicon-plus"></td>
                <td>垛位</td>
                <td>煤种</td>
                <td>是否加急</td>
                <td>检验类别</td>
            </tr>
<?php
     $coallocation_sql="select * from coallocation where formid=$formid";
     //echo $coallocation_sql;
     $coal_result=mysqli_query($conn,$coallocation_sql);
     //var_dump($coal_result);
    
     while ($coal=mysqli_fetch_assoc($coal_result)) {
                         //echo $coal['target'];
                         //echo $coal['coaltype'];
                         //echo $coal['hurry'];
                         //echo $coal['checktype'];
                     
             
            echo "<tr>";
            echo "<td><span class='glyphicon glyphicon-minus'></td>";
            echo "<td><input name='target[]' type='text' class='form-control' value='".$coal['target']."'></td>";
            echo "<td><input name='coal_type[]'' type='text' class='form-control' value='".$coal['coaltype']."'></td>";
            echo "<td>".($coal['hurry']==1?"<input value='1' name='hurry[]'' type='checkbox' checked='checked'>":"<input value='1' name='hurry[]'' type='checkbox'>")."</td>";
            echo "<td>";
            echo "<input value='".$coal['checktype']."' class='check_type_input form-control' name='check_type[]'' type='text' readonly='readonly' placeholder='点击添加检验类别''>
                    <div class='check_area'>
                        <input type='checkbox' name='category' value='Mt' />
                        全水分
                         <input type='checkbox' name='category' value='St' />
                        全硫&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type='checkbox' name='category' value='Mad' />
                        水分
                        <br />
                        <input type='checkbox' name='category' value='C' />
                        固定碳
                        <input type='checkbox' name='category' value='Aad' />
                        灰分&nbsp;&nbsp;&nbsp;&nbsp;
                         <input type='checkbox' name='category' value='H' />
                        氢
                        <br />
                        <input type='checkbox' name='category' value='Vad' />
                        挥发分
                         <input type='checkbox' name='category' value='Qb' />
                        发热量
                        <input type='checkbox' name='category' value='CB' />
                        焦渣特性
                        <br />
                        <div class='btn btn-primary confirm'>确定</div>
                        <div class='btn btn-danger cancel'>取消</div>
            
                    </div>
                </td>
            </tr>";
       } 
?>
        </table>

        
    </div>

    <textarea id="tr_template" style="display: none;">
        <tr>
            <td><span class="glyphicon glyphicon-minus"></td>
            <td><input name="target[]" type="text" class="form-control"></td>
            <td><input name="coal_type[]" type="text" class="form-control"></td>
            <td><input name="hurry[]" value="1" type="checkbox"></td>
            <td>
                <input class="check_type_input form-control" name="check_type[]" type="text" readonly="readonly" placeholder="点击添加检验类别"><!--value="点击添加检验类别" onfocus="if (value =='点击添加检验类别'){value =''}" onblur="if (value ==''){value='点击添加检验类别'}"-->
                <div class="check_area" style="display: none; position: absolute; width: 280px; right: 95px; bottom: 0; background-color: #ccc; padding: 10px;">
                    <input type="checkbox" name="category" value="Mt" />
                        全水分
                         <input type="checkbox" name="category" value="St" />
                        全硫&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="category" value="Mad" />
                        水分
                        <br />
                        <input type="checkbox" name="category" value="C" />
                        固定碳
                        <input type="checkbox" name="category" value="Aad" />
                        灰分&nbsp;&nbsp;&nbsp;
                         <input type="checkbox" name="category" value="H" />
                        氢
                        <br />
                        <input type="checkbox" name="category" value="Vad" />
                        挥发分
                         <input type="checkbox" name="category" value="Qb" />
                        发热量
                        <input type="checkbox" name="category" value="CB" />
                        焦渣特性
                        <br />
                    <div class="btn btn-primary confirm">确定</div>
                    <div class="btn btn-danger cancel">取消</div>
        
                </div>
            </td>
        </tr>
    </textarea>

    <div class="save_or_putup">
    	<input type="text" name="save_or_putup" value="保存">

    </div>
    <div class="get_form_id" style="display:none;">
        <input type="text" name="formid" value="<?php echo $formid; ?>">
    </div>

    <div class="footer_confirm">
        <!--<div class="btn btn-primary footer_confirm" >保存</div>-->
        <div class="btn btn-primary footer_confirm_putup" >提交</div>
        <div class="btn btn-danger footer_close"><a href="javascript:history.go(-1);"style="color:white;text-decoration:none;">关闭</a></div>
    </div>
  </form>  
  <div class="footer">
        <div class="footer_intro">design by zzh.</div>
  </div>
</div>
<script type="text/javascript">

    $(function(){

    	$(".footer_confirm .footer_confirm").on("click",function(){
            $(".save_or_putup input").val("委托单保存");
            $("form").submit();
    	});
    	$(".footer_confirm .footer_confirm_putup").on("click",function(){
            $(".save_or_putup input").val("委托单提交");
            $("form").submit();
    	});
        //选择公司，自动出来简称
        $("select").on("change",function(){
            console.log($("select option:selected").data("short"));
            $(".abbreviation").val($("select option:selected").data("short"));
        });
        //日历
        $("#dp1").datepicker();
        //添加减少一行
        $(".glyphicon-plus").on("click",function(){
            var tr_element = $("#tr_template").val();
            $("#table tbody").append(tr_element);
        });
      
        $("#table").delegate("td .glyphicon-minus","click",function(){
            $(this).closest("tr").remove();
        });
        //添加检验类别
        $(".main").delegate(".main_middle .confirm", "click", function(){            
            var val_arr = [];
            var _this = $(this);
            var _parent = _this.closest(".check_area");
            _parent.find('input[type="checkbox"]:checked').each(function(index, element){
                val_arr.push( $(element).val() );
            });
            _parent.parent().find(".check_type_input").val( val_arr.join(',') );
            _parent.css("display", "none");
        });
        //单击关闭关闭选择窗口
        $(".main").delegate(".main_middle table .check_area .cancel", "click", function(){
            console.log("cancel");
            $(this).closest(".check_area").css("display", "none");
        });
        //单击输入框显示选择类别的窗口
        $(".main").delegate(".check_type_input", "click", function(){
            $(this).parent().find(".check_area").css("display", "block");
        });        
         //$("div.footer_close").on("click",function(){
            //$("#show").load("welcome.html");
        //});
        //var _company="<?php echo $ApplyCompany; ?>";
        //console.log(company);
        $("#show .table_top .table .apply_company option[value=<?php echo $ApplyCompany; ?>]").attr("selected",true);
        //$("#apply_company option[value='大唐电力燃料有限公司']").attr("selected",true);
        //$("#apply_company option:contains("大唐电力燃料有限公司")").each(function(){
        	//if ($(this).text()=='大唐电力燃料有限公司') {
        		//$(this).attr("selected",true);
        	//};
        //});
    });
  </script>
<?php
mysqli_close($conn);
?>
</body>
</html>