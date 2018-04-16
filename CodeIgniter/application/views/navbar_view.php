<nav class="navbar navbar-inverse"  data-offset-top="197">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="<?php echo base_url('index.php/Home') ?>"  <?php if($this->uri->segment(1)=="Home"){echo 'class="active"';}?> title="Täna"><?= _TÄNA ?></a></li>
			<li><a href="<?php echo  base_url('index.php/Home/homme')?>" <?php if($this->uri->segment(1)=="homme"){echo 'class="active"';}?> title="Homme"><?=_HOMME?></a></li>
            <!--<li><a href="<?php echo  base_url('index.php/Home/#')?>" <?php if($this->uri->segment(1)=="#"){echo 'class="active"';}?> title="Otsing"><?=_OTSING ?></a></li>-->

            <?php if ($loggedIn) {
                echo "<li><a href=\"".base_url('index.php/Home/favs')."\" title='Lemmikud'>"?><?=_LEMMIKUD?><?php echo "</a></li>";
                echo "<li><a href=\"".base_url('index.php/Home/user')."\" title='Sinu Andmed'>"?><?=_ANDMED?><?php echo "</a></li>";
            if ($usertype === 'arikasutaja') {
                echo "<li><a href=\"".base_url('index.php/Home/foods')."\" title='Sinu toidud'>"?><?=_TOIDUD?><?php echo "</a></li>";
            }
                echo         "<ul class=\"nav navbar-nav navbar-right\">
                            <li style=\"color: grey\">"?><?=_NAME?><?php echo "$name </li>
                            </ul>";

            }
            ?>

        </ul>



		<ul class="nav navbar-nav navbar-right">

            <?php if ($loggedIn) {
                    echo "<li><a onclick=\"signOut();\" title='Logi Välja'><span class=\"glyphicon glyphicon-log-out\"></span>"?><?=_LOGOUT?><?php echo "</a></li>";
            }else {
                    echo "<li><a href=\"" . base_url('index.php/Home/login') . "\" title='Logi sisse'><span class=\"glyphicon glyphicon-log-in\"></span>"?><?=_LOGIN?><?php echo "</a></li>";
                }

            ?>
		</ul>
	</div>
</nav>
