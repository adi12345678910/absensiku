<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>
                    </div>

                    <div class="row">
                        <div class="body">
                            <div class="col-xs-12 table-responsive">
                                
                                <table class="table table-bordered table-hover js-basic-example-rekap-absen dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Karyawan</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Point Masuk</th>
                                            <th>Point Pulang</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <?php $no = 1; foreach ($q_rekap_absen as $row): ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo tgl_in($row->absen_date); ?></td>
                                            <td><?php echo $row->user_name; ?></td>
                                            <td><?php echo date('H:i', strtotime($row->absen_masuk)); ?></td>

                                            <td <?php if (empty($row->absen_pulang)) { echo 'class="danger"'; }  ?>>
                                                <?php
                                                    if (!empty($row->absen_pulang)) 
                                                    {
                                                        echo date('H:i', strtotime($row->absen_pulang));
                                                    } 
                                                ?>  
                                            </td>
                                            <td><?php echo $row->absen_masuk_poin; ?></td>
                                            <td <?php if (empty($row->absen_pulang)) { echo 'class="danger"'; }  ?>>
                                                <?php echo $row->absen_pulang_poin; ?>        
                                            </td>
                                            <td>
                                                <?php echo anchor('rekap_absen/show/'.$row->absen_id, 'DETAIL', array('class' => 'btn btn-info btn-xs waves-effect')); ?>
                                                    
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach ?>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
