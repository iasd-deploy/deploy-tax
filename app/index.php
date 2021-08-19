<?php 
ob_start();
function redirect()
	{
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

		switch($lang){
				case 'es':
						$redir_url = "/es/";
						break;
				default:
				case 'pt':
						$redir_url = "/pt/";
						break;
		}

	 header("Location: $redir_url");
}

redirect(); 
?> 
