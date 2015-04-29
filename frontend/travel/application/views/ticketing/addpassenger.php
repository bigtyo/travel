
    <input id="idticketing_detail" name="idticketing_detail" type="hidden" value="<?php if(isset($detail)) echo $detail->idticketing_detail; ?>" />
    
    
    <div class="control-group">
        <label for="salutation" class="control-label">Salutation</label>
        <div class="controls">
            
            <select  id="salutation" class="input-large"  name="salutation"  >
                   <?php if(isset($salutationlist)){
                       
                       foreach($salutationlist as $obj){?>
                         <option value="<?php echo $obj; ?>" 
                                 <?php if(isset($detail) && $obj === $detail->salutation) echo "selected='true'"; ?>
                          ><?php echo $obj; ?></option>
                       <?php }
                   } ?>
                    
                </select>
        </div>
    </div>
    
   <div class="control-group">
        <label for="firstname" class="control-label">Nama Depan</label>
        <div class="controls">
                <input type="text" name="firstname" id="firstname" 
                    <?php if(isset($detail)){
                        echo "value='".$detail->firstname."'";
                        }?> class="input-large"  >
        </div>
    </div>
    <div class="control-group">
        <label for="firstname" class="control-label">Nama Tengah</label>
        <div class="controls">
                <input type="text" name="middlename" id="middlename" 
                    <?php if(isset($detail)){
                        echo "value='".$detail->middlename."'";
                        }?> class="input-large"  >
        </div>
    </div>
    <div class="control-group">
        <label for="lastname" class="control-label">Nama Belakang</label>
        <div class="controls">
                <input type="text" name="lastname" id="lastname" 
                    <?php if(isset($detail)){
                        echo "value='".$detail->lastname."'";
                        }?> class="input-large"  >
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="tanggallahir" class="control-label">Tanggal Lahir</label>
        <div class="controls">
                <input type="text" name="tanggallahir" id="tanggallahir" 
                    <?php if(isset($detail)){
                        echo "value='".$detail->tanggallahir."'";
                    }?> class="input-large datepicker">
        </div>
    </div>
    <div class="control-group">
        <label for="isinfant" class="control-label">Apakah penumpang infant</label>
        <div class="controls">
                <select  id="infant" class="input-large"  name="infant"  >
                    <option value="0" <?php if(isset($detail) && $detail->infant == 0){
                        echo "selected='selected'";
                    } ?> >Tidak</option>
                    <option value="1" <?php if(isset($detail) && $detail->infant == 1){
                        echo "selected='selected'";
                    } ?> >Ya</option>
                </select>
        </div>
    </div>
    
    
    <script type="text/javascript">
        $(".datepicker").datepicker();
    </script>