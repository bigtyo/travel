
    <input id="idagent_maskapai" name="idagent_maskapai" type="hidden" value="<?php if(isset($maskapai)) echo $maskapai->idagent_maskapai; ?>" />
    <input id="idmaskapai" name="idmaskapai" type="hidden" value="<?php if(isset($maskapai)) echo $maskapai->idmaskapai; ?>" />
    <input id="agentid" name="agentid" type="hidden" value="<?php if(isset($maskapai)) echo $maskapai->agentid; ?>" />
   <div class="control-group">
        <label for="idmaskapai" class="control-label">Nama maskapai</label>
        <div class="controls">
                <input type="text" readonly="true" name="namamaskapai" id="namamaskapai" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->namamaskapai."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="tipemarkup" class="control-label">Tipe Markup</label>
        <div class="controls">
                <select  id="tipemarkup" class="select"  name="tipemarkup"  >
                    <option value="1">Persentase</option>
                    <option value="0">Fixed Price</option>
                </select>
        </div>
    </div>
    <div class="control-group">
        <label for="ket" class="control-label">Nilai Prosentase</label>
        <div class="controls">
                <input type="text" name="persen_markup" id="persen_markup" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->persen_markup."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <div class="control-group">
        <label for="ket" class="control-label">Nilai Fix</label>
        <div class="controls">
                <input type="text" name="fix_markup" id="fix_markup" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->fix_markup."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <div class="control-group">
        <label for="ket" class="control-label">Plafon Markup</label>
        <div class="controls">
                <input type="text" name="plafon_markup" id="plafon_markup" 
                    <?php if(isset($maskapai)){
                        echo "value='".$maskapai->plafon_markup."'";
                    }?> class="input-large">
        </div>
    </div>
    
