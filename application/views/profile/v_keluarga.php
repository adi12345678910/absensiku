<style type="text/css">    
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 

        #tbl_font {
             font-size: 10px;
        }

        /*status pernikahan*/

        #head_sp {
            font-size: 15px;
        }

        #body_sp {
            font-size: 11px;
        }

        /*keluarga satu*/

        #head_ss1 {
            font-size: 15px;
        }

        #head_small_ss1 {
            font-size: 10px;
        }

        #body_ss1 {
            font-size: 11px;
        }

        /*keluarga dua*/

        #head_ss2 {
            font-size: 15px;
        }

        #head_small_ss2 {
            font-size: 10px;
        }

        #body_ss2 {
            font-size: 11px;
        }

        /*keluarga dua*/

        #head_aw2 {
            font-size: 15px;
        }

        #head_small_aw2 {
            font-size: 10px;
        }

        #body_aw2 {
            font-size: 11px;
        }
    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 
        #tbl_font {
             font-size: 11px;
        }

        /*status pernikahan*/

        #head_sp {
            font-size: 16px;
        }

        #body_sp {
            font-size: 12px;
        }

        /*keluarga satu*/

        #head_ss1 {
            font-size: 16px;
        }

        #head_small_ss1 {
            font-size: 11px;
        }

        #body_ss1 {
            font-size: 12px;
        }

        /*keluarga dua*/

        #head_ss2 {
            font-size: 16px;
        }

        #head_small_ss2 {
            font-size: 11px;
        }

        #body_ss2 {
            font-size: 12px;
        }

        /*keluarga dua*/

        #head_aw2 {
            font-size: 16px;
        }

        #head_small_aw2 {
            font-size: 11px;
        }

        #body_aw2 {
            font-size: 12px;
        }

    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {
        #tbl_font {
             font-size: 12px;
        }

        /*status pernikahan*/

        #head_sp {
            font-size: 17px;
        }

        #body_sp {
            font-size: 13px;
        }

        /*keluarga satu*/

        #head_ss1 {
            font-size: 17px;
        }

        #head_small_ss1 {
            font-size: 12px;
        }

        #body_ss1 {
            font-size: 13px;
        }

        /*keluarga dua*/

        #head_ss2 {
            font-size: 17px;
        }

        #head_small_ss2 {
            font-size: 12px;
        }

        #body_ss2 {
            font-size: 13px;
        }

        /*keluarga dua*/

        #head_aw2 {
            font-size: 17px;
        }

        #head_small_aw2 {
            font-size: 12px;
        }

        #body_aw2 {
            font-size: 13px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
       #tbl_font {
             font-size: 13px;
        }

        /*status pernikahan*/

        #head_sp {
            font-size: 18px;
        }

        #body_sp {
            font-size: 14px;
        }

        /*keluarga satu*/

        #head_ss1 {
            font-size: 18px;
        }

        #head_small_ss1 {
            font-size: 13px;
        }

        #body_ss1 {
            font-size: 14px;
        }

        /*keluarga dua*/

        #head_ss2 {
            font-size: 18px;
        }

        #head_small_ss2 {
            font-size: 13px;
        }

        #body_ss2 {
            font-size: 14px;
        }

        /*keluarga dua*/

        #head_aw2 {
            font-size: 18px;
        }

        #head_small_aw2 {
            font-size: 13px;
        }

        #body_aw2 {
            font-size: 14px;
        }
    }
}
</style>

