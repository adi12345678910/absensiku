<?php foreach ($q_rekap_absen_by->result() as $row): ?>

<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>

                    </div>

                    <div class="body">
                    <?php echo form_open_multipart('rekap_absen/edit_rekap'); ?>

                            <input type="hidden" name="absen_id" value="<?php echo ucwords($row->absen_id); ?>">
                            <br>

                            <label>Status Absen Masuk</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="jarak" value="<?php echo ucwords($row->jarak); ?>" required>
                                </div><br>
                                <small>Masukan Angka 1 untuk merubah Status Absen</small>
                            </div>

                            <?php echo anchor('rekap_absen/show/'.$row->absen_id, 'BATAL', array('class' => 'btn btn-warning waves-effect')); ?>
                            <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>


<?php endforeach ?>