
<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?> :</h2>
                    </div>

                    
                    <?php if ($url_4 != $user_id_ss): ?>
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
                        <?php if ($qkaw->num_rows() < 1): ?>
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

                            <?php foreach ($qkaw->result() as $row): ?>
                                <div class="body">
                                
                                    <?php echo form_open('keluarga/ahli_waris_update'); ?>
                                        <div class="row">

                                            <input type="hidden" name="ahli_waris_id" value="<?php echo $row->ahli_waris_id; ?>">
                                            <input type="hidden" name="ahli_waris_user" value="<?php echo $row->ahli_waris_user; ?>">

                                            <div class="col-lg-5">
                                               <label>Nama</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="ahli_waris_name" placeholder="Silahkan isi nama" value="<?php echo $row->ahli_waris_name; ?>">
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-7">
                                               <label>Hubungan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="ahli_waris_hub" placeholder="Silahkan isi nama" value="<?php echo $row->ahli_waris_hub; ?>">
                                                    </div>
                                                </div> 
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-4">
                                                <br>
                                                <?php echo anchor('keluarga', 'KEMBALI', array('class' => 'btn bg-grey waves-effect')); ?>
                                                
                                                <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button> 
                                            </div>

                                        </div>
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
