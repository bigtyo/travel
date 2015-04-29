
    <input type="hidden" id="idmasterloginmaskapai" name="idmasterloginmaskapai" <?php if(isset($loginmaskapai)){echo "value='".$loginmaskapai->idmasterloginmaskapai."'";} ?> >
   <div class="control-group">
        <label for="namaagen" class="control-label">Nama Maskapai</label>
        <div class="controls">
                <input type="text" name="namamaskapai" id="namamaskapai" 
                    <?php if(isset($loginmaskapai)){
                        echo "value='".$loginmaskapai->namamaskapai."' ".'readonly="readonly" ';
                        }?> class="input-large"  >
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">Login</label>
        <div class="controls">
                <input type="text" name="login" id="login" 
                    <?php if(isset($loginmaskapai)){
                        echo "value='".$loginmaskapai->login."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">Password baru</label>
        <div class="controls">
                <input type="text" name="password" id="password" 
                    <?php if(isset($loginmaskapai)){
                        echo "value='".$loginmaskapai->password."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
