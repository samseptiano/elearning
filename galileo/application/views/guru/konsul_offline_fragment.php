            <table class="table data">
                <thead>
                    <tr>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Pelajaran
                        </th>
                        <th>
                            Waktu
                        </th>
                        <th>
                            Materi
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Operasiddd
                        </th>
                    </tr>
                </thead>
                        <?php foreach ($konsul as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                           <?php echo $u->kelas." ".$u->level ?>
                        </td>
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                            <?php echo $u->tanggal." ".$u->jam ?>
                        </td>
                        <td>
                            <?php echo $u->materi ?>
                        </td>
                        <td>
                            <?php echo $u->status_konsultasi ?>
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo base_url()?>teachers/offline_consultation_acc/<?php echo $u->id_konsul ?>/"  type="button">Terima</a><a class="btn btn-danger" href="<?php echo base_url()?>teachers/offline_consultation_reject/<?php echo $u->id_konsul ?>/"  type="button">Tolak</a>
                        </td>
                    </tr>
                </tbody>
                            <?php } ?>
            </table>