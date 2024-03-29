<?php
//password
include('SimpleImage.php');
$password = "unaco-photo";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PHP User Social Network - www.phper.net</title>
<style type="text/css">
<!--
body,td{
	font-size: 14px;
	color: #000000;
}
a {
	color: #000066;
	text-decoration: none;
}
a:hover {
	color: #FF6600;
	text-decoration: underline;
}
-->
</style>
</head>

<body>
  <form name="myform" method="post" action="<?=$_SERVER[PHP_SELF];?>" enctype="multipart/form-data" onSubmit="return check_uploadObject(this);">
<?
	if(!$_REQUEST["myaction"]):
?>

<script language="javascript">
function check_uploadObject(form){
	if(form.password.value==''){
		alert('Please input password.');
		return false;
	}
	return true;
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td height="40" colspan="2" style="color:#FF9900"><p>&nbsp;</p>
<p>&nbsp;</p></td>
    </tr>
    <tr>
      <td width="11%" nowrap>or upload one</td>
      <td width="89%"><input name="upfile" type="file" id="upfile" size="20"></td>
    </tr>
	<tr>
      <td>unzip to: </td>
      <td><input name="todir" id="todir" value="../image/data/" size="15" type="hidden"> 
      (leave blank if unzip to current directory,Must have write permission)</td>
    </tr>
	<tr>
      <td>Verify Password: </td>
      <td><input name="password" type="password" id="password" size="15"> 
        (Password set in the source file)</td>
    </tr>	
    <tr>
      <td><input name="myaction" type="hidden" id="myaction" value="dounzip"></td>
      <td><input type="submit" name="Submit" value="Unzip"></td>
    </tr>
  </table>

<?

elseif($_REQUEST["myaction"]=="dounzip"):


class zip
{
 var $total_files = 0;
 var $total_folders = 0; 

 function Extract ( $zn, $to, $index = Array(-1) )
 {
   $ok = 0; $zip = @fopen($zn,'rb');
   if(!$zip) return(-1);
   $cdir = $this->ReadCentralDir($zip,$zn);
   $pos_entry = $cdir['offset'];

   if(!is_array($index)){ $index = array($index);  }
   for($i=0; $index[$i];$i++){
   		if(intval($index[$i])!=$index[$i]||$index[$i]>$cdir['entries'])
		return(-1);
   }
   for ($i=0; $i<$cdir['entries']; $i++)
   {
     @fseek($zip, $pos_entry);
     $header = $this->ReadCentralFileHeaders($zip);
     $header['index'] = $i; $pos_entry = ftell($zip);
     @rewind($zip); fseek($zip, $header['offset']);
     if(in_array("-1",$index)||in_array($i,$index))
     	$stat[$header['filename']]=$this->ExtractFile($header, $to, $zip);
   }
   fclose($zip);
   return $stat;
 }

  function ReadFileHeader($zip)
  {
    $binary_data = fread($zip, 30);
    $data = unpack('vchk/vid/vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $binary_data);

    $header['filename'] = fread($zip, $data['filename_len']);
    if ($data['extra_len'] != 0) {
      $header['extra'] = fread($zip, $data['extra_len']);
    } else { $header['extra'] = ''; }

    $header['compression'] = $data['compression'];$header['size'] = $data['size'];
    $header['compressed_size'] = $data['compressed_size'];
    $header['crc'] = $data['crc']; $header['flag'] = $data['flag'];
    $header['mdate'] = $data['mdate'];$header['mtime'] = $data['mtime'];

    if ($header['mdate'] && $header['mtime']){
     $hour=($header['mtime']&0xF800)>>11;$minute=($header['mtime']&0x07E0)>>5;
     $seconde=($header['mtime']&0x001F)*2;$year=(($header['mdate']&0xFE00)>>9)+1980;
     $month=($header['mdate']&0x01E0)>>5;$day=$header['mdate']&0x001F;
     $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
    }else{$header['mtime'] = time();}

    $header['stored_filename'] = $header['filename'];
    $header['status'] = "ok";
    return $header;
  }

 function ReadCentralFileHeaders($zip){
    $binary_data = fread($zip, 46);
    $header = unpack('vchkid/vid/vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $binary_data);

    if ($header['filename_len'] != 0)
      $header['filename'] = fread($zip,$header['filename_len']);
    else $header['filename'] = '';

    if ($header['extra_len'] != 0)
      $header['extra'] = fread($zip, $header['extra_len']);
    else $header['extra'] = '';

    if ($header['comment_len'] != 0)
      $header['comment'] = fread($zip, $header['comment_len']);
    else $header['comment'] = '';

    if ($header['mdate'] && $header['mtime'])
    {
      $hour = ($header['mtime'] & 0xF800) >> 11;
      $minute = ($header['mtime'] & 0x07E0) >> 5;
      $seconde = ($header['mtime'] & 0x001F)*2;
      $year = (($header['mdate'] & 0xFE00) >> 9) + 1980;
      $month = ($header['mdate'] & 0x01E0) >> 5;
      $day = $header['mdate'] & 0x001F;
      $header['mtime'] = mktime($hour, $minute, $seconde, $month, $day, $year);
    } else {
      $header['mtime'] = time();
    }
    $header['stored_filename'] = $header['filename'];
    $header['status'] = 'ok';
    if (substr($header['filename'], -1) == '/')
      $header['external'] = 0x41FF0010;
    return $header;
 }

 function ReadCentralDir($zip,$zip_name){
	$size = filesize($zip_name);

	if ($size < 277) $maximum_size = $size;
	else $maximum_size=277;
	
	@fseek($zip, $size-$maximum_size);
	$pos = ftell($zip); $bytes = 0x00000000;
	
	while ($pos < $size){
		$byte = @fread($zip, 1); $bytes=($bytes << 8) | ord($byte);
		if ($bytes == 0x504b0506 or $bytes == 0x2e706870504b0506){ $pos++;break;} $pos++;
	}
	
	$fdata=fread($zip,18);
	
	$data=@unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size',$fdata);
	
	if ($data['comment_size'] != 0) $centd['comment'] = fread($zip, $data['comment_size']);
	else $centd['comment'] = ''; $centd['entries'] = $data['entries'];
	$centd['disk_entries'] = $data['disk_entries'];
	$centd['offset'] = $data['offset'];$centd['disk_start'] = $data['disk_start'];
	$centd['size'] = $data['size'];  $centd['disk'] = $data['disk'];
	return $centd;
  }

 function ExtractFile($header,$to,$zip){
	$header = $this->readfileheader($zip);
	
	if(substr($to,-1)!="/") $to.="/";
	if($to=='./') $to = '';	
	$pth = explode("/",$to.$header['filename']);
	$mydir = '';
	$text = "image name: ";
	for($i=0;$i<count($pth)-1;$i++){
		if(!$pth[$i]) continue;
		$mydir .= $pth[$i]."/";
		if((!is_dir($mydir) && @mkdir($mydir,0777)) || (($mydir==$to.$header['filename'] || ($mydir==$to && $this->total_folders==0)) && is_dir($mydir)) ){
			@chmod($mydir,0777);
			$this->total_folders ++;
			echo "<input name='dfile[]' type='checkbox' value='$mydir' checked> <a href='$mydir' target='_blank'>Directory: $mydir</a><br>";
			echo $to.$header['filename'];
		}
	}
	
	if(strrchr($header['filename'],'/')=='/') return;	

	if (!($header['external']==0x41FF0010)&&!($header['external']==16)){
		if ($header['compression']==0){
			$fp = @fopen($to.$header['filename'], 'wb');
			if(!$fp) return(-1);
			$size = $header['compressed_size'];
		
			while ($size != 0){
				$read_size = ($size < 2048 ? $size : 2048);
				$buffer = fread($zip, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
			fclose($fp);
			touch($to.$header['filename'], $header['mtime']);
		}else{
			$fp = @fopen($to.$header['filename'].'.gz','wb');
			if(!$fp) return(-1);
			$binary_data = pack('va1a1Va1a1', 0x8b1f, Chr($header['compression']),
			Chr(0x00), time(), Chr(0x00), Chr(3));
			
			fwrite($fp, $binary_data, 10);
			$size = $header['compressed_size'];
		
			while ($size != 0){
				$read_size = ($size < 1024 ? $size : 1024);
				$buffer = fread($zip, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
		
			$binary_data = pack('VV', $header['crc'], $header['size']);
			fwrite($fp, $binary_data,8); fclose($fp);
	
			$gzp = @gzopen($to.$header['filename'].'.gz','rb') or die("Failed to create directory");
			if(!$gzp) return(-2);
			$fp = @fopen($to.$header['filename'],'wb');
			if(!$fp) return(-1);
			$size = $header['size'];
		
			while ($size != 0){
				$read_size = ($size < 2048 ? $size : 2048);
				$buffer = gzread($gzp, $read_size);
				$binary_data = pack('a'.$read_size, $buffer);
				@fwrite($fp, $binary_data, $read_size);
				$size -= $read_size;
			}
			
			//---resize image file
			resizeImage($to, $header['filename'], '100');
			resizeImage($to, $header['filename'], '120');
			resizeImage($to, $header['filename'], '250');
			resizeImage($to, $header['filename'], '500');
			//---
			
			fclose($fp); gzclose($gzp);
		
			touch($to.$header['filename'], $header['mtime']);
			@unlink($to.$header['filename'].'.gz');
			
		}
	}
	
	$this->total_files ++;
	echo "<input name='dfile[]' type='checkbox' value='$to$header[filename]' checked> <a href='$to$header[filename]' target='_blank'>Files: $to$header[filename]</a><br>";

	return true;
 }
 


// end class
}

 function resizeImage($to, $fileName, $size){
	 $newImage = new SimpleImage();
	 $getFileName = explode(".", $fileName);
	 $newImage->load($to.$getFileName[0].'.'.$getFileName[1]);
	 $newImage->resize($size, $size);
	 $newImageFile = $getFileName[0].'-'.$size.'x'.$size.'.'.$getFileName[1];
	 $newLoc = "../image/cache/data/";
	 $newImage->save($newLoc.$newImageFile);	
 }
 
	set_time_limit(0);

	if ($_POST['password'] != $password) die("The password is incorrect, please re-enter");
	if(!$_POST["todir"]) $_POST["todir"] = ".";
	$z = new Zip;
	$have_zip_file = 0;
	function start_unzip($tmp_name,$new_name,$checked){
		global $_POST,$z,$have_zip_file;
		$upfile = array("tmp_name"=>$tmp_name,"name"=>$new_name);
		if(is_file($upfile[tmp_name])){
			$have_zip_file = 1;
			echo "<br>In Process: <input name='dfile[]' type='checkbox' value='$upfile[name]' ".($checked?"checked":"")."> $upfile[name]<br><br>";
			if(preg_match('/\.zip$/mis',$upfile[name])){
				$result=$z->Extract($upfile[tmp_name],$_POST["todir"]);  //place of the file name
				//echo "$upfile[name]";
				if($result==-1){
					echo "<br>File $upfile[name] error.<br>";
				}
				echo "<br>Done,Create $z->total_folders directory(s),$z->total_files file(s).<br><br><br>";
			}else{
				echo "<br>$upfile[name] is not a zip file.<br><br>";			
			}
			if(realpath($upfile[name])!=realpath($upfile[tmp_name])){
				@unlink($upfile[name]);
				rename($upfile[tmp_name],$upfile[name]);
			}
		}
	}
	
	clearstatcache();
	
	start_unzip($_POST["zipfile"],$_POST["zipfile"],0);
	start_unzip($_FILES["upfile"][tmp_name],$_FILES["upfile"][name],1);

	if(!$have_zip_file){
		echo "<br>Please select or upload files.<br>";
	}
?>
<input name="password" type="hidden" id="password" value="<?=$_POST['password'];?>">
<input name="myaction" type="hidden" id="myaction" value="dodelete">
<input name="button" type="button" value="go back" onClick="window.location='<?=$_SERVER[PHP_SELF];?>';">

<input type='button' value='Inverse' onclick='selrev();'> <input type='submit' onclick='return confirm("Delete the selected file?");' value='Delete the selected file'>

<script language='javascript'>
function selrev() {
	with(document.myform) {
		for(i=0;i<elements.length;i++) {
			thiselm = elements[i];
			if(thiselm.name.match(/dfile\[]/))	thiselm.checked = !thiselm.checked;
		}
	}
}
alert('Completed.');
</script>
<?

elseif($_REQUEST["myaction"]=="dodelete"):
	set_time_limit(0);
	if ($_POST['password'] != $password) die("The password is incorrect, please re-try.");
	
	$dfile = $_POST["dfile"]; 
	echo "Deleting files...<br><br>";
	if(is_array($dfile)){
		for($i=count($dfile)-1;$i>=0;$i--){
			if(is_file($dfile[$i])){
				if(@unlink($dfile[$i])){
					echo "Deleted files: $dfile[$i]<br>";
				}else{
					echo "Delete file failed: $dfile[$i]<br>";
				}
			}else{
				if(@rmdir($dfile[$i])){
					echo "Deleted directory: $dfile[$i]<br>";
				}else{
					echo "Failed to delete directory: $dfile[$i]<br>";
				}				
			}
			
		}
	}
	echo "<br>Completed.<br><br><input type='button' value='go back' onclick=\"window.location='$_SERVER[PHP_SELF]';\"><br><br>
		 <script language='javascript'>('Completed.');</script>";

endif;

?>
  </form>
</body>
</html>