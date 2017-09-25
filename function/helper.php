<?php
	function getConfig($key=''){
		global $aRepoConfig;
		return isset($aRepoConfig[$key])?$aRepoConfig[$key]:'';
	}

?>