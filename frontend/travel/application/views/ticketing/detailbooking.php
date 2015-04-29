
    <table class="table table-colored-header table-bordered table-force-topborder table-condensed"  id="tbl_detail_<?php echo $idticketing; ?>">
                <td>Kode Booking</td>
                <td>Tanggal Booking</td>
                <td>Nama Penumpang</td>
                <td>Tanggal Berangkat</td>
                <td>Tanggal Kembali</td>
                <td>Rute</td>
                <td>Maskapai</td>
                <td>Nta</td>
                <td>Insentif</td>
                <td>Komisi</td>
                <td>Markup</td>
                <td>Biaya Transaksi</td>
                <td>Sub total</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($details as $agent){ ?>
            <tr id="tr_<?php echo $agent->idticketing_detail; ?>">

                <td><?php if($agent->kodebooking != null && $agent->kodebooking != ""){ echo $agent->kodebooking; } else{echo "-";} ?></td>
                <td><?php if($agent->tanggalbooking != null && $agent->tanggalbooking != ""){ echo $agent->tanggalbooking; } else{echo "-";} ?></td>
                <td><?php echo $agent->firstname." ".$agent->middlename." ".$agent->lastname; ?></td>
                <td><?php echo $agent->tanggalpergi; ?></td>
                <td><?php echo $agent->tanggalpulang; ?></td>
                <td><?php if($agent->rute != null && $agent->rute != ""){ echo $agent->rute; } else{echo "-";} ?></td>
                <td><?php if($agent->kelas != null && $agent->kelas != ""){ echo $agent->kelas; } else{echo "-";} ?></td>
                <td>Rp. <?php echo number_format($agent->nta,2); ?></td>
                <td>Rp. <?php echo number_format($agent->insentif,2); ?></td>
                <td>Rp. <?php echo number_format($agent->komisi,2); ?></td>
                <td>Rp. <?php echo number_format($agent->markup,2); ?></td>
                <td>Rp. <?php echo number_format(($agent->nta + $agent->komisi + $agent->markup + $agent->insentif) * ($agent->mod/100),2); ?></td>
                <td>Rp. <?php echo number_format(($agent->nta + $agent->komisi + $agent->markup + $agent->insentif) * ($agent->mod/100) + ($agent->nta + $agent->komisi + $agent->markup + $agent->insentif),2); ?></td>  
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a  href="#tbl_detail_<?php echo $idticketing; ?>" class="btn btn-grey" onclick="closethis(<?php echo $idticketing; ?>);">Close</a>

