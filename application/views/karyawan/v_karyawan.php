<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>

                        
                    </div>

                    <div class="row">
                        <div class="body">
                            <div class="col-xs-12 table-responsive">

                                <table class="table table-bordered table-hover js-basic-example-user dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Role</th>
                                            <th>Lembaga</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($qUser as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->user_nik; ?></td>
                                            <td><?php echo ucwords(strtolower($row->user_name)); ?></td>
                                            <td><?php echo ucwords($row->role_name); ?></td>
                                            <td><?php echo ucwords($row->lembaga_name); ?></td>
                                            <td>
                                                <?php 
                                                    if ($row->user_status == 1) 
                                                    {
                                                        echo "Aktif";
                                                    }
                                                    else
                                                    {
                                                        echo "Tidak Aktif";
                                                    }
                                                ?>        
                                            </td>
                                            <td>
                                                <?php echo anchor('karyawan/show/'.$row->user_id, 'DETAIL', array('class' => 'btn btn-info btn-xs waves-effect')); ?>
                                            </td>
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



<!-- Large Size -->
<!-- <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
            <?php echo form_open('karyawan/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Formulir Pendaftaran User Baru</h2>
                    </div>
                    
                    <div class="modal-body demo-masked-input">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="user_name">NIK</label>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="user_nik"  id="user_name" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="user_name">Nama Lengkap</label>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="user_name"  id="user_name" class="form-control" style="text-transform:capitalize;" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="user_tgl_lhr">Tanggal Lahir</label>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="user_tgl_lhr" id="user_tgl_lhr" class="datepicker form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label>Jenis Kelamin</label>

                                        <div class="form-group">
                                            <div class="demo-radio-button" style="margin-top: 10px;">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input name="user_gender" class="radio-col-blue" type="radio" id="radio_1" checked />
                                                        <label for="radio_1">Laki-laki</label>
                                                    </div>

                                                    <div class="col-md-5">
                                                        <input name="user_gender" class="radio-col-pink" type="radio" id="radio_2" />
                                                        <label for="radio_2">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="row">

                                    <div class="col-sm-7">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <label for="user_alamat">Alamat</label>

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea name="user_alamat" rows="1" id="user_alamat" class="form-control no-resize" style="height: 35px;" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <label for="user_hp">Number HP</label>

                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="user_hp" id="user_hp" class="form-control mobile-phone-number-id" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label for="user_status">Status</label>

                                        <div class="form-group">
                                            <div class="demo-radio-button" style="margin-top: 10px;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input name="user_status" class="radio-col-green" type="radio" id="radio_3" checked />
                                                        <label for="radio_3">Aktif</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <input name="user_status" class="radio-col-red" type="radio" id="radio_4" />
                                                        <label for="radio_4">Tidak Aktif</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> 
                            </div>

                            <div class="col-lg-12">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <label for="user_divisi">Divisi</label>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="user_divisi" id="user_divisi" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="user_jabatan">Jabatan</label>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="user_jabatan" id="user_jabatan" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="user_email">Email</label>

                                        <div class="input-group">
                                            <div class="form-line">
                                                <input type="text" name="user_email" id="user_email" class="form-control email" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <label for="user_lembaga">Lembaga</label>

                                        <select name="user_lembaga" id="user_lembaga" class="form-control show-tick" data-live-search="true" required>
                                            <option value="" selected disabled>Silahkan Pilih</option>
                                            <?php foreach ($qLembaga as $rowLembaga): ?>
                                                <option value="<?php echo $rowLembaga->lembaga_id; ?>">
                                                    <?php echo ucwords($rowLembaga->lembaga_name); ?>        
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="user_role">Role</label>

                                        <select name="user_role" id="user_role" class="form-control show-tick" data-live-search="true" required>
                                            <option value="" selected disabled>Silahkan Pilih</option>
                                            <?php foreach ($qRole as $rowRole): ?>
                                                <option value="<?php echo $rowRole->role_id; ?>">
                                                    <?php echo ucwords($rowRole->role_name); ?>        
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                     <div class="col-sm-4">
                                        <label for="user_password">Password</label>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="user_password" id="user_password" class="form-control" placeholder="Masukan Password" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">

                                    <div class="col-sm-3">
                                        <br>
                                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button> 
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form> -->

        </div>
    </div>
</div>