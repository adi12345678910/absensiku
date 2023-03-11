<style type="text/css"> 
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 
        .font_pengajuan {
            font-size: 12px;
        }

        #br_1 {
            margin-bottom: -10px;
        }

        #br_1_bts {
            margin-bottom: 0px;
        }

        .image-bukti {
            width: 270px;
            height: 200px;
        }

        #bts_view_s {
            margin-bottom: -20px;
        }
    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 
        .font_pengajuan {
            font-size: 13px;
        }

        #br_1 {
            margin-bottom: -10px;
        }

        #br_1_bts {
            margin-bottom: 0px;
        }

        .image-bukti {
            width: 180px;
            height: 160px;
        }

        #bts_view_s {
            margin-bottom: -17px;
        }

    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {
        .font_pengajuan {
            font-size: 14px;
        }

        #br_1 {
            margin-bottom: -10px;
        }

        #br_1_bts {
            margin-bottom: 0px;
        }

        .image-bukti {
            width: 180px;
            height: 160px;
        }

        #bts_view_s {
            margin-bottom: -15px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
       .font_pengajuan {
            font-size: 14px;
        }

        #br_1 {
            margin-bottom: -10px;
        }

        #br_1_bts {
            margin-bottom: 0px;
        }

        .image-bukti {
            width: 250px;
            height: 190px;
        }

        #bts_view_s {
            margin-bottom: -20px;
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
                        <h2><?php echo $title_page; ?></h2>
                    </div>

                    <div class="body">
                        <?php foreach ($is_hrd as $row): ?>
                            <?php if ($row->is_status == 'diterima'): ?>
                                <div class="row">
                                    <div class="col-lg-8 col-sm-8 col-xs-12 font_pengajuan">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" id="br_1_bts">
                                                <p>Tanggal Pengajuan</p>
                                                <p><?php echo tgl_in($row->is_pengajuan_date); ?></p>
                                                <hr>    
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1_bts">
                                                <div class="row">

                                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Nama</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->user_name); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Jabatan</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->jabatan_name); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Divisi</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->divisi_name); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Posisi</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->posisi_name); ?></div>
                                                        </div>
                                                    </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">No. Telp</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->user_hp); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Alamat</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->user_alamat); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Status</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->is_name); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Keterangan</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_ket; ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Pengajuan</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <span class="col-teal"><?php echo ucwords($row->is_status); ?></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Alasan</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <span class="col-cyan"><?php echo $row->is_status_ket; ?></span></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-sm-6 col-xs-12">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Dari Tanggal</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo tgl_in($row->is_mulai); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Sampai Tanggal</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo tgl_in($row->is_sampai); ?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Durasi</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_durasi; ?> Hari</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Sisa Cuti</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->sisa_cuti; ?> Hari</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Digantikan Oleh</div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_alternate; ?> </div>
                                                                </div>
                                                            </div>


                                                         
                                                            

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
 
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-bottom: -5px;">
                                        <button type="button" class="btn bg-grey btn-sm waves-effect" onclick="javascript:history.back()"><span></span> KEMBALI</button>
                                    </div>
                                </div>


























                               

                                <?php elseif ($template_show_role == 4): ?>
                                <?php echo form_open_multipart('cuti_tahunan/list_pengajuan_update_hrd'); ?>
                                    <div class="row font_pengajuan">

                                        <input type="hidden" name="is_id" value="<?php echo $row->is_id; ?>">
                                        <input type="hidden" name="is_user" value="<?php echo $row->is_user; ?>">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="br_1_bts">
                                            <div class="row">

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1">
                                                    <div class="form-group">
                                                        <label>Dari Tanggal</label>
                                                        <div class="form-line">
                                                            <input type="text" name="is_mulai" class="date-start datepicker form-control font_pengajuan" placeholder="Silahkan isi" value="<?php echo tgl_en($row->is_mulai); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1">
                                                    <div class="form-group">
                                                        <label>Sampai Tanggal</label>
                                                        <div class="form-line">
                                                            <input type="text" name="is_sampai" class="date-end datepicker form-control font_pengajuan" placeholder="Silahkan isi" value="<?php echo tgl_en($row->is_sampai); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="br_1_bts">
                                            <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="br_1">
                                                    <div class="form-group">
                                                    <label>Digantikan Oleh</label>
                                                    <select type="text" class="is_alternate form-control" style= "width:200px" id ="is_alternate" name="is_alternate" placeholder="Silahkan isi" required>                                                   
                                                        <option selected enabled><?php echo ucwords($row->is_alternate); ?></option>
                                                    </select> 
                                                    </div>
                                                </div>

                                                
                                            </div>
                                        </div> 

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="br_1">
                                            <div class="form-group">
                                                <label>Keterangan cuti </label>
                                                <div class="form-line">
                                                    <textarea class="form-control font_pengajuan" rows="5" name="is_ket" placeholder="Silahkan isi keterangan cuti_tahunan / cuti_tahunan"><?php echo ucwords($row->is_ket); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p>* Pengajuan : <span class="col-pink"><?php echo ucwords($row->is_status); ?></span> <br> 
                                                * Alasan : <span class="col-cyan"><?php echo $row->is_status_ket; ?></span>.</p>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button type="button" class="btn bg-grey btn-sm waves-effect" onclick="javascript:history.back()"><span></span> KEMBALI</button>
                                            <button type="submit" class="btn btn-primary">AJUKAN LAGI</button>
                                        </div>

                                    </div>
                                </form> 


























                              

                                <?php elseif (  $row->is_user && $row->is_status == 'diminta' ): ?>

                        <div class="row">
                            <div class="col-lg-8 col-sm-9 col-xs-12 font_pengajuan">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" id="br_1_bts">
                                        <p>Tanggal Pengajuan</p>
                                        <p><?php echo tgl_in($row->is_pengajuan_date); ?></p>
                                        <hr>    
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1_bts">
                                        <div class="row">

                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Nama</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->user_name); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Jabatan</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->jabatan_name); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Divisi</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->divisi_name); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Posisi</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->posisi_name); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Pengajuan</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->is_name); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Keterangan</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_ket; ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Status</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_status; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Dari Tanggal</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo tgl_in($row->is_mulai); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Sampai Tanggal</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo tgl_in($row->is_sampai); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Durasi</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_durasi; ?> Hari</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Sisa Cuti</div>
                                                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->sisa_cuti; ?> Hari</div>
                                                        </div>
                                                    </div>

                                                   
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-bottom: -5px;">

                                <button type="button" class="btn bg-grey btn-sm waves-effect" onclick="javascript:history.back()"><span></span> KEMBALI</button>
                                <button type="button" class="btn bg-teal waves-effect" data-toggle="modal" data-target="#terimaModal">TERIMA</button>
                                <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#tolakModal">TOLAK</button>
                            </div>
                        </div>

                        <!-- Small Size -->
                        <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content modal-col-red">

                                    <div class="modal-header text-center">
                                        <h4 class="modal-title" id="smallModalLabel">Apakah anda yakin untuk menerima permohonan ini?</h4>
                                    </div>
                                    
                                    <?php if ($template_show_role == 3 || $template_show_role == 1  ): ?>
                                        <?php echo form_open('cuti_tahunan/inbox_persetujuan'); ?>
                                            <div class="modal-body">
                                            <input type="hidden" name="is_id" value="<?php echo $row->is_id; ?>">
                                                    <input type="hidden" name="is_user" value="<?php echo $row->is_user; ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
                                                    <input type="hidden" name="user_role" value="<?php echo $row->user_role; ?>">
                                                    <input type="hidden" name="is_durasi" value="<?php echo $row->is_durasi; ?>">
                                                    <input type="hidden" name="sisa_cuti" value="<?php echo $row->sisa_cuti; ?>">
                                                    <input type="hidden" name="is_status" value="diterima">
                                                
                                            </div>

                                            <div class="modal-footer align-center">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-info waves-effect">SIMPAN</button>
                                            </div>
                                        </form>
                                    <?php endif ?>

                                </div>
                            </div>
                        </div>

                        <!-- Small Size -->
                        <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content modal-col-red">

                                    <div class="modal-header text-center">
                                        <h4 class="modal-title" id="smallModalLabel">KETERANGAN DITOLAK</h4>
                                    </div>
                                    
                                    <?php echo form_open('cuti_tahunan/inbox_persetujuan'); ?>
                                        <div class="modal-body">
                                            <input type="hidden" name="is_id" value="<?php echo $row->is_id; ?>">
                                            <input type="hidden" name="is_user" value="<?php echo $row->is_user; ?>">
                                            <input type="hidden" name="is_status" value="ditolak2">

                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea rows="4" class="form-control no-resize" name="is_status_ket" placeholder="Silahkan isi keterangannya..." required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer align-center">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">BATAL</button>
                                            <button type="submit" class="btn btn-info waves-effect">SIMPAN</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                                    </div>







                                <?php else: ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>