<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>

                        <?php if ($template_show_role == 1): ?>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>

                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Input Absen</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php endif ?>

                        <?php if ($template_show_role == 3 AND $template_show_lembaga == 4): ?>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>

                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Input Absen</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php endif ?>

                    </div>

                    <div class="body">
                        
                        <?php echo form_open('rekap_karyawan/', array('method' => 'GET')); ?>
                            <div class="row clearfix">

                                <div class="col-lg-12" style="margin-bottom: -40px;">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <p class="font-bold col-cyan">* Silihakan Pilih Filter Untuk Menampilkan Data</p>                                        
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="mulai" class="date-start form-control" placeholder="Tanggal Mulai" value="<?php echo $mulai; ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="akhir" class="date-end form-control" placeholder="Tanggal Akhir" value="<?php echo $akhir; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- administrator -->
                                        <?php if ($template_show_lembaga == 12 AND $template_show_role == 1): ?>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select name="lembaga" id="filter_lembaga_karyawan" class="form-control show-tick" data-live-search="true" required>
                                                        <option value="" selected disabled>Pilih Lembaga</option>
                                                        <?php foreach ($qLembaga as $rowLembaga): ?>
                                                            <option value="<?php echo $rowLembaga->lembaga_id; ?>" <?php if ($lembaga == $rowLembaga->lembaga_id) {echo "selected";} ?>>
                                                                <?php echo ucwords($rowLembaga->lembaga_name); ?>        
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 filter_karwayan_admin <?php echo $collapse; ?>">
                                                <div class="form-group">
                                                    <select name="name" class="form-control show-tick"  data-live-search="true" id="filter_nama_karyawan" required>
                                                        <option value="semua_nama" selected>Pilih Semua</option> 
                                                        <?php if (!empty($nama_karyawan)): ?>
                                                            <?php foreach ($nama_karyawan as $nk): ?>
                                                                <option value="<?php echo $nk->user_id; ?>" <?php if ($name == $nk->user_id) {echo "selected";} ?>>
                                                                    <?php echo ucwords($nk->user_name); ?>        
                                                                </option>
                                                            <?php endforeach ?>
                                                       <?php endif ?>
                                                    </select>
                                                </div>
                                            </div>

                                        <!-- emc -->
                                        <?php elseif($template_show_lembaga == 4): ?>
                                            <?php if ($template_show_role == 3 OR $template_show_role == 4): ?>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select name="lembaga" id="filter_lembaga_karyawan" class="form-control show-tick" data-live-search="true" required>
                                                            <option value="" selected disabled>Pilih Lembaga</option>
                                                            <?php foreach ($qLembaga as $rowLembaga): ?>
                                                                <option value="<?php echo $rowLembaga->lembaga_id; ?>" <?php if ($lembaga == $rowLembaga->lembaga_id) {echo "selected";} ?>>
                                                                    <?php echo ucwords($rowLembaga->lembaga_name); ?>        
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 filter_karwayan_admin <?php echo $collapse; ?>">
                                                    <div class="form-group">
                                                        <select name="name" class="form-control show-tick"  data-live-search="true" id="filter_nama_karyawan" required>
                                                            <option value="semua_nama" selected>Pilih Semua</option> 
                                                            <?php if (!empty($nama_karyawan)): ?>
                                                                <?php foreach ($nama_karyawan as $nk): ?>
                                                                    <option value="<?php echo $nk->user_id; ?>" <?php if ($name == $nk->user_id) {echo "selected";} ?>>
                                                                        <?php echo ucwords($nk->user_name); ?>        
                                                                    </option>
                                                                <?php endforeach ?>
                                                           <?php endif ?>
                                                        </select>
                                                    </div>
                                                </div>


                                            <?php endif ?>
                                        <!-- semua lembaga -->   
                                        <?php else: ?>
                                             <?php if ($template_show_role == 3 OR $template_show_role == 4): ?>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <select name="name" class="form-control show-tick"  data-live-search="true" required>
                                                            <option value="" selected disabled>Silahkan Pilih</option> 
                                                            <?php foreach ($nama_karyawan as $nk): ?>
                                                                <option value="<?php echo $nk->user_id; ?>" <?php if ($name == $nk->user_id) {echo "selected";} ?>>
                                                                    <?php echo ucwords($nk->user_name); ?>        
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            <?php endif ?>
                                        <?php endif ?> 

                                        <div class="col-lg-1">
                                            <button type="submit" class="btn btn-info btn-sm waves-effect" title="Filter Data"><i class="material-icons">search</i></button>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="row clearfix <?php echo $collapse; ?>">
                            <hr>

                            <div class="col-md-12 table-responsive">                       
                                <table class="table table-bordered table-hover js-basic-example-rekap-absen-karyawan dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Point Masuk</th>
                                            <th>Point Pulang</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php if (!empty($nama_karyawan)): ?>
                                            <?php $no = 1; foreach ($karyawan_absen as $row): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo ucwords(strtolower($row->user_name)); ?></td>
                                                <td><?php echo tgl_in($row->absen_date); ?></td>
                                                <td><?php echo date('H:i', strtotime($row->absen_masuk)); ?></td>
                                                <td <?php if (empty($row->absen_pulang)) { echo 'class="danger"'; }  ?>>
                                                    <?php
                                                        if (!empty($row->absen_pulang)) 
                                                        {
                                                            echo date('H:i', strtotime($row->absen_pulang));
                                                        } 
                                                    ?> 
                                                </td>
                                                <td><?php echo $row->absen_masuk_poin; ?></td>
                                                <td <?php if (empty($row->absen_pulang)) { echo 'class="danger"'; }  ?>>
                                                    <?php echo $row->absen_pulang_poin; ?>   
                                                </td>
                                                <td>
                                                    <?php echo anchor('rekap_absen/show/'.$row->absen_id, 'DETAIL', array('class' => 'btn btn-info btn-xs waves-effect')); ?>
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
        </div>

    </div>