<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="block-header">
            <h2><?php echo $title_page; ?></h2>
        </div>
        <!-- Basic Card -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 id="head_sp">Status Pernikahan</h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#statusPernikahan">Edit</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body" id="body_sp">
                        <?php echo $qStatusPernikahan; ?>.
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2 id="head_ss1">
                            Susunan Keluarga:
                            <small id="head_small_ss1">(suami / istri dan anak)</small>
                        </h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#susuanKsatu">Tambah</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body" id="body_ss1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-center">STATUS</th>
                                            <th class="align-center">Nama</th>
                                            <th class="align-center">L/P</th>
                                            <th class="align-center">Tempat/Tgl.Lahir</th>
                                            <th class="align-center">Pendidikan</th>
                                            <th class="align-center">Pekerjaan</th>
                                            <th class="align-center">Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if ($k_satu_suami->num_rows() < 1 && $k_satu_istri->num_rows() < 1 && $k_satu_anak->num_rows() < 1): ?>
                                            <tr>
                                                <td  align="center">&nbsp;</td>
                                                <td></td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"></td>
                                            </tr>

                                            <tr>
                                                <td  align="center">&nbsp;</td>
                                                <td></td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"></td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($k_satu_suami->result() as $rowSuami): ?>
                                                <tr>
                                                    <td align="center"><?php echo ucwords($rowSuami->k_satu_status); ?></td>
                                                    <td><?php echo ucwords($rowSuami->k_satu_name); ?></td>
                                                    <td align="center"><?php echo ucwords($rowSuami->k_satu_jk); ?></td>
                                                    <td><?php echo ucwords($rowSuami->k_satu_tmpt_lahir).' / '.tgl_in($rowSuami->k_satu_tgl_lahir); ?></td>
                                                    <td><?php echo $rowSuami->formal_jenis_name; ?></td>
                                                    <td><?php echo ucwords($rowSuami->k_satu_pekerjaan); ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/susunan_satu/'.$rowSuami->k_satu_id.'/'.$rowSuami->k_satu_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/susunan_satu_delete/'.$rowSuami->k_satu_id.'/'.$rowSuami->k_satu_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',
                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($rowSuami->k_satu_name)." ?');"
                                                                )); ?>
                                                    </td>
                                                </tr> 
                                            <?php endforeach ?>

                                            <?php foreach ($k_satu_istri->result() as $rowIstri): ?>
                                                <tr>
                                                    <td align="center"><?php echo ucwords($rowIstri->k_satu_status); ?></td>
                                                    <td><?php echo ucwords($rowIstri->k_satu_name); ?></td>
                                                    <td align="center"><?php echo ucwords($rowIstri->k_satu_jk); ?></td>
                                                    <td><?php echo ucwords($rowIstri->k_satu_tmpt_lahir).' / '.tgl_in($rowIstri->k_satu_tgl_lahir); ?></td>
                                                    <td><?php echo $rowIstri->formal_jenis_name; ?></td>
                                                    <td><?php echo ucwords($rowIstri->k_satu_pekerjaan); ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/susunan_satu/'.$rowIstri->k_satu_id.'/'.$rowIstri->k_satu_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/susunan_satu_delete/'.$rowIstri->k_satu_id.'/'.$rowIstri->k_satu_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',

                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($rowIstri->k_satu_name)." ?');"
                                                                )); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                            <?php $no_a_1 = 1; foreach ($k_satu_anak->result() as $rowAnak): ?>
                                                <tr>
                                                    <td  align="center"><?php echo ucwords($rowAnak->k_satu_status); ?> <?php echo $no_a_1++; ?></td>
                                                    <td><?php echo ucwords($rowAnak->k_satu_name); ?></td>
                                                    <td align="center"><?php echo ucwords($rowAnak->k_satu_jk); ?></td>
                                                    <td><?php echo ucwords($rowAnak->k_satu_tmpt_lahir).' / '.tgl_in($rowAnak->k_satu_tgl_lahir); ?></td>
                                                    <td><?php echo $rowAnak->formal_jenis_name; ?></td>
                                                    <td><?php echo ucwords($rowAnak->k_satu_pekerjaan); ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/susunan_satu/'.$rowAnak->k_satu_id.'/'.$rowAnak->k_satu_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/susunan_satu_delete/'.$rowAnak->k_satu_id.'/'.$rowAnak->k_satu_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',
                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($rowAnak->k_satu_name)." ?');"
                                                                )); ?>
                                                    </td>
                                                </tr> 
                                            <?php endforeach ?>                                    
                                        <?php endif ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2 id="head_ss2">
                            Susunan Keluarga :
                            <small id="head_small_ss2">(ayah, ibu, saudara sekandung, termasuk anda)</small>
                        </h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#susuanKdua">Tambah</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body" id="body_ss2">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-center">STATUS</th>
                                            <th class="align-center">Nama</th>
                                            <th class="align-center">L/P</th>
                                            <th class="align-center">Tempat/Tgl.Lahir</th>
                                            <th class="align-center">Pendidikan</th>
                                            <th class="align-center">Pekerjaan</th>
                                            <th class="align-center">Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if ($k_dua_ayah->num_rows() < 1 && $k_dua_ibu->num_rows() < 1 && $k_dua_anak->num_rows() < 1): ?>
                                            <tr>
                                                <td  align="center">&nbsp;</td>
                                                <td></td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"></td>
                                            </tr>

                                            <tr>
                                                <td  align="center">&nbsp;</td>
                                                <td></td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"></td>
                                            </tr>
                                        <?php else: ?>

                                            <?php foreach ($k_dua_ayah->result() as $rowAyah): ?>
                                                <tr>
                                                    <td align="center"><?php echo ucwords($rowAyah->k_dua_status); ?></td>
                                                    <td><?php echo ucwords($rowAyah->k_dua_name); ?></td>
                                                    <td><?php echo ucwords($rowAyah->k_dua_jk); ?></td>
                                                    <td><?php echo ucwords($rowAyah->k_dua_tmpt_lahir).' / '.tgl_in($rowAyah->k_dua_tgl_lahir); ?></td>
                                                    <td><?php echo $rowAyah->formal_jenis_name; ?></td>
                                                    <td><?php echo ucwords($rowAyah->k_dua_pekerjaan); ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/susunan_dua/'.$rowAyah->k_dua_id.'/'.$rowAyah->k_dua_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/susunan_dua_delete/'.$rowAyah->k_dua_id.'/'.$rowAyah->k_dua_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',
                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($rowAyah->k_dua_name)." ?');"
                                                                )); ?>
                                                    </td>
                                            </tr> 
                                            <?php endforeach ?>

                                            <?php foreach ($k_dua_ibu->result() as $rowIbu): ?>
                                                <tr>
                                                    <td align="center"><?php echo ucwords($rowIbu->k_dua_status); ?></td>
                                                    <td><?php echo ucwords($rowIbu->k_dua_name); ?></td>
                                                    <td><?php echo ucwords($rowIbu->k_dua_jk); ?></td>
                                                    <td><?php echo ucwords($rowIbu->k_dua_tmpt_lahir).' / '.tgl_in($rowIbu->k_dua_tgl_lahir); ?></td>
                                                    <td><?php echo $rowIbu->formal_jenis_name; ?></td>
                                                    <td><?php echo ucwords($rowIbu->k_dua_pekerjaan); ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/susunan_dua/'.$rowIbu->k_dua_id.'/'.$rowIbu->k_dua_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/susunan_dua_delete/'.$rowIbu->k_dua_id.'/'.$rowIbu->k_dua_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',
                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($rowIbu->k_dua_name)." ?');"
                                                                )); ?>
                                                    </td>
                                                </tr> 
                                            <?php endforeach ?>

                                            <?php $no_a_2 = 1; foreach ($k_dua_anak->result() as $rowAnakDua): ?>
                                                <tr>
                                                    <td  align="center"><?php echo ucwords($rowAnakDua->k_dua_status); ?> <?php echo $no_a_2++; ?></td>
                                                    <td><?php echo ucwords($rowAnakDua->k_dua_name); ?></td>
                                                    <td><?php echo ucwords($rowAnakDua->k_dua_jk); ?></td>
                                                    <td><?php echo ucwords($rowAnakDua->k_dua_tmpt_lahir).' / '.tgl_in($rowAnakDua->k_dua_tgl_lahir); ?></td>
                                                    <td><?php echo $rowAnakDua->formal_jenis_name; ?></td>
                                                    <td><?php echo ucwords($rowAnakDua->k_dua_pekerjaan); ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/susunan_dua/'.$rowAnakDua->k_dua_id.'/'.$rowAnakDua->k_dua_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/susunan_dua_delete/'.$rowAnakDua->k_dua_id.'/'.$rowAnakDua->k_dua_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',
                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($rowAnakDua->k_dua_name)." ?');"
                                                                )); ?>
                                                    </td>
                                                </tr> 
                                            <?php endforeach ?>

                                        <?php endif ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2 id="head_aw2">
                            Ahli Waris *) 
                            <small id="head_small_aw2">Apabila terjadi hal-hal yang tidak diinginkan pada diri Anda, siapakah ahli waris yang Anda tunjuk :</small>
                        </h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#ahliWaris">Tambah Ahli Waris</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body" id="body_aw2">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-center">No</th>
                                            <th class="align-center">Nama</th>
                                            <th class="align-center">Hubungan</th>
                                            <th class="align-center">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($ahli_waris->num_rows() < 1): ?>
                                            <tr>
                                                <td  align="center">&nbsp;</td>
                                                <td></td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"></td>
                                            </tr>

                                            <tr>
                                                <td  align="center">&nbsp;</td>
                                                <td></td>
                                                <td align="center"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="center"></td>
                                            </tr>
                                        <?php else: ?>
                                            <?php $no = 1; foreach ($ahli_waris->result() as $rowAW): ?>
                                                <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td><?php echo ucwords($rowAW->ahli_waris_name) ?></td>
                                                    <td><?php echo ucwords($rowAW->ahli_waris_hub) ?></td>
                                                    <td align="center">
                                                        <?php echo anchor('keluarga/ahli_waris/'.$rowAW->ahli_waris_id.'/'.$rowAW->ahli_waris_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>
                                                        
                                                        <?php echo anchor('keluarga/ahli_waris_delete/'.$rowAW->ahli_waris_id.'/'.$rowAW->ahli_waris_user, 'HAPUS', array(
                                                                'id' => 'tbl_font',
                                                                'class' => 'btn btn-danger btn-xs waves-effect',
                                                                'onclick' => "return confirm('Apakah anda yakin menghapus ahli waris ".ucwords($rowAW->ahli_waris_name)." ?');"
                                                                )); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-xs-12">
                                *) Bila anda tidak mengisi kolom di atas, maka ahli waris adalah anggota keluarga yang mempunyai hubungan terdekat dengan Anda.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<!-- Status Pernikahan -->
