
    
    <input id="idmastermaskapai" name="idmastermaskapai" type="hidden" value="<?php if(isset($maskapai)) echo $maskapai->idmastermaskapai; ?>" />
    
   <div class="control-group">
        <label for="namamaskapai" class="control-label">Nama maskapai</label>
        <div class="controls">
                <input type="text" readonly="true" name="namamaskapai" id="namamaskapai" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->namamaskapai."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    
    <div class="control-group">
        <label for="alamat" class="control-label">Alamat</label>
        <div class="controls">
                <input type="text" name="alamat" id="alamat" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->alamat."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <div class="control-group">
        <label for="telepon" class="control-label">Telepon</label>
        <div class="controls">
                <input type="text" name="telepon" id="telepon" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->telepon."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <div class="control-group">
        <label for="email" class="control-label">Email</label>
        <div class="controls">
                <input type="text" name="email" id="email" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->email."'";
                    }?> class="input-large">
        </div>
    </div>
    