</section>

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content demo-masked-input">
            
            <?php echo form_open('rekap_karyawan/input_absen'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Input Lupa Absen</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        
                        <?php
                            if(!empty($mulai))
                            {
                                $ex_mulai = explode(' ', $mulai);
                                $s_mulai = $ex_mulai[0].'+'.$ex_mulai[1].'+'.$ex_mulai[2];
                            } 
                            else
                            {
                                $s_mulai = NULL;
                            }

                            if (!empty($akhir)) 
                            {
                                $ex_akhir = explode(' ', $akhir);
                                $s_akhir = $ex_akhir[0].'+'.$ex_akhir[1].'+'.$ex_akhir[2];
                            }
                            else
                            {
                                $s_akhir = NULL;
                            }

                            
                            $addAbsen = 'mulai='.$s_mulai.'&akhir='.$s_akhir.'&lembaga='.$lembaga.'&name='.$name; 
                        ?>
                        <input type="hidden" name="url_absen" value="<?php echo $addAbsen; ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Lembaga</label>
                                <div class="form-group">
                                    <select name="lembaga" id="filter_input_absen" class="form-control show-tick" data-live-search="true" required>
                                        <option value="" selected disabled>Pilih Lembaga</option>
                                        <?php foreach ($qLembaga as $rowLembaga): ?>
                                            <option value="<?php echo $rowLembaga->lembaga_id; ?>">
                                                <?php echo ucwords($rowLembaga->lembaga_name); ?>        
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 filter_absen_karyawan collapse">
                                <label>Nama Karyawan</label>
                                <div class="form-group">
                                    <select name="absen_user" class="form-control show-tick"  data-live-search="true" id="filter_nama_karyawan_absen" required>
                                        <option value="" selected>Pilih Semua</option> 
                                    </select>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Tanggal</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="absen_date" class="datepicker form-control" required>
                                    </div>
                                </div> 
                            </div>  

                            <div class="col-md-3">
                                <label>Jam Masuk</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="absen_masuk" class="form-control time24-costum" placeholder="Ex: 23:59" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label>Jam Pulang</label>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" id="basic_checkbox_2" class="filled-in input_absen" />
                                        <label for="basic_checkbox_2">Tampilkan</label>
                                    </div>

                                    <div class="col-md-6 input_absen_pulang collapse">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="absen_pulang" class="form-control time24-costum jam_pulang_ab" placeholder="Ex: 23:59">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer align-left">
                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>