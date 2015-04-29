
    <input id="agentid" name="agentid" type="hidden" value="<?php if(isset($agent)) echo $agent->idagent; ?>" />
   <div class="control-group">
        <label for="namaagen" class="control-label">Agent Name</label>
        <div class="controls">
                <input type="text" name="namaagen" id="namaagen" 
                    <?php if(isset($agent)){
                        echo "value='".$agent->namaagen."'";
                        }?> class="input-large"  >
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">Alamat</label>
        <div class="controls">
                <input type="text" name="alamat" id="alamat" 
                    <?php if(isset($agent)){
                        echo "value='".$agent->alamat."'";
                    }?> class="input-large">
        </div>
    </div>
    <div class="control-group">
        <label for="ket" class="control-label">Email</label>
        <div class="controls">
                <input type="text" name="email" id="email" 
                    <?php if(isset($agent)){
                        echo "value='".$agent->email."'";
                    }?> class="input-large">
        </div>
    </div>
    <div class="control-group">
        <label for="ket" class="control-label">Telepon</label>
        <div class="controls">
                <input type="text" name="telepon" id="telepon" 
                    <?php if(isset($agent)){
                        echo "value='".$agent->telepon."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <div class="control-group">
        <label for="selJenis" class="control-label">Username</label>
        <div class="controls">
            
            <select  id="selOffice" class="input-large"  name="username"  >
                   <?php if(isset($userlist)){
                       
                       foreach($userlist as $user){?>
                         <option value="<?php echo $user->username; ?>" 
                                 <?php if(isset($agent) && $user->username === $agent->username) echo "selected='true'"; ?>
                          ><?php echo $user->username; ?></option>
                       <?php }
                   } ?>
                    <?php if(isset($agent) && $agent->idagent != ""){ ?>
                    <option value="<?php echo $agent->username; ?>" 
                                 <?php  echo "selected='true'"; ?>
                    ><?php echo $agent->username; ?></option>
                    <?php } ?>
                </select>
        </div>
    </div>
    
