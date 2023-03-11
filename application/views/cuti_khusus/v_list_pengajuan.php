<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>
                    </div>
                    <?php if ($template_show_role == 1 || $template_show_role == 2 || $template_show_role == 3 || $template_show_role == 4 ||$template_show_role == 5 || $template_show_role == 6): ?>

                        <div style="margin: 20px 20px;">
                            <a href="<?php echo site_url('cuti_khusus'); ?>"  class="btn btn-danger"><i class="material-icons long" >add</i><span>Pengajuan</span></a>
                        </div>
                    <?php endif ?>
                    <div class="body">
                    <div class="table table-responsive">
                       <table class="table table-bordered table-hover js-basic-example dataTable font-12">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>

                                    <?php if ($template_show_role == 1 || $template_show_role == 2 || $template_show_role == 3 || $template_show_role == 4 || $template_show_role == 5): ?>
                                        <th>Karyawan</th>
                                    <?php elseif ($template_show_role == 3 && $template_show_jabatan == 4): ?>
                                        <th>Karyawan</th> 
                                    <?php endif ?>
                                    <?php if ($template_show_role == 1 || $template_show_role == 4): ?>
                                        <th>Jabatan</th>
                                    <?php elseif ($template_show_role == 3 && $template_show_jabatan == 4): ?>
                                        <th>Jabatan</th> 
                                    <?php endif ?>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Sampai</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; foreach ($is_view as $row): ?>
                                    <tr>
                                        <td align="center"><?php echo $no++; ?></td>
                                        <td><?php echo tgl_in($row->is_pengajuan_date); ?></td>

                                        <?php if ($template_show_role == 1 || $template_show_role == 2 || $template_show_role == 3 || $template_show_role == 4 || $template_show_role == 5): ?>
                                            <td><?php echo ucwords($row->user_name); ?></td>
                                        <?php elseif ($template_show_role == 3 && $template_show_jabatan == 4): ?>
                                            <td><?php echo ucwords($row->user_name); ?></td> 
                                        <?php endif ?>
                                        <?php if ($template_show_role == 1 || $template_show_role == 4): ?>
                                            <td><?php echo ucwords($row->jabatan_name); ?></td>
                                        <?php elseif ($template_show_role == 3 && $template_show_jabatan == 4): ?>
                                            <td><?php echo ucwords($row->jabatan_name); ?></td> 
                                        <?php endif ?>
                                        <td><?php echo ucwords($row->is_name); ?></td>
                                        <td><?php echo ucwords($row->is_type); ?></td>
                                        <td><?php echo tgl_in($row->is_mulai); ?></td>
                                        <td><?php echo tgl_in($row->is_sampai); ?></td>
                                        <td>
                                            <?php
                                               if ($row->is_status == 'diterima') 
                                               {
                                                   echo "<span  class='col-teal'>Diterima</span>";
                                               }  
                                               elseif ($row->is_status == 'ditolak')
                                               {
                                                   echo "<span  class='col-red'>Ditolak</span>";
                                               }
                                               elseif ($row->is_status == 'diteruskan')
                                               {
                                                   echo "<span  class='col-yellow'>Diteruskan</span>";
                                               }
                                               elseif ($row->is_status == 'diminta')
                                                {
                                                    echo "<span  class='col-orange'>Diajukan</span>";
                                                }
                                                elseif ($row->is_status == 'ditolak2')
                                                {
                                                    echo "<span  class='col-red'>Ditolak</span>";
                                                }
                                               else
                                               {
                                                   echo "<span  class='col-orange'>Diajukan</span>";
                                               }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php if ($template_show_role == 3 && $row->is_user == 4 ): ?>

                                            <?php 
                                                echo anchor(site_url('cuti_khusus/list_pengajuan_detail_hrd/'.$row->is_id.'/'.$row->is_user), '<i class="material-icons">search</i>', 
                                                array(
                                                    'class' => 'btn btn-primary btn-xs waves-effect',
                                                    'title' => 'Lihat'
                                                )); 
                                            ?>
                                            <?php endif ?>
                                            <?php if ($template_show_role == 4 && $row->is_user == 4): ?>

                                                <?php 
                                                    echo anchor(site_url('cuti_khusus/list_pengajuan_detail_hrd/'.$row->is_id.'/'.$row->is_user), '<i class="material-icons">search</i>', 
                                                    array(
                                                        'class' => 'btn btn-primary btn-xs waves-effect',
                                                        'title' => 'Lihat'
                                                    )); 
                                                ?>
                                                <?php endif ?>
                                            <?php if ( $row->is_user != 4 ): ?>

                                            <?php 
                                                echo anchor(site_url('cuti_khusus/list_pengajuan_detail/'.$row->is_id.'/'.$row->is_user), '<i class="material-icons">search</i>', 
                                                array(
                                                    'class' => 'btn btn-primary btn-xs waves-effect',
                                                    'title' => 'Lihat'
                                                )); 
                                            ?>
                                            <?php endif ?>
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

    </div>
</section>