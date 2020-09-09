<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($POST_["basiccsharp"]));
	{
		$fil = "../Downloads/BasicC.zip";
		download($fil);
	}
}
function download($fil)
{
	if(file_exists($fil)) 
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($fil).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($fil));
		readfile($fil);
		exit;
	}
	else 
	{
		echo "Den fandt ikke filen";
	}
}
?>