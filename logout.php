<?php

    include ("./configs/init.php");
    $Session->logout();

    if(isset($_SERVER["HTTP_REFERER"])){
		?>

		<script>
			function setCookie(cname, cvalue, exMins) {
    				var d = new Date();
    				d.setTime(d.getTime() + (exMins*60*1000));
    				var expires = "expires="+d.toUTCString();  
    				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}

			setCookie('PHPSESSID','',0)
		</script>

		<?php

        setcookie("PHPSESSID", "", 0, "/");
        
	}

    redirect("./index.php");
    
    