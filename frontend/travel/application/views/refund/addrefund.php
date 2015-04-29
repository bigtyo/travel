
    <input id="idrefund" name="idrefund" type="hidden" value="<?php if(isset($refund)) echo $refund->idrefund; ?>" />
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
        <label for="tanggalrequest" class="control-label">Tanggal</label>
        <div class="controls">
                <input type="text" name="tanggalrequest" id="tanggalrequest" 
                    <?php if(isset($refund)){
                        echo "value='".$refund->tanggalrequest."'";
                    }?> class="input-large datepicker">
        </div>
    </div>
    
    <div class="control-group">
        <label for="nilairefund" class="control-label">nilairefund</label>
        <div class="controls">
                <input type="text" name="nilairefund" id="nilairefund" 
                    <?php if(isset($refund)){
                        echo "value='".$refund->nilairefund."'";
                    }?> class="input-large">
        </div>
    </div>
    
    <?php if(isset($ismaster) && $ismaster){ ?>
    <div class="control-group">
        <label for="status" class="control-label">Status</label>
        <div class="controls">
            
            <select  id="status" class="input-large"  name="status"  >
                   <?php if(isset($statuslist)){
                       
                       foreach($statuslist as $status){?>
                         <option value="<?php echo $status; ?>" 
                                 <?php if(isset($refund) && $status === $refund->status) echo "selected='true'"; ?>
                          ><?php echo $status; ?></option>
                       <?php }
                   } ?>
                    
                </select>
        </div>
    </div>
    <?php } ?>
    <div class="control-group">
        <label for="idmaskapai" class="control-label">Maskapai</label>
        <div class="controls">
                <select  id="idmaskapai" class="input-large"  name="idmaskapai"  >
                   <?php if(isset($maskapailist)){
                       
                       foreach($maskapailist as $maskapai){?>
                         <option value="<?php echo $maskapai->idmastermaskapai; ?>" 
                                 <?php if(isset($refund) && $maskapai->idmastermaskapai === $refund->idmaskapai) echo "selected='true'"; ?>
                          ><?php echo $maskapai->namamaskapai; ?></option>
                       <?php }
                   } ?>
                    
                </select>
        </div>
    </div>
    <div class="control-group">
        <label for="kodebooking" class="control-label">Kode Booking</label>
        <div class="controls">
                <input type="text" name="kodebooking" id="kodebooking" 
                    <?php if(isset($refund)){
                        echo "value='".$refund->kodebooking."'";
                    }?> class="input-large">
        </div>
    </div>
    <script type="text/javascript">
        $(".datepicker").datepicker();
    </script>
       