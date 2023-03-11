<?php foreach ($qUserBy as $row): ?>
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2 class="title-user"><?php echo $title_page; ?></h2>
                    </div>
                    
                    <div class="body">
                        <?php echo form_open('karyawan/update'); ?>
                            <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">

                            <div class="row clearfix">

                                    

                                    <div class="col-lg-12" style="margin-bottom: -50px;">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="user_name">NIK</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_nik"  id="user_name" class="form-control" value="<?php echo $row->user_nik; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="user_name">Nama Lengkap</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_name"  id="user_name" class="form-control" value="<?php echo ucwords($row->user_name); ?>  " style="text-transform:capitalize;" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="user_tgl_lhr">Tanggal Lahir</label>

                                                <?php
                                                    if ($row->user_tgl_lhr == 0000-00-00) 
                                                    {
                                                        $tgl_lhr = tgl_en(date('Y-m-d'));
                                                    }
                                                    else
                                                    {
                                                        $tgl_lhr = tgl_en($row->user_tgl_lhr);
                                                    }
                                                ?>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_tgl_lhr" id="user_tgl_lhr" class="datepicker form-control" value="<?php echo $tgl_lhr; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label>Jenis Kelamin</label>

                                                <div class="form-group">
                                                    <div class="demo-radio-button" style="margin-top: 10px;">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input name="user_gender" class="radio-col-blue" type="radio" id="radio_1" value="1" <?php if ($row->user_gender == 'l') {echo "checked";} ?> />
                                                                <label for="radio_1">Laki-laki</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <input name="user_gender" class="radio-col-pink" type="radio" id="radio_2" value="0" <?php if ($row->user_gender == 'p') {echo "checked";} ?> />
                                                                <label for="radio_2">Perempuan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-bottom: -30px;">
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <label for="user_divisi">Divisi</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_divisi" id="user_divisi" class="form-control" value="<?php echo $row->user_divisi; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="user_posisi">Posisi</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_posisi" id="user_posisi" class="form-control" value="<?php echo $row->user_posisi; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="user_jabatan">Jabatan</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_jabatan" id="user_jabatan" class="form-control" value="<?php echo $row->user_jabatan; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="user_email">Email</label>

                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_email" id="user_email" class="form-control email" value="<?php echo $row->user_email; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-bottom: -60px;">
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <label for="user_lembaga">Lembaga</label>

                                                <select name="user_lembaga" id="user_lembaga" class="form-control show-tick" data-live-search="true">
                                                    <option value="" disabled>Silahkan Pilih</option>
                                                    <?php foreach ($qLembaga as $rowLembaga): ?>
                                                        <option value="<?php echo $rowLembaga->lembaga_id; ?>" <?php if ($row->user_lembaga == $rowLembaga->lembaga_id) {echo "selected";} ?>>
                                                            <?php echo ucwords($rowLembaga->lembaga_name); ?>        
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="user_role">Role</label>

                                                <select name="user_role" id="user_role" class="form-control show-tick" data-live-search="true">
                                                    <option value="" disabled>Silahkan Pilih</option>
                                                    <?php foreach ($qRole as $rowRole): ?>
                                                        <option value="<?php echo $rowRole->role_id; ?>" <?php if ($row->user_role == $rowRole->role_id) {echo "selected";} ?>>
                                                            <?php echo ucwords($rowRole->role_name); ?>        
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-5">
                                                <label for="user_password">
                                                    Password
                                                </label>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group" style="margin-top: 10px;">
                                                            <input type="checkbox" id="basic_checkbox_2" class="filled-in ceklis-ubah-password-for-admin" />
                                                            <label for="basic_checkbox_2">Edit</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9 col-md-offset-1 ubah-password-for-admin collapse">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="user_password" id="user_password" class="form-control" placeholder="Masukan Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-bottom: -20px;">
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <br>
                                                <button type="button" class="btn bg-grey waves-effect button-batal-user">BATAL</button>
                                                <button type="submit" class="btn btn-primary waves-effect button-simpan-user">SIMPAN</button> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<?php endforeach ?>