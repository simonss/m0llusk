<nav class="navbar navbar-inverse"  data-offset-top="197">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="<?php echo base_url('index.php/Home') ?>"  <?php if($this->uri->segment(1)=="Home"){echo 'class="active"';}?>>Täna</a></li>
			<li><a href="<?php echo  base_url('index.php/Home/homme')?>" <?php if($this->uri->segment(1)=="homme"){echo 'class="active"';}?>>Homme</a></li>
            <li><a href="<?php echo  base_url('index.php/Home/#')?>" <?php if($this->uri->segment(1)=="#"){echo 'class="active"';}?>>Otsing</a></li>

            <?php if ($loggedIn) {
                echo "<li><a href=\"".base_url('index.php/Home/favs')."\">Lemmikud</a></li>";
                echo "<li><a href=\"".base_url('index.php/Home/user')."\">Sinu andmed</a></li>";
            if ($usertype === 'arikasutaja') {
                echo "<li><a href=\"".base_url('index.php/Home/foods')."\">Sinu toidud</a></li>";
            }
                echo         "<ul class=\"nav navbar-right\">
                            <li style=\"color: grey\"> logitud sisse kui $name </li>
                            </ul>";

            }
            ?>

        </ul>



		<ul class="nav navbar-nav navbar-right">

            <?php if ($loggedIn) {
                    echo "<li><a onclick=\"signOut();\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></li>";
            }else {
                    echo "<li><a href=\"" . base_url('index.php/Home/login') . "\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
                }

            ?>
		</ul>
	</div>
</nav>
