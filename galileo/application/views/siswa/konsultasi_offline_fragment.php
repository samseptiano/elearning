            <table class="table" id="konsul">
                <thead>
                    <tr>
                        <th>
                            Pelajaran
                        </th>

                        <th>
                            Waktu
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody >
                <?php foreach ($konsul as $u) { ?>
                    <tr class="active">
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                          <?php echo $u->tanggal." ".$u->jam ?>
                        </td>
                        <td>
                           <?php echo $u->status_konsultasi ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>