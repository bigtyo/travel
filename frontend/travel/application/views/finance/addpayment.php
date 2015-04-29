
    
   <div class="control-group">
        <label for="namaagen" class="control-label">Kode payment</label>
        <div class="controls">
            <input type="text" name="idpayment" id="idpayment" readonly="readonly"
                    <?php if(isset($payment)){
                        echo "value='".$payment->idmastertransaksi."'";
                        }?> class="input-large"  >
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">Nama Jenis Payment</label>
        <div class="controls">
                <input type="text" name="namatransaksi" id="namatransaksi" 
                    <?php if(isset($payment)){
                        echo "value='".$payment->namatransaksi."'";
                    }?> class="input-large">
        </div>
    </div>
    
    
    <div class="control-group">
        <label for="nama" class="control-label">% mod</label>
        <div class="controls">
                <input type="number" name="persenmod" id="persenmod" 
                    <?php if(isset($payment)){
                        echo "value='".$payment->persenmod."'";
                    }?> class="input-large">
        </div>
    </div>
    