<div class="modal fade" id="statusPernikahan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <?php echo form_open('keluarga/status_pernikahan'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Status Pernikahan</h2>
                    </div>
                    
                    <div class="modal-body"> 

                        <input type="hidden" name="nikah_id" value="<?php echo $q_nikah_id; ?>">
                        <input type="hidden" name="nikah_user" value="<?php echo $q_nikah_user; ?>">

                        <div class="demo-radio-button">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input name="nikah_status" type="radio" id="radio_1" class="radio-col-purple sp_single" value="single" <?php if ($q_nikah_status == 'single') {echo "checked";} ?> />
                                    <label for="radio_1">Singel / Lajang</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="nikah_status" type="radio" id="radio_2" class="radio-col-cyan sp_menikah" value="nikah" <?php if ($q_nikah_status == 'nikah') {echo "checked";} ?> />
                                    <label for="radio_2">Menikah</label>
                                </div>

                                <div class="col-lg-6">
                                    <input name="nikah_status" type="radio" id="radio_3" class="radio-col-red sp_cerai" value="cerai" <?php if ($q_nikah_status == 'cerai') {echo "checked";} ?> />
                                    <label for="radio_3">Bercerai</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2 collapse sp_nikah_date">
                                    <input type="text" name="nikah_date" class="datepicker form-control sp_nikah_date_tgl" placeholder="Pada tanggal : ?">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer align-center">
                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- SUsunan Keluarga Satu -->
