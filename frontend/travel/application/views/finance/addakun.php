
    
   <div class="control-group">
        <label for="namaagen" class="control-label">Kode akun</label>
        <div class="controls">
                <input type="text" name="kodeakun" id="kodeakun" 
                    <?php if(isset($acount)){
                        echo "value='".$acount->kodeakun."' ".'readonly="readonly" ';
                        }?> class="input-large"  >
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">Nama Akun</label>
        <div class="controls">
                <input type="text" name="namaakun" id="namaakun" 
                    <?php if(isset($acount)){
                        echo "value='".$acount->namaakun."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="selJenis" class="control-label">Parent</label>
        <div class="controls">
            
            <select  id="parent" class="input-large"  name="parent"  >
                   <?php if(isset($acountlist)){
                       
                       foreach($acountlist as $acc){?>
                         <option value="<?php echo $acc->kodeakun; ?>" 
                                 <?php if(isset($acount) && $acc->kodeakun === $acount->parent) echo "selected='true'"; ?>
                          ><?php echo $acc->kodeakun." - ".$acc->namaakun; ?></option>
                       <?php }
                   } ?>
                    
                </select>
        </div>
    </div>
    
