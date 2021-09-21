<h1>Home</h1>
<p>Welcome<?php echo Session::get("logged_in")?" back, ".Session::get("login")."!":", user!"?></p>