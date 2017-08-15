            <table class="table data">
                <thead>
                    <tr>
                       <th>
                            Pelajaran
                        </th>
                        <th>
                            Mulai
                        </th>
                        <th>
                            Durasi(Menit)
                        </th>
                        <th>
                            Kategori
                        </th>
                        <th>
                      
                        </th>
                    </tr>
                </thead>
                <?php foreach ($soal as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                            <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                            <?php echo $u->waktu_mulai ?>
                        </td>
                        <td>
                            <?php echo $u->durasi_menit ?>
                        </td>
                        <td>
                            <?php echo $u->kategori ?>
                        </td>
                        <td>
                          <a class="btn btn-theme" href="<?php echo base_url() ?>students/start_test/<?php echo $u->id_soal ?>"  type="button">Mulai Test</a> 
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>