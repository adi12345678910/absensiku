<style type="text/css">    
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 

        #head_s {
            font-size: 15px;
        }
    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 

        #head_s {
            font-size: 16px;
        }
    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {

        #head_s {
            font-size: 17px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {

        #head_s {
            font-size: 18px;
        }
    }
}
</style>

<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2 id="head_s"><?php echo $title_page; ?></h2>
                    </div>

                    <?php if ($url_4 != $user_id_pf): ?>
                        <div class="body four-zero-four">
                            <div class="four-zero-four-container">
                                <div class="error-code" style="font-size: 120px;">404</div>
                                <div class="error-message">Halaman ini tidak ada.</div>
                                <div class="button-place">
                                    <button type="button" class="btn bg-grey btn-lg waves-effect" onclick="javascript:history.back()">KEMBALI</button>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php if ($qPendidikanFormal->num_rows() < 1): ?>
                            <div class="body four-zero-four">
                                <div class="four-zero-four-container">
                                    <div class="error-code" style="font-size: 120px;">404</div>
                                    <div class="error-message">Halaman ini tidak ada.</div>
                                    <div class="button-place">
                                        <button type="button" class="btn bg-grey btn-lg waves-effect" onclick="javascript:history.back()">KEMBALI</button>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>

                            <?php foreach ($qPendidikanFormal->result() as $row): ?>
                                <div class="body">
                                    <?php echo form_open('pengalaman_kerja/update'); ?>

                                        <input type="hidden" name="pengalaman_kerja_id" value="<?php echo $row->pengalaman_kerja_id; ?>">

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label>Nama Perusahaan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="pengalaman_kerja_nama_perusahaan" placeholder="Silahkan isi nama perusahaan" value="<?php echo ucwords($row->pengalaman_kerja_nama_perusahaan); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <label>Jabatan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="pengalaman_kerja_jab" placeholder="Silahkan isi tempat" value="<?php echo ucwords($row->pengalaman_kerja_jab); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <label>..s/d..</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="pengalaman_kerja_s_d" value="<?php echo ucwords($row->pengalaman_kerja_s_d); ?>">
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-2">
                                                <label>Keterangan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="pengalaman_kerja_ket" value="<?php echo ucwords($row->pengalaman_kerja_ket); ?>">
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>

                                        <?php echo anchor('pengalaman_kerja', 'KEMBALI', array('class' => 'btn bg-grey waves-effect')); ?>

                                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                                    </form>
                                    
                                </div>
                            <?php endforeach ?>

                        <?php endif ?>
                    <?php endif ?>

                </div>
            </div>
        </div>

    </div>
</section>