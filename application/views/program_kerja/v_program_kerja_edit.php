<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>
        
        <?php foreach ($q_program_kerja as $row): ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>
                    </div>

                    <?php if ($kerja_lembaga != $row->kerja_lembaga): ?>
                        
                        <div class="body four-zero-four">
                            <div class="four-zero-four-container">
                                <div class="error-message">Halaman ini tidak tersedia untuk anda.</div>
                                <div class="button-place">
                                    <button type="button" class="btn btn-default btn-sm waves-effect" onclick="javascript:history.back()"><span ></span> KEMBALI</button>
                                </div>
                            </div>
                        </div>

                    <?php else: ?>

                        <div class="body">
                            <?php echo form_open('program_kerja/update'); ?>

                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Nama Program Kerja</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="hidden" class="form-control" name="program_id" value="<?php echo $row->kerja_id; ?>">
                                                <input type="text" class="form-control" name="program_nama" style="text-transform: capitalize;" value="<?php echo $row->kerja_name; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Priode Program Kerja</label>
                                        <div class="form-group">

                                            <div class="row">
                                                <div class="col-md-7 col-xs-7">
                                                    <select class="form-control show-tick" name="program_bulan" data-live-search="true">
                                                        <option value="" disabled>Pilih Bulan</option>
                                                        <option value="1" <?php if ($row->kerja_periode_bulan == 1) {echo "selected";} ?>>Januari</option>
                                                        <option value="2" <?php if ($row->kerja_periode_bulan == 2) {echo "selected";} ?>>Februari</option>
                                                        <option value="3" <?php if ($row->kerja_periode_bulan == 3) {echo "selected";} ?>>Maret</option>
                                                        <option value="4" <?php if ($row->kerja_periode_bulan == 4) {echo "selected";} ?>>April</option>
                                                        <option value="5" <?php if ($row->kerja_periode_bulan == 5) {echo "selected";} ?>>Mei</option>
                                                        <option value="6" <?php if ($row->kerja_periode_bulan == 6) {echo "selected";} ?>>Juni</option>
                                                        <option value="7" <?php if ($row->kerja_periode_bulan == 7) {echo "selected";} ?>>Juli</option>
                                                        <option value="8" <?php if ($row->kerja_periode_bulan == 8) {echo "selected";} ?>>Agustus</option>
                                                        <option value="9" <?php if ($row->kerja_periode_bulan == 9) {echo "selected";} ?>>September</option>
                                                        <option value="10" <?php if ($row->kerja_periode_bulan == 10) {echo "selected";} ?>>Oktober</option>
                                                        <option value="11" <?php if ($row->kerja_periode_bulan == 11) {echo "selected";} ?>>November</option>
                                                        <option value="12" <?php if ($row->kerja_periode_bulan == 12) {echo "selected";} ?>>Desember</option>
                                                    </select> 
                                                </div>

                                                <div class="col-md-5 col-xs-5">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="program_tahun" placeholder="Tahun" value="<?php echo $row->kerja_periode_tahun; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Deskripsi Program Kerja</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="program_desk" class="form-control no-resize" style="height: 50px;"><?php echo $row->kerja_desk; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                <?php echo anchor('program_kerja/', 'KEMBALI', array('class' => 'btn bg-grey waves-effect')); ?>
                                <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

                            </form>
                        </div>
                        
                    <?php endif ?>

                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>
</section>