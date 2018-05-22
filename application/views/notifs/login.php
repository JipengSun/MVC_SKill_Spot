<?php
SESSION_START();
if(isset($_SESSION['username']))
{
	header('Location: index');
}
include "dbconn.php";
include "sql.php";
$sql = new sql();
$user = $sql->listUser();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login Application</h2>
	<form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td colspan=2><hr></td>
			</tr>
			<tr>
				<td><button type="submit" name="submit">Login</button></td>
			</tr>
		</table>
	</form>
	<?php 
	if(isset($_POST['submit'])){
		if(isset($_POST['username']) and isset($_POST['pass']))
		{
			/*check login*/
			$check = $sql->getLogin($_POST['username'],$_POST['pass']);
			if($check[2] == 1)
			{
				$_SESSION['username'] = $_POST['username'];
				header('Location: index');
			}else
			{
				echo '* username or password not valid';
			}
		}
	}
	?>
	<h2>How To Make Web Push Notifications in PHP, JQuery , AJAX And Mysql</h2>
	<h3>http://seegatesite.com</h3>
	<h4>admin user : admin , password : 123</h4>
	<h5>user : ronaldo , password : 123</h5>
	<h5>user : donald , password : 123</h5>

</body>
</html>