<input type="hidden" name="isnew" id="isnew" value="<?php if(isset($isnew)){ echo $isnew;} ?>"/>
    
   <div class="control-group">
        <label for="login" class="control-label">Login</label>
        <div class="controls">
                <input type="text" <?php if($isnew == "") { ?>readonly="true" <?php } ?> name="username" id="username" 
                    <?php if(isset($user)){
                        echo "value='".$user->username."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">Nama</label>
        <div class="controls">
                <input type="text" name="nama" id="nama" 
                    <?php if(isset($user)){
                        echo "value='".$user->nama."'";
                    }?> class="input-large">
        </div>
    </div>

    <div class="control-group">
        <label for="alamat" class="control-label">Alamat</label>
        <div class="controls">
                <input type="text" name="alamat" id="alamat" 
                    <?php if(isset($user)){
                        echo "value='".$user->alamat."'";
                    }?> class="input-large">
        </div>
    </div>
    <div class="control-group">
        <label for="telepon" class="control-label">Telepon</label>
        <div class="controls">
                <input type="text" name="telepon" id="telepon" 
                    <?php if(isset($user)){
                        echo "value='".$user->telepon."'";
                    }?> class="input-large">
        </div>
    </div>
    <div class="control-group">
        <label for="email" class="control-label">Email</label>
        <div class="controls">
                <input type="text" name="email" id="email" 
                    <?php if(isset($user)){
                        echo "value='".$user->email."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    
