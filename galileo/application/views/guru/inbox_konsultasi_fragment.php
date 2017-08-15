            <table class="table data">
                <thead>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <th>
                            Pesan
                        </th>
                        <th>
                            Waktu
                        </th>
                        <th>
                            Operasi
                        </th>
                    </tr>
                </thead>
                        <?php foreach ($chat as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                           <?php 
                                foreach($siswa as $s){
                                    if($u->sender == $s->id_siswa){
                                        echo($s->username);
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php echo substr($u->message,0,6)."..." ?>
                            <?php foreach ($chat2 as $a){ ?>
                            <?php if($a->sender == $u->sender){ ?>
                            <span class="badge bg-theme"><?php echo $a->message ?></span>
                            <?php }} ?>
                        </td>
                        <td>
                            <?php echo date("Y-m-d h:i:sa",$u->time) ?>
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo base_url()?>teachers/konsul/<?php echo $u->sender ?>"  type="button">Jawab</a>
                            <a class="btn btn-danger" href="<?php echo base_url()?>teachers/konsul_hapus/<?php echo $u->sender ?>"  type="button">Hapus</a>
                            
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>