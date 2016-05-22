<?php
  require_once("/header.php");
?>
<div class="main">
<div class="top">
	<div class="head" style="margin-top:38px;">设备信息编辑</div>
</div>
<form action="php/savedevice.php" method="post">
	<table class="table">
		<tr>
			<td>设备名称</td>
			<td><input class="form-control" name="deviceName"></td>
			<td>设备型号</td>
			<td><input class="form-control" name="deviceModel"></td>
		</tr>
		<tr>
			<td>出厂编号</td>
			<td><input class="form-control" name="factoryNumber"></td>
			<td>本室编号</td>
			<td><input class="form-control" name="roomNumber"></td>
		</tr>
		<tr>
			<td>安装地点</td>
			<td><input class="form-control" name="installPlace"></td>
			<td>系统对接</td>
			<td><input class="form-control" name="systemIntergrating"></td>
		</tr>
	</table>
	<div class="foot" style="text-align:center;">
		<input type="submit" class="btn btn-primary" value="保存">
		<span class="btn btn-danger"><a href="system.php" style="text-decoration:none;color:white;">关闭</a></span>
	</div>
</form>
</div>
<div class="footer">
        <div class="footer_intro">design by zzh.</div>
  </div>
</body>
</html>