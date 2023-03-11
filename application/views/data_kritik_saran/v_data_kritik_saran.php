<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2>DATA <?php echo $title_page; ?></h2>
                    </div>

                    <div class="row">
                        <div class="body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable font-12">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Karyawan</th>
                                            <th>Kategori</th>
                                            <th>Text</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($q_ks as $row): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo datetime_in($row->ks_date); ?></td>
                                                <td><?php echo ucwords(strtolower($row->user_name)); ?></td>
                                                <td><?php echo ucwords($row->ks_status); ?></td>
                                                <td><?php echo ucfirst($row->ks_text); ?></td>
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

    </div>
</section>