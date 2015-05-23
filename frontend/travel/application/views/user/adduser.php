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
    <div class="control-group">
        <label for="role" class="control-label">Hak Akses</label>
        <div class="controls">
            <div class="span2">
                <input type="checkbox" name="isbook" id="isbook" 
                    <?php if(isset($user) && $user->isbook == 1){
                        echo "checked='checked'";
                    }?> class="check">Booking Ticket
                
            </div>
            <div class="span2">
                <input type="checkbox" name="isissued" id="isissued" 
                    <?php if(isset($user) && $user->isissued == 1){
                        echo "checked='checked'";
                    }?> class="check">Issued Ticket
                
            </div>    
                
                <div class="span2">
                    <input type="checkbox" name="isfinance" id="isfinance" 
                    <?php if(isset($user) && $user->isfinance == 1){
                        echo "checked='checked'";
                    }?> class="check">Finance
                </div>    
                
                <div class="span2">
                    <input type="checkbox" name="ismanageuser" id="ismanageuser" 
                    <?php if(isset($user) && $user->ismanageuser == 1){
                        echo "checked='checked'";
                    }?> class="check">Manage User
                
                </div>    
                

                
                <div class="span2">
                    <input type="checkbox" name="isprice" id="isprice" 
                    <?php if(isset($user) && $user->isprice == 1){
                        echo "checked='checked'";
                    }?> class="check">Manage Price
                </div>    
                
                <div class="span2">
                    <input type="checkbox" name="isdeposit" id="isdeposit" 
                    <?php if(isset($user) && $user->isdeposit == 1){
                        echo "checked='checked'";
                    }?> class="check">Manage Deposit
                </div>    
                
                <div class="span2">
                    <input type="checkbox" name="ismasterdata" id="ismasterdata" 
                    <?php if(isset($user) && $user->ismasterdata == 1){
                        echo "checked='checked'";
                    }?> class="check">Master Data
                </div>    
                
        </div>
    </div>
    
    
    
