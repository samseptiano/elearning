            <table class="table data" id="konsultasi">
                <thead>
                    <tr>
                        <th>
                            Foto
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Bidang
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Online
                        </th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                        <?php foreach ($tutor as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                          <img style="width: 50px;height: 50px" src="<?php echo base_url().$u->foto ?>" class="img-circle">
                        </td>
                        <td>
                           <?php echo $u->nama_depan." ".$u->nama_belakang ?>
                        </td>
                        <td>
                            <?php echo $u->bidang ?>
                        </td>
                        <td>
                            <?php echo $u->level ?>
                        </td>
                        <td>
                           <?php
                            if($u->online == 'NO'){
                                echo "<p style='color:red'>".$u->online."</p>";
                            }
                            else{
                                echo "<p style='color:green'>".$u->online."</p>";
                            } 
                             ?>
                        </td>
                        <td>
                            <center><a class="btn btn-success" href="<?php echo base_url()?>students/konsul/<?php echo $u->id_tutor  ?>"  type="button">Konsultasi</a></center>
                        </td>
                    </tr>
                </tbody>
                            <?php } ?>
            </table>