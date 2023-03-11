<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2>
                            <?php echo $title_page; ?>
                            <button type="button" class="btn bg-grey btn-sm waves-effect pull-right" onclick="javascript:history.back()"><span ></span> KEMBALI</button>
                        </h2>
                    </div>

                    <?php if ($q_todo_kerja->num_rows() < 1): ?>

                        <div class="body four-zero-four">
                            <div class="four-zero-four-container">
                                <div class="error-message">Belum ada todo list pada program kerja tersebut.</div>
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="row">
                            <div class="body">
                                <div class="col-xs-12 table-responsive">

                                    <table class="table table-bordered table-hover js-basic-example dataTable font-12">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Nama Todo List</th>
                                                <th>Deskripsi Todo List</th>
                                                <th>Status</th>
                                                <th>Waktu Selesai</th> 
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1; foreach ($q_todo_kerja->result() as $row): ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo ucwords($row->user_name); ?></td>
                                                    <td><?php echo ucwords($row->todo_name); ?></td>
                                                    <td><?php echo ucwords($row->todo_desk); ?></td>
                                                    <td><?php echo ucwords($row->todo_status); ?></td>
                                                    <td>
                                                        <?php  
                                                            if (!empty($row->todo_tgl_done)) {
                                                                echo datetime_in($row->todo_tgl_done);
                                                            } else {
                                                                echo "";
                                                            }
                                                        ?>     
                                                    </td> 
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        </div>

    </div>
</section>