<div class="modal fade" id="susuanKsatu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <?php echo form_open('keluarga/susuan_satu_create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>
                            Tambah Susunan Keluarga : 
                            <small>(suami / istri dan anak)</small>
                        </h2>
                    </div>
                    
                    <div class="modal-body"> 
                        
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <label>Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="k_satu_status">
                                            <?php if ($k_satu_suami->num_rows() > 0): ?>
                                                <option value="anak">Anak</option>
                                            <?php elseif ($k_satu_istri->num_rows() > 0): ?>
                                                <option value="istri">Suami</option>
                                                <option value="anak">Anak</option>
                                            <?php else: ?>
                                                <option value="suami">Suami</option>
                                                <option value="istri">Istri</option>
                                                <option value="anak">Anak</option>
                                            <?php endif ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-xs-12">
                               <label>Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="k_satu_name" placeholder="Silahkan isi nama">
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5 col-xs-12">
                                <label  style="margin-bottom: 13px;">Jenis Kelamin</label>
                                <div class="form-group">
                                    <input name="k_satu_jk" type="radio" id="radio_l" class="radio-col-cyan" value="l" checked />
                                    <label for="radio_l">Laki - laki</label>

                                    <input name="k_satu_jk" type="radio" id="radio_p" class="radio-col-pink" value="p" />
                                    <label for="radio_p">Perempuan</label>
                                </div>
                            </div>

                            <div class="col-lg-7 col-xs-12">
                                <label>Tempat Lahir</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="k_satu_tmpt_lahir" placeholder="Silahkan isi tempat lahir" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                <label>Tanggal Lahir</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="k_satu_tgl_lahir" class="datepicker form-control" placeholder="Silahkan isi tanggal lahir">
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-3">
                                <label>Pendidikan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="k_satu_pendidikan">
                                            <?php foreach ($jenisp as $rjp): ?>
                                                <option value="<?php echo $rjp->formal_jenis_id; ?>"><?php echo $rjp->formal_jenis_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-5">
                                <label>Pekerjaan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="k_satu_pekerjaan" placeholder="Silahkan isi pekerjaan">
                                    </div>
                                </div> 
                            </div>

                        </div>
                                
                        
                    </div>

                    <div class="modal-footer align-center">
                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- SUsunan Keluarga Dua -->
