<?php /* STYLE/DEFAULT $Id: header.php 6149 2012-01-09 ajdonnison $ */
if (!defined('DP_BASE_DIR')) { die('You should not access this file directly');}
$dialog = (int)dPgetParam($_GET,'dialog',0);
if ($dialog) $page_title = '';
else $page_title = ($dPconfig['page_title'] == 'dotProject') ? $dPconfig['page_title'] . '&nbsp;' . $AppUI->getVersion() : $dPconfig['page_title'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta name="Description" content="dotProject Default Style" />
	<meta name="Version" content="<?php echo @$AppUI->getVersion();?>" />
	<meta http-equiv="Content-Type" content="text/html;charset=<?php echo isset($locale_char_set) ? $locale_char_set : 'UTF-8';?>" />
	<title><?php echo @dPgetConfig('page_title');?></title>
	<link rel="stylesheet" type="text/css" href="./style/<?php echo $uistyle;?>/main.css" media="all" />
	<style type="text/css" media="all">@import "./style/<?php echo $uistyle;?>/main.css";</style>
	<link rel="shortcut icon" href="./style/<?php echo $uistyle; ?>/images/favicon.ico" type="image/ico" />
	<?php @$AppUI->loadJS(); ?>
</head>

<body onload="this.focus();">

<?php /* меню:  пользователя*/ ?>
<?php

$date = dPgetCleanParam($_GET, 'date', $today);
$this_day = new CDate($date);
$df = $AppUI->getPref('SHDATEFORMAT');
$tf = $AppUI->getPref('TIMEFORMAT');
//$link_date = new CDate($row[date]);

//$mds = array('calendar','macroprojects','projects','tasks','projectdesigner','finances','ticketsmith','files','reports','journal','smartsearch');

$mds = array();
$mds1 = array();
$mds2 = array();
?>
<table class="menu1" align="left" border="0" cellspacing="1" cellpadding="1"  width="100%">
	<tr>
		<td>
			<table align="center" border="0" cellspacing="0" cellpadding="0" width="98%">
				<tr>
					<td align="left"width="500" >
						<?php echo $AppUI->_('Welcome'); ?></b>
						&nbsp;
						<b><?php echo $AppUI->user_first_name; ?>
							<?php echo $AppUI->user_last_name; ?>
						</b>
					</td>
					
					<td align="left" width="320">
						&nbsp;Дата:
						<b><?php echo $AppUI->_($this_day->format("%Y-%m-%d")) ?></b>
						&nbsp; ( <?php echo ($AppUI->_($this_day->format('%A')) ); ?> )
						<?php /*
						&nbsp;&nbsp;Время:
						<b>	<?php echo $this_date->format($tf);?></b>
						*/ ?>
					</td>
					<td align="right" nowrap="nowrap"> 
						<?php if (getPermission('calendar', 'access')) {
								$now = new CDate(); ?>              
								· <b><a href="./index.php?m=tasks&amp;a=todo"><?php echo $AppUI->_('Todo');?></a></b> 
								· <b><a href="./index.php?m=calendar&amp;a=day_view&amp;date=<?php echo $now->format(FMT_TIMESTAMP_DATE);?>"><?php echo $AppUI->_('Today');?></a></b> 
								<?php } ?>
								· <a href="./index.php?m=admin&amp;a=viewuser&amp;user_id=<?php echo $AppUI->user_id;?>"><?php echo $AppUI->_('My Info');?></a>
								· <?php echo dPcontextHelp('Help');?> 
								· <a href="?logout=-1"><?php echo $AppUI->_('Logout');?></a>
								·
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table  border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td>
			<table  border="0" cellpadding="1" cellspacing="0" width="100%">
				<tr>
					<th style="background: url(style/<?php echo $uistyle;?>/images/titlegrad.jpg);" class="banner" align="left">
						<strong><?php echo "<a style='color: white' href='{$dPconfig['base_url']}'>$page_title</a>"; ?>
						</strong>

					</th>
					<th align="right" width="50">
						<a href='http://www.dotproject.net/' <?php if ($dialog) echo "target='_blank'"; ?>>
							<img src="style/<?php echo $uistyle;?>/images/dp_icon.gif" border="0" alt="http://dotproject.net/" />
						</a>
					</th>
				</tr>
			</table>
		</td>
	</tr>
	<?php /*
	<tr>
		<td align="left" width="100%">
			<a href=''<?php if ($dialog) echo "target='_blank'"; ?>>
				<img src="style/<?php echo $uistyle;?>/images/color8.gif" border="0" alt="" />
			</a>
		</td> 
	</tr> 
	*/	?>
<?php if (!$dialog) { $nav = $AppUI->getMenuModules(); //  top navigation menu
?> 
</table>

<?php  /* меню: Главное */
?>
<table  border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<table class="menu1" align="left" border="0" cellspacing="2" cellpadding="2"  width="100%">
		<tr>
			<td nowrap="nowrap"><font color="darkgrey"> dP> </font>
			<?php $s='calendar'; 		if (getPermission($s,'access')) { ?> · <a href="./?m=calendar&amp;">		<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>	
			<?php $s='macroprojects'; 	if (getPermission($s,'access')) { ?> · <a href="./?m=macroprojects&amp;">	<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>
			<?php $s='projects'; 		if (getPermission($s,'access')) { ?> · <a href="./?m=projects&amp;">		<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?> 
			<?php $s='tasks'; 			if (getPermission($s,'access')) { ?> · <a href="./?m=tasks&amp;">			<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?> 
			<?php $s='projectdesigner'; if (getPermission($s,'access')) { ?> · <a href="./?m=projectdesigner&amp;">	<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?> 
			<?php $s='finances'; 		if (getPermission($s,'access')) { ?> · <a href="./?m=finances&amp;">		<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>
			<?php $s='ticketsmith';		if (getPermission($s,'access')) { ?> · <a href="./?m=ticketsmith&amp;">		<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?> 			
			<?php $s='files'; 			if (getPermission($s,'access')) { ?> · <a href="./?m=files&amp;">			<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>
			<?php $s='links'; 			if (getPermission($s,'access')) { ?> · <a href="./?m=links&amp;">			<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>
			<?php $s='reports'; 		if (getPermission($s,'access')) { ?> · <a href="./?m=reports&amp;">			<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>
			<?php $s='journal'; 		if (getPermission($s,'access')) { ?> · <a href="./?m=journal&amp;">			<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>				
			<?php $s='smartsearch';		if (getPermission($s,'access')) { ?> · <a href="./?m=smartsearch&amp;">		<?php echo $AppUI->_($s);$mds[]=$s;?></a><?php } ?>
			·
			</td>
			<td nowrap="nowrap" align="right"> 
				<?php if (getPermission('smartsearch', 'access')): ?>
				<form name="frmHeaderSearch" action="?m=smartsearch" method="post">
					<input class="text" type="text" id="keyword1" name="keyword1" value="<?php echo dPgetCleanParam($_POST, 'keyword1', ''); ?>" accesskey="k" />
					<input class="button" type="submit" value="<?php echo $AppUI->_('Search')?>" />
				</form>
				<?php endif; ?>
			</td>
			<td nowrap="nowrap" align="right">
			<form name="frm_new" method="get" action="./index.php">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td>
					<?php
					$newItemPermCheck = array('companies' => 'Company', 'contacts' => 'Contact',  'calendar' => 'Event', 'files' => 'File', 'projects' => 'Project');
					$newItem = array(0=>'- New Item -');
					foreach ($newItemPermCheck as $mod_check => $mod_check_title) {	if (getPermission($mod_check, 'add')) {	$newItem[$mod_check] = $mod_check_title;} }
					echo arraySelect($newItem, 'm', 'style="font-size:10px" onChange="javascript:f=document.frm_new;mod=f.m.options[f.m.selectedIndex].value;if (mod) f.submit();"', '', true);
					echo "        <input type=\"hidden\" name=\"a\" value=\"addedit\" />\n";

					//build URI string
					if (isset($company_id)) { echo '<input type="hidden" name="company_id" value="'.$company_id.'" />';	}
					if (isset($task_id))    { echo '<input type="hidden" name="task_parent" value="'.$task_id.'" />';	}
					if (isset($file_id))    { echo '<input type="hidden" name="file_id" value="'.$file_id.'" />';	}
					?>
					</td>
				</tr>
			</table>
			</form>
			</td>
		</tr>
	</table>

</tr>

<?php  /* меню: Служебное */ 
?>
<tr>
	<table class="menu" align="left" border="0" cellspacing="0" cellpadding="3"  width="100%">
		<tr>
			<td align="left" nowrap="nowrap"><font color="darkgrey"> dP-> </font>
			<?php $s='companies'; 		if (getPermission($s,'access')) { ?> | <a href="./?m=companies&amp;">		<?php echo $AppUI->_('Companies');$mds1[]=$s;?></a><?php } ?> 				
			<?php $s='departments';		if (getPermission($s,'access')) { ?> | <a href="./?m=departments&amp;">		<?php echo $AppUI->_('Departments');$mds1[]=$s;?></a><?php } ?>
			<?php $s='contacts';		if (getPermission($s,'access')) { ?> | <a href="./?m=contacts&amp;">		<?php echo $AppUI->_('Contacts');$mds1[]=$s;?></a><?php } ?> 
			<?php $s='resource_m';		if (getPermission($s,'access')) { ?> | <a href="./?m=resource_m&amp;">		<?php echo $AppUI->_('Resource Management');$mds1[]=$s;?></a> <?php } ?>	
			<?php $s='forums';			if (getPermission($s,'access')) { ?> | <a href="./?m=forums&amp;">			<?php echo $AppUI->_('Forums');$mds1[]=$s;?></a> <?php } ?>				
			|	
			</td>

			<td align="right" nowrap="nowrap">
			<?php $s='system'; 			if (getPermission($s,'access')) { ?> | <a href="./?m=system&amp;">		<?php echo $AppUI->_('System Administration');$mds1[]=$s;?></a><?php } ?>
			<?php $s='admin';			if (getPermission($s,'access')) { ?> | <a href="./?m=admin&amp;">		<?php echo $AppUI->_('Users');$mds1[]=$s;?></a> <?php } ?>
			<?php $s='helpdesk';		if (getPermission($s,'access')) { ?> | <a href="./?m=helpdesk&amp;">	<?php echo $AppUI->_('Help Desk');$mds1[]=$s;?></a><?php } ?>		
			<?php $s='history';			if (getPermission($s,'access')) { ?> | <a href="./?m=history&amp;">		<?php echo $AppUI->_('History');$mds1[]=$s;?></a> <?php } ?>
			<?php $s='trac'; 			if (getPermission($s,'access')) { ?> | <a href="./?m=trac&amp;">		<?php echo $AppUI->_('Trac');$mds1[]=$s;?></a><?php } ?>
			<?php $s='backup';			if (getPermission($s,'access')) { ?> | <a href="./?m=backup&amp;">		<?php echo $AppUI->_('Backup');$mds1[]=$s;?></a> <?php } ?>
			<?php $s='hosting'; 		if (getPermission($s,'access')) { ?> | <a href="./?m=hosting&amp;">		<?php echo $AppUI->_('Hosting'); $mds1[]=$s;?></a> <?php } ?>
			<?php $s='mantis'; 			if (getPermission($s,'access')) { ?> | <a href="./?m=mantis&amp;">		<?php echo $AppUI->_('mantis'); $mds1[]=$s;?></a> <?php } ?>
			|
			</td>


		</tr>
	</table>
</tr>

<?php  /* меню: Ресурсы, Время */ 
?>
<tr>
	<table class="menu" align="left" border="0" cellspacing="0" cellpadding="3"  width="100%">
		<tr>
			<td align="left" nowrap="nowrap"><font color="darkgrey"> <?php echo $AppUI->_('dP+>');?></font>
			<?php $s='resources';		if (getPermission($s,'access')) { ?> \ <a href="./?m=resources&amp;">		<?php echo $AppUI->_('Resources');$mds1[]=$s;?></a> <?php } ?>
			<?php $s='dotproject_plus';	if (getPermission($s,'access')) { ?> \ <a href="./?m=dotproject_plus&amp;">	<?php echo $AppUI->_('dotProject+');$mds2[]=$s;?></a><?php } ?> 			
			<?php $s='initiating'; 		if (getPermission($s,'access')) { ?> \ <a href="./?m=initiating&amp;">		<?php echo $AppUI->_('Initiating');$mds2[]=$s;?></a><?php } ?> 				
			<?php $s='scopeplanning';	if (getPermission($s,'access')) { ?> \ <a href="./?m=scopeplanning&amp;">	<?php echo $AppUI->_('Scope Planning');$mds2[]=$s;?></a><?php } ?> 
			<?php $s='risks'; 			if (getPermission($s,'access')) { ?> \ <a href="./?m=risks&amp;">			<?php echo $AppUI->_('Risks');$mds2[]=$s;?></a><?php } ?>
			<?php $s='costs'; 			if (getPermission($s,'access')) { ?> \ <a href="./?m=costs&amp;">			<?php echo $AppUI->_('Costs');$mds2[]=$s;?></a><?php } ?> 			
			<?php $s='monitoringandcontrol'; if (getPermission($s,'access')) { ?> \ <a href="./?m=monitoringandcontrol&amp;">	<?php echo $AppUI->_('Monitoring and control');$mds2[]=$s;?></a><?php } ?> 
			<?php $s='closure'; 		if (getPermission($s,'access')) { ?> \ <a href="./?m=closure&amp;">			<?php echo $AppUI->_('Closure');$mds2[]=$s;?></a><?php } ?> 				
			\	
			</td>

			<td align="right" nowrap="nowrap">
			<?php $s='timesheet';		if (getPermission($s,'access')) { ?> \ <a href="./?m=timesheet&amp;">		<?php echo $AppUI->_('Timesheet');$mds2[]=$s;?></a> <?php } ?>
			<?php $s='human_resources'; if (getPermission($s,'access')) { ?> \ <a href="./?m=human_resources&amp;">	<?php echo $AppUI->_('Human Resources');$mds1[]=$s;?></a> <?php } ?>
			<?php $s='timeplanning'; 	if (getPermission($s,'access')) { ?> \ <a href="./?m=timeplanning&amp;">	<?php echo $AppUI->_('Time Planning');$mds2[]=$s;?></a><?php } ?> 
			<?php $s='timecard';		if (getPermission($s,'access')) { ?> \ <a href="./?m=timecard&amp;">		<?php echo $AppUI->_('Time Card'); $mds2[]=$s;?></a> <?php } ?>			
			\
			</td>
		</tr>
	</table>
</tr>

<?php /* меню: Переменное */
?>
<tr>
	<td  align="left">
	<table  class="menu" border="0" cellpadding="3" cellspacing="0"  width="100%">
		<tr>
			<td><font color="darkgrey">AddOn></font>
			\
			<?php
			$links = array();
			foreach ($nav as $module) {
				if (getPermission($module['mod_directory'], 'access')) 
				{	$s1=0;
					foreach ($mds as $s) {	if ($module['mod_directory'] == $s) {$s1=1;}}
					foreach ($mds1 as $s) {	if ($module['mod_directory'] == $s) {$s1=1;}}
					foreach ($mds2 as $s) {	if ($module['mod_directory'] == $s) {$s1=1;}}
					if ($s1 == 0)  { $links[] = '<a href="?m=' .$module['mod_directory']	.'">' .$AppUI->_($module['mod_ui_name']) .'</a>'; }
				}
			}
			echo implode(' \ ', $links);
			echo "\n";
			?>
			\
			</td>
			
			<td align="right" nowrap="nowrap">
			<?php $s='iGantt'; if (getPermission($s,'access')) { ?> \ <a href="./?m=igantt&amp;"><?php echo $AppUI->_('iGantt'); $mds2[]=$s;?></a> <?php } ?>	
			\
			</td>
		</tr>
	</table>
	</td>
</tr>
<?php } ?>

<?php // END showMenu ?>
</table>

<table  border="0" cellspacing="0" cellpadding="4"  width="100%">
	<tr>
		<td valign="top" align="left" width="98%"><?php echo $AppUI->getMsg();	?>
