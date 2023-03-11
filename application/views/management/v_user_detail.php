<?php foreach ($qUserBy as $row): ?>
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2 class="title-user"><?php echo $title_page; ?></h2>
                    </div>
                    
                    <div class="body demo-masked-input">
                        <div class="row">

                            <div class="col-lg-12 detail-user">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">NIK</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                        <?php echo $row->user_nik; ?>        
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Nama Lengkap</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                        <?php echo ucwords($row->user_name); ?>        
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Tanggal Lahir</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                        <?php echo tgl_in($row->user_tgl_lhr); ?>        
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Jenis Kelamin</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                        <?php
                                            if ($row->user_gender == 'l') 
                                            {
                                                echo "Laki - laki";
                                            }
                                            elseif ($row->user_gender == 'p') 
                                            {
                                                echo "Perempuan";
                                            }
                                            else
                                            {
                                                echo "Tidak diketahui";
                                            }
                                        ?> 
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">No Handphone</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6"><?php echo $row->user_hp; ?></div>  
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">E-mail</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6"><?php echo $row->user_email; ?></div>  
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Alamat</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                        <?php echo ucwords($row->user_alamat); ?>     
                                    </div>  
                                </div>
                                    <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Jumlah Cuti</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                    <?php echo $row->sisa_cuti; ?>    
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Jumlah Remote</div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">:</div>
                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
                                    <?php echo $row->sisa_remote; ?>    
                                    </div>  
                                </div>
                                

                                <?php echo anchor('user', 'KEMBALI', array('class' => 'btn bg-grey waves-effect button-kembali-user')); ?>
                                <button type="button" class="btn btn-warning waves-effect button-edit-user">EDIT</button>
                                <?php echo anchor('user/delete/'.$row->user_id, 'HAPUS', array(
                                                    'class' => 'btn btn-danger waves-effect button-hapus-usert',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus user ".ucwords($row->user_name)." ?');"
                                                )); ?>
                                                   </div>
                            
                            <?php echo form_open('user/update'); ?>
                            <div class="col-lg-12 edit-user">
                                <div class="row clearfix">

                                    <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">

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
    
                                    <div class="col-lg-12" style="margin-bottom: -50px;">
                                       <div class="row">
                                            <div class="col-sm-7">
                                                <div class="row">

                                                    <div class="col-sm-4">
                                                        <label for="user_email">Email</label>

                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" name="user_email" id="user_email" class="form-control email" value="<?php echo $row->user_email; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="user_alamat">Alamat</label>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea name="user_alamat" rows="1" id="user_alamat" class="form-control no-resize" style="height: 35px;"><?php echo ucwords($row->user_alamat); ?> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-2">
                                                <label for="user_hp">Number HP</label>

                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="user_hp" id="user_hp" class="form-control mobile-phone-number-id" value="<?php echo $row->user_hp; ?>" style="text-transform:capitalize;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="user_status">Status</label>

                                                <div class="form-group">
                                                    <div class="demo-radio-button" style="margin-top: 10px;">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input name="user_status" class="radio-col-green" type="radio" id="radio_3" value="1" <?php if ($row->user_status == 1) {echo "checked";} ?> />
                                                                <label for="radio_3">Aktif</label>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <input name="user_status" class="radio-col-red" type="radio" id="radio_4" value="0" <?php if ($row->user_status == 0) {echo "checked";} ?> />
                                                                <label for="radio_4">Tidak Aktif</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-sm-4">
                                                <label for="sisa_cuti">Tambah Cuti Tahunan</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="sisa_cuti"  id="sisa_cuti" class="form-control" value="<?php echo ucwords($row->sisa_cuti); ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="sisa_cuti">Tambah Remote</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" name="sisa_remote"  id="sisa_remote" class="form-control" value="<?php echo ucwords($row->sisa_remote); ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                    <div class="col-lg-12" style="margin-bottom: -60px;">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="user_divisi">Divisi</label>
                                                    <div class="form-line">
                                                    <select name="user_divisi" id="divisi_id" class="form-control" >
                                                        <option value="" disabled>Silahkan Pilih</option>
                                                        <?php foreach ($datakategori as $rowKategori): ?>
                                                            <option value="<?php echo $rowKategori->divisi_id; ?>"  <?php if ($row->user_divisi == $rowKategori->divisi_id) {echo "selected";} ?>>
                                                        <?php echo ucwords($rowKategori->divisi_name); ?>        
                                                        </option>
                                                            <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="user_posisi">Posisi</label>
                                                    <div class="form-line">
                                                        <select name="user_posisi" id="posisi_idi" class="form-control" >
                                                            <option value="" disabled>Silahkan Pilih</option>
                                                            <?php foreach ($dataposisi as $rowKategori): ?>
                                                                <option value="<?php echo $rowKategori->posisi_id; ?>"  <?php if ($row->user_posisi == $rowKategori->posisi_id) {echo "selected";} ?>>
                                                            <?php echo ucwords($rowKategori->posisi_name); ?>        
                                                            </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>        
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="user_jabatan">Jabatan</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select name="user_jabatan" id="jabatan_idi" class="form-control" required>
                                                            <option value="" disabled>Silahkan Pilih</option>
                                                            <?php foreach ($datajabatan as $rowKategori): ?>
                                                                <option value="<?php echo $rowKategori->jabatan_id; ?>"  <?php if ($row->user_jabatan == $rowKategori->jabatan_id) {echo "selected";} ?>>
                                                            <?php echo ucwords($rowKategori->jabatan_name); ?>        
                                                            </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                    <div class="col-lg-12" style="margin-bottom: 40px;">
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
                                    </div>

                                    <div class="col-lg-12" style="margin-bottom: 5px;">
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <br>
                                                <button type="button" class="btn bg-grey waves-effect button-batal-user">BATAL</button>
                                                <button type="submit" class="btn btn-primary waves-effect button-simpan-user">SIMPAN</button> 
                                            </div>
                                            
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

    </div>
</section>
<?php endforeach ?>