<div class="modal fade" id="susuanKdua" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <?php echo form_open('keluarga/susunan_dua_create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Tambah Susunan Keluarga : <small>(ayah, ibu, saudara sekandung, termasuk anda)</small></h2>
                    </div>
                    
                    <div class="modal-body"> 
                        
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="k_dua_status">
                                            <?php if ($k_dua_ayah->num_rows() > 0): ?>
                                                <option value="ibu">Ibu</option>
                                                <option value="anak">Anak</option>
                                            <?php elseif ($k_dua_ibu->num_rows() > 0): ?>
                                                <option value="ayah">Ayah</option>
                                                <option value="anak">Anak</option>
                                            <?php else: ?>
                                                <option value="ayah">Ayah</option>
                                                <option value="ibu">Ibu</option>
                                                <option value="anak">Anak</option>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                               <label>Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="k_dua_name" placeholder="Silahkan isi nama">
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <label  style="margin-bottom: 13px;">Jenis Kelamin</label>
                                <div class="form-group">
                                    <input name="k_dua_jk" type="radio" id="radio_l_d" class="radio-col-cyan" value="l" checked />
                                    <label for="radio_l_d">Laki - laki</label>

                                    <input name="k_dua_jk" type="radio" id="radio_p_d" class="radio-col-pink" value="p" />
                                    <label for="radio_p_d">Perempuan</label>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <label>Tempat Lahir</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="k_dua_tmpt_lahir" placeholder="Silahkan isi tempat lahir" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label>Tanggal Lahir</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="k_dua_tgl_lahir" class="datepicker form-control" placeholder="Silahkan isi tanggal lahir">
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-3">
                                <label>Pendidikan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="k_dua_pendidikan">
                                            <?php foreach ($jenisp as $rjp): ?>
                                                <option value="<?php echo $rjp->formal_jenis_id; ?>"><?php echo $rjp->formal_jenis_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-5">
                                <label>Pekerjaan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="k_dua_pekerjaan" placeholder="Silahkan isi pekerjaan">
                                    </div>
                                </div> 
                            </div>

                        </div>
                                
                        
                    </div>

                    <div class="modal-footer align-center">
                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- Ahli Waris -->
<div class="modal fade" id="ahliWaris" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <?php echo form_open('keluarga/ahli_waris_create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Tambah Ahli Waris : </h2>
                    </div>
                    
                    <div class="modal-body"> 
                        
                        <div class="row">
                            <div class="col-lg-12">
                               <label>Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ahli_waris_name" placeholder="Silahkan isi nama">
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-12">
                               <label>Hubungan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="ahli_waris_hub" placeholder="Silahkan isi nama">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                    </div>

                    <div class="modal-footer align-center">
                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>