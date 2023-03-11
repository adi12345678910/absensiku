<style type="text/css">   
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 
        .font_pengajuan {
            font-size: 12px;
        }

        #br_1 {
            margin-bottom: -18px;
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
            margin-bottom: -18px;
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
            margin-bottom: -18px;
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
            margin-bottom: -18px;
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
}
</style>

<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>
                    </div>
    
                    <div class="body">
                        <?php foreach ($is_view as $row): ?>

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
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->user_jabatan); ?></div>
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
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Pengajuan</div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->is_name); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Kategori</div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo ucwords($row->is_type); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">Keterangan</div>
                                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-9">: <?php echo $row->is_ket; ?></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">Dari Tanggal</div>
                                                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">: <?php echo tgl_in($row->is_mulai); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">Sampai Tanggal</div>
                                                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">: <?php echo tgl_in($row->is_sampai); ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">Durasi</div>
                                                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">: <?php echo $row->is_durasi; ?> Hari</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">Digantikan Oleh</div>
                                                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">: <?php echo $row->is_alternate; ?> </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="bts_view_s">
                                                            Dengan bukti sebagai berikut : 
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-3 col-xs-12">
                                    <center>
                                        <img class="img-responsive thumbnail image-bukti" src="<?php echo base_url('assets/images/cuti_khusus/'.$row->is_file); ?>">
                                    </center>
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
                                    <div class="modal-content modal-col-teal">

                                        <div class="modal-header text-center">
                                            <h4 class="modal-title" id="smallModalLabel">KETERANGAN DITERIMA</h4>
                                        </div>
                                        
                                        <?php if ($template_show_role == 5 || $template_show_role == 3 || $template_show_role == 2): ?>
                                            <?php echo form_open('cuti_khusus/inbox_persetujuan'); ?>
                                                <div class="modal-body">
                                                    <input type="hidden" name="is_id" value="<?php echo $row->is_id; ?>">
                                                    <input type="hidden" name="is_user" value="<?php echo $row->is_user; ?>">
                                                    <input type="hidden" name="is_status" value="disetujui">
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <textarea rows="4" class="form-control no-resize" name="is_status_ket" placeholder="Silahkan isi keterangannya..."></textarea>
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
                                        <?php endif ?>

                                        <?php if ($template_show_role == 4 || $template_show_role == 1): ?>
                                            <?php echo form_open('cuti_khusus/inbox_persetujuan'); ?>
                                                <div class="modal-body">
                                                    <input type="hidden" name="is_id" value="<?php echo $row->is_id; ?>">
                                                    <input type="hidden" name="is_user" value="<?php echo $row->is_user; ?>">
                                                    <input type="hidden" name="is_status" value="diterima">

                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <textarea rows="4" class="form-control no-resize" name="is_status_ket" placeholder="Silahkan isi keterangannya..."></textarea>
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
                                        
                                        <?php echo form_open('cuti_khusus/inbox_persetujuan'); ?>
                                            <div class="modal-body">
                                                <input type="hidden" name="is_id" value="<?php echo $row->is_id; ?>">
                                                <input type="hidden" name="is_user" value="<?php echo $row->is_user; ?>">
                                                <input type="hidden" name="is_status" value="ditolak">

                                                <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea rows="4" class="form-control no-resize" name="is_status_ket" placeholder="Silahkan isi keterangannya..."></textarea>
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

                        <?php endforeach ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>