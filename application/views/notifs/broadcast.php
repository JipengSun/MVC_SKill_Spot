<?php
SESSION_START();
include "isLogin.php";
include "dbconn.php";
include "sql.php";
$sql = new sql();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Broadcast Menu</title>
</head>
<body>
	<h2>Simple Broadcast Message Menu</h2>
	<a href="index">Home</a> |	<a href="logout">Logout</a>
	<hr>
	<form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>Message</td>
				<td><textarea name="msg" cols="50" rows="4"></textarea></td>
			</tr>
			<tr>
				<td>Broadcast time</td>
				<td><select name="time"><option>Now</option></select>	</td>
			</tr>
			<tr>
				<td>Loop</td>
				<td><select name="loops">
					<?php 
					for ($i=1; $i<=5 ; $i++) { 
						?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php
					}
					?>
				</select> time</td>
			</tr>
			<tr>
				<td>Loop Every</td>
				<td><select name="loop_every">
					<?php 
					for ($i=1; $i<=60 ; $i++) { 
						?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php
					}
					?>
				</select> Minute</td>
			</tr>
			<tr>
				<td>For</td>
				<td><select name="user">
					<?php
                    $user = $sql->listUser();
					foreach ($user[1] as $key) {
						?>
						<option value="<?php echo $key['username'] ?>"><?php echo $key['username'] ?></option>
						<?php
					}
					?>
				</select></td>
			</tr>
			<tr><td colspan=2><hr></td></tr>
			<tr>
				<td><button name="submit" type="submit">Broadcast </button></td>
			</tr>
		</table>
	</form>
	<?php 
	if (isset($_POST['submit'])) {
		if(isset($_POST['msg']) and isset($_POST['time']) and isset($_POST['loops']) and isset($_POST['loop_every']) and isset($_POST['user']))
		{
			$msg = $_POST['msg'];
			$time = date('Y-m-d H:i:s');
			$loop= $_POST['loops'];
			$loop_every=$_POST['loop_every'];
			$user = $_POST['user'];
			/*save Notification*/
			$save = $sql->saveNotif($msg,$time,$loop,$loop_every,$user);
			if($save[0] == true)
			{
				echo '* save new notification success';
			}else{
				echo 'error save data : '.$save[1];
			}

		}else{
			echo '* completed the parameter above';
		}
	}	
	?>
	<br>
	<table border=1>
		<thead>
			<tr>
				<td>No</td>
				<td>Next Schedule</td>
				<td>Message</td>
				<td>Remains</td>
				<td>User</td>
			</tr>
		</thead> 
		<tbody>
			<?php 
			$a =1;
			$list = $sql->listNotif();
			foreach ($list[1] as $key) {
				?>
				<tr>
					<td><?php echo $a ?></td>
					<td><?php echo $key['notif_time'] ?></td>
					<td><?php echo $key['notif_msg'] ?></td>
					<td><?php echo $key['notif_loop']; ?></td>
					<td><?php echo $key['username'] ?></td>
				</tr>
				<?php 
				$a++;
			}
			?>
		</tbody>
	</table>
</body>
</html>