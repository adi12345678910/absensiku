<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>
                    </div>

                    <div class="body">
                       <table class="table table-bordered table-hover js-basic-example dataTable font-12">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jabatan</th>
                                    <th>Jenis</th>
                                    <th>Durasi</th>
                                    <th>Mulai Dari</th>
                                    <th>Sampai</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; foreach ($is_view as $row): ?>
                                    <tr>
                                        <td align="center"><?php echo $no++; ?></td>
                                        <td><?php echo tgl_in($row->is_pengajuan_date); ?></td>
                                        <td><?php echo ucwords($row->user_name); ?></td>
                                        <td><?php echo ucwords($row->user_jabatan); ?></td>
                                        <td><?php echo ucwords($row->is_name); ?></td>
                                        <td><?php echo ucwords($row->is_type); ?></td>
                                        <td><?php echo tgl_in($row->is_jam); ?></td>
                                        <td><?php echo tgl_in($row->is_jam_sampai); ?></td>
                                        <td align="center">
                                            <?php 
                                                echo anchor(site_url('izin/inbox_detail/'.$row->is_id), '<i class="material-icons">search</i>', 
                                                array(
                                                    'class' => 'btn btn-primary btn-xs waves-effect',
                                                    'title' => 'Lihat Pengajuan'
                                                )); 
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>