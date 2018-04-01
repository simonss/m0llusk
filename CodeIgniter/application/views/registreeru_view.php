<script src="<?php echo base_url('scripts/registerradios.js')?>"></script>
<form class="form-horizontal" action="<?php echo base_url('index.php/Home/register_submit/');?>" method="post">
    <div class="col-sm-offset-1 col-sm-10">
        <input type="radio" name="usertype" value="tavakasutaja" onclick="kasutajatyyp();" checked> Tavakasutaja
        <input type="radio" name="usertype" value="arikasutaja" onclick="kasutajatyyp();"> Ärikasutaja
    </div>
    <!--//ärikasutaja andmed-->
    <div class="form-group" id="business1" style="display: none">
        <label class="control-label col-sm-2" for="toidukoha_nimi">Toidukoha nimi:</label>
        <div class="col-sm-10">
            <input style="right: 50px" type="text" class="form-control" name="toidukoha_nimi"  placeholder="">
        </div>
    </div>
    <div class="form-group" id="business2" style="display: none">
        <label class="control-label col-sm-2" for="firma_nimi">Firma nimi:</label>
        <div class="col-sm-10">
            <input style="right: 50px" type="text" class="form-control" name="firma_nimi">
        </div>
    </div>
    <div class="form-group" id="business3" style="display: none">
        <label class="control-label col-sm-2" for="registrikood">Registrikood:</label>
        <div class="col-sm-10">
            <input style="right: 50px" type="text" class="form-control" name="registrikood">
        </div>
    </div>
    <!--//tavakasutaja andmed-->
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">E-mail:</label>
        <div class="col-sm-10">
            <input style="right: 50px" type="email" class="form-control" name="email"  placeholder="Enter email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Parool:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Parool uuesti:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password2" placeholder="Enter password" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Registreeru</button>
        </div>
    </div>
</form>