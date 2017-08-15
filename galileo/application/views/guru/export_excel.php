<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
            <tr>
                <?php $i = 1; foreach($nilai as $u) { ?>
              <td>
                     <?php 
                     if($i==1){
                      echo "ID Soal:    ".$u->id_soal ;
                     ?>
              </td>
              <td>
                      <?php echo "Tutor:   ".$u->tutor_user ?>
              </td>
              <td>
                      <?php echo "Kategori:   ".$u->kategori ?>
              </td>
              <?php }$i++;}?>
            </tr>
           <tr>
                        <th>
                            Username
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Pelajaran
                        </th>
                        <th>
                            Waktu Submit
                        </th>
                        <th>
                            Nilai
                        </th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($nilai as $u) { ?>
 
           <tr>
                        <td>
                           <?php echo $u->username ?>
                        </td>
                        <td>
                           <?php echo $u->kelas." ".$u->level ?>
                        </td>
                        <td>
                            <?php echo $u->pelajaran  ?>
                        </td>
                        <td>
                            <?php echo $u->waktu  ?>
                        </td>
                        <td>
                            <?php echo $u->nilai ?>
                        </td>
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>