<style type="text/css">    
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 

        #head_s {
            font-size: 15px;
        }

        #head_small_s {
            font-size: 10px;
        }
    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 

        #head_s {
            font-size: 16px;
        }

        #head_small_s {
            font-size: 11px;
        }
    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {

        #head_s {
            font-size: 17px;
        }

        #head_small_s {
            font-size: 12px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {

        #head_s {
            font-size: 18px;
        }

        #head_small_s {
            font-size: 13px;
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
                        <h2 id="head_s">
                            <?php echo $title_page; ?> :
                            <small id="head_small_s">(suami/istri dan anak)</small>
                        </h2>
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
                        <?php if ($qksatu->num_rows() < 1): ?>
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

                            <?php foreach ($qksatu->result() as $row): ?>
                                <div class="body">
                                
                                    <?php echo form_open('keluarga/susunan_satu_update'); ?>
                                        <div class="row">

                                            <input type="hidden" name="k_satu_id" value="<?php echo $row->k_satu_id; ?>">
                                            <input type="hidden" name="k_satu_user" value="<?php echo $row->k_satu_user; ?>">

                                            <div class="col-lg-2">
                                                <label>Status</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="k_satu_status">
                                                            <option value="suami" <?php if ($row->k_satu_status == 'suami') {echo "selected";} ?>>Suami</option>
                                                            <option value="istri" <?php if ($row->k_satu_status == 'istri') {echo "selected";} ?>>Istri</option>
                                                            <option value="anak" <?php if ($row->k_satu_status == 'anak') {echo "selected";} ?>>Anak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                               <label>Nama</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="k_satu_name" placeholder="Silahkan isi nama" value="<?php echo $row->k_satu_name; ?>">
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-3">
                                                <label  style="margin-bottom: 13px;">Jenis Kelamin</label>
                                                <div class="form-group">
                                                    <input name="k_satu_jk" type="radio" id="radio_1" class="radio-col-cyan" value="l" <?php if ($row->k_satu_jk == 'l') {echo "checked";} ?> />
                                                    <label for="radio_1">Laki - laki</label>

                                                    <input name="k_satu_jk" type="radio" id="radio_2" class="radio-col-pink" value="p" <?php if ($row->k_satu_jk == 'p') {echo "checked";} ?> />
                                                    <label for="radio_2">Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <label>Tempat Lahir</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="k_satu_tmpt_lahir" placeholder="Silahkan isi tempat lahir" value="<?php echo $row->k_satu_tmpt_lahir; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-lg-2">
                                                <label>Tanggal Lahir</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="k_satu_tgl_lahir" class="datepicker form-control sp_nikah_date_tgl" placeholder="Silahkan isi tanggal lahir" value="<?php echo tgl_en($row->k_satu_tgl_lahir); ?>" >
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-2">
                                                <label>Pendidikan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="k_satu_pendidikan">
                                                            <?php foreach ($jenisp as $rjp): ?>
                                                                <option value="<?php echo $rjp->formal_jenis_id; ?>" <?php if ($row->k_satu_pendidikan == $rjp->formal_jenis_id) {echo "selected";} ?>><?php echo $rjp->formal_jenis_name; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-4">
                                                <label>Pekerjaan</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="k_satu_pekerjaan" placeholder="Silahkan isi pekerjaan" value="<?php echo $row->k_satu_pekerjaan; ?>">
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
