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
                        <?php if ($template_show_role == 1 || $template_show_role == 4): ?>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" kategori="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/kategori'); ?>" >Master Data</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php endif ?>
                    </div>

                    
                    <div class="body">
                       <?php echo form_open_multipart('cuti_khusus/pengajuan_cuti_khusus'); ?>
                            <div class="row font_pengajuan">
 
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="br_1_bts">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1">
                                            <div class="form-group">
                                             <label>Jenis Cuti</label>
                                            <select name="is_type" id="kategori_id" class="form-control" required>
                                                <option value="" selected disabled>Silahkan Pilih</option>
                                                <?php foreach ($datakategoricuti as $rowKategori): ?>
                                                    <option value="<?php echo $rowKategori->kategori_name; ?>">
                                                        <?php echo ucwords($rowKategori->kategori_name); ?>        
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            </div>                                            
                                        </div>   
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control font_pengajuan" rows="5" name="is_ket" placeholder="Silahkan isi keterangan Cuti" required>
                                                </div>
                                            </div>
                                        </div>                                     
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="br_1_bts">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1">
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <div class="form-line">
                                                    <input type="text" name="is_mulai" class="date-start datepicker form-control font_pengajuan" placeholder="Silahkan isi" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="br_1">
                                            <div class="form-group">
                                                <label>Sampai Tanggal</label>
                                                <div class="form-line">
                                                    <input type="text" name="is_sampai" class="date-end datepicker form-control font_pengajuan" placeholder="Silahkan isi" required>
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
                                                    <select type="text" class="is_alternate form-control" style= "width:200px" id ="is_alternate" name="is_alternate" placeholder="Silahkan isi" required></select>                                                    
                                            </div>


                                        </div>

                                    </div>
                                </div>                                
                               
                                
                                <div class="col-lg-12 col-xs-12" style="margin-top: 190px;">
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>" class="btn bg-grey btn-sm waves-effect mr-5"><i class="material-icons long" >subdirectory_arrow_left</i><span>Batal</span></a>
                                    <button type="submit" class="btn btn-primary mr-5"><i class="material-icons long" >send</i><span>Kirim </span></button>
                                </div>
                            </div>
                        </form> 
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>