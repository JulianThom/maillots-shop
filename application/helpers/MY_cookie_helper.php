<?php 
	function set_cookie($name, $value = '', $expire = '', $domain = '', $path = '/', $prefix = '', $secure = FALSE, $httponly = FALSE)
	{
		if (empty($expire)) {
			$expire=time()+172800;
		}
		if (!is_string($value)) {
			$value=serialize($value);
		}	
		// Set the config file options
		get_instance()->input->set_cookie($name, $value, $expire, $domain, $path, $prefix, $secure, $httponly);
	}