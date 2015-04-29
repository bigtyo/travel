
    <input id="iddeposit" name="iddeposit" type="hidden" value="<?php if(isset($deposit)) echo $deposit->iddeposit; ?>" />
    <input id="iddeposit" name="idagent" type="hidden" value="<?php if(isset($deposit)) echo $deposit->idagent; ?>" />
   <div class="control-group">
        <label for="namaagen" class="control-label">Agent Name</label>
        <div class="controls">
                <input type="text" name="namaagen" id="namaagen" 
                    <?php if(isset($deposit)){
                        echo "value='".$deposit->namaagen."'";
                        }?> class="input-large"  >
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="tanggalcreated" class="control-label">Tanggal</label>
        <div class="controls">
                <input type="text" name="tanggalcreated" id="tanggalcreated" 
                    <?php if(isset($deposit)){
                        echo "value='".$deposit->tanggalcreated."'";
                    }?> class="input-large">
        </div>
    </div>
    <div class="control-group">
        <label for="ket" class="control-label">Nilai</label>
        <div class="controls">
                <input type="text" name="nilai" id="nilai" 
                    <?php if(isset($deposit)){
                        echo "value='".$deposit->nilai."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <?php if(isset($ismaster) && $ismaster){ ?>
    <div class="control-group">
        <label for="statusdeposit" class="control-label">Status</label>
        <div class="controls">
            
            <select  id="statusdeposit" class="input-large"  name="statusdeposit"  >
                   <?php if(isset($statuslist)){
                       
                       foreach($statuslist as $status){?>
                         <option value="<?php echo $status['statusdeposit']; ?>" 
                                 <?php if(isset($deposit) && $status['statusdeposit'] === $deposit->statusdeposit) echo "selected='true'"; ?>
                          ><?php echo $status['statusdeposit']; ?></option>
                       <?php }
                   } ?>
                    
                </select>
        </div>
    </div>
    <?php } ?>
    
