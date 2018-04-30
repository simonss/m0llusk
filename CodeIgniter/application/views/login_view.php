<div>
    <?php
    if (!empty($message)) echo $message;
    ?>
</div>
<form class="form-horizontal" action="<?php echo base_url('index.php/Home/login_submit/');?>" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Email<a href="#" data-toggle="tooltip" data-placement="right" title="Siia sisestage logimiseks oma meiliaadress.">(?)</a>:</label>
		<div class="col-sm-10">
			<input style="right: 50px" type="email" class="form-control" name="name"
            <?php
            if (!empty($email)) {
                echo 'value="'.$email.'"';
            } else {
                echo 'placeholder="Enter email"' ;
            }
            ?> required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Password<a href="#" data-toggle="tooltip" data-placement="top" title="Siia sisestage logimiseks oma parool.">(?)</a>:</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password" placeholder="Enter password" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
				<label><input type="checkbox"> Remember me<a href="#" data-toggle="tooltip" data-placement="top" title="Siin saate edasiseks oma andmed salvestada.">(?)</a></label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
</form>
või logi sisse Google kaudu (sorry see on halvasti vormindatud)
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<div class="col-sm-offset-1">
    <a href="<?php echo base_url('index.php/Home/register');?>" title="Registreeru">Registreeru<a href="#" data-toggle="tooltip" data-placement="top" title="Siia sisestada oma emaili aadress.">(?)</a></a>
</div>