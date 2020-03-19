<?php /* STYLE/DEFAULT $Id: login.php 6050 2010-10-14 21:43:56Z ajdonnison $ */
if (!defined('DP_BASE_DIR')) { die('You should not access this file directly'); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $dPconfig['page_title'];?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo isset($locale_char_set) ? $locale_char_set : 'UTF-8';?>" />
    <title><?php echo $dPconfig['company_name'];?> :: dotProject Login</title>
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="Version" content="<?php echo @$AppUI->getVersion();?>" />
	<link rel="stylesheet" type="text/css" href="./style/<?php echo $uistyle;?>/login.css" media="all" />
	<style type="text/css" media="all">@import "./style/<?php echo $uistyle;?>/login.css";</style>
	<link rel="shortcut icon" href="./style/<?php echo $uistyle;?>/images/favicon.ico" type="image/ico" />
</head>
<body style="background-color: #E6E9EA" onload="document.loginform.username.focus();">
<br /><br /><br /><br />
<?php //please leave action argument empty ?>
<!--form action="./index.php" method="post" name="loginform"-->
<form method="post" action="<?php echo $loginFromPage; ?>" name="loginform">
<input type="hidden" name="login" value="<?php echo time();?>" />
<input type="hidden" name="lostpass" value="0" />
<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />

	<table class="std" align="center" border="0" cellpadding="3" cellspacing="0" width="300">
		<tr><th colspan="3"><em><?php echo $AppUI->_('Autorization');?></em></th></tr>
		<tr><td></br></td>
		<tr>
			<td align="right" width="40" nowrap><a href=''><img src="./images/icons/user.png" border="0" width="24" height="24"  alt="" /></a></td>
			<td align="left" nowrap><?php echo $AppUI->_('Login');?>:</td>			
			<td align="left" colspan="2" nowrap><input type="text" size="25" maxlength="128" name="username" class="text" /></td>
		</tr>
		
		<tr>
			<td align="right" width="40" nowrap><a href=''><img src="./images/icons/lock.png" border="0" width="24" height="24" alt="" /></a></td>
			<td align="left" nowrap><?php echo $AppUI->_('Password');?>:</td>
			<td align="left"  colspan="2" nowrap><input type="password" size="25" maxlength="64" name="password" class="text" /></td>
		</tr>
		<tr>
			<td colspan="3">
				<br>
			</td>
		</tr>
		<tr>
			<td align="center" valign="middle" colspan="3" nowrap>
				<input type="submit" name="login" value="<?php echo $AppUI->_('login');?>" class="button" />
			</td>
		</tr>
		<tr>
			<br></br>
		</tr>
		<tr>
			<td align="center" valign="bottom" colspan="3" nowrap>
				<?php if (@$AppUI->getVersion()) { ?>
					v.<?php echo @$AppUI->getVersion();?>
				<?php } ?>
			</td>
		</tr>
	</table>

	<?php /*
	<?php if (@$AppUI->getVersion()) { ?>
	<div align="center"> 
		<span style="font-size:7pt">версия <?php echo @$AppUI->getVersion();?> 	</span>
	</div>
	<?php } ?>
	*/
	?>
</form>

<table width="450" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td align="center" width="100">
			<?php /*
			<a href=''><img src="style/<?php echo $uistyle;?>/images/login14.gif" border="0" alt="" /></a>
							*/ ?>
		</td> 
		<td align="center" width="250">
			<br></br>
		</td> 
		<td align="center" width="100" >
			<?php /*
			<a href=''><img src="style/<?php echo $uistyle;?>/images/sobaka.gif" border="0" alt="" /></a>
			*/ ?>
		</td> 
	
	</tr>
	<tr>
		<td align="center" >
			<br></br>
		</td> 
		<td align="center" >
			<a href=''><img src="style/<?php echo $uistyle;?>/images/login.gif" border="0" alt="" /></a>
		</td> 
		<td align="center" >
			<br></br>
		</td> 
	</tr>
	<tr>
		<td align="center" >
			<br></br>
		</td> 
		<td align="center" >
			<br></br>
		</td> 
		<td align="center"width="100">
<?php /*
			<a href=''<?php if ($dialog) echo "target='_blank'"; ?>><img src="style/<?php echo $uistyle;?>/images/login12.gif" border="0" alt="" /></a>
			*/ ?>
		</td> 
	</tr>

</table>

</body>
</html>
