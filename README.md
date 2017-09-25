init	
 ps aux|grep php|awk '{print $2}'|xargs kill -9