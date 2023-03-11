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
                                    <?php echo form_open('hobby_atau_kegemaran/update'); ?>

                                        <input type="hidden" name="hk_id" value="<?php echo $row->hk_id; ?>">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Nama Hobby Atau Kegemaran</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="hk_name" placeholder="Silahkan isi nama sekolah" value="<?php echo ucwords($row->hk_name); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php echo anchor('hobby_atau_kegemaran', 'KEMBALI', array('class' => 'btn bg-grey waves-effect')); ?>

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