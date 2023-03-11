<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah Program Kerja</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                    <?php if ($q_program_kerja->num_rows() < 1): ?>
                        <div class="body four-zero-four">
                            <div class="four-zero-four-container">
                                <div class="error-message">Belum ada program kerja.</div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="body">
                                <div class="col-xs-12 table-responsive">
                                    <?php  
                                        if ($template_show_role == 1) {
                                            $js = 'admin';
                                        }
                                        else {
                                            $js = 'lembaga';
                                        }
                                    ?>
                                    <table class="table table-bordered table-hover js-basic-example-program-kerja-<?php echo $js; ?> dataTable font-12">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Program Kerja</th>
                                                <th>Deskripsi</th>
                                                <th>Periode</th>
                                                <th>Dibuat Oleh</th>

                                                <?php if ($template_show_role == 1): ?>
                                                   <th>Lembaga</th> 
                                                <?php endif ?>

                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1; foreach ($q_program_kerja->result() as $row): ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo ucwords($row->kerja_name); ?></td>
                                                    <td><?php echo ucwords($row->kerja_desk); ?></td>
                                                    <td><?php echo month_in($row->kerja_periode_bulan).', '.$row->kerja_periode_tahun; ?></td>
                                                    <td><?php echo ucwords($row->user_name); ?></td>

                                                    <?php if ($template_show_role == 1): ?>
                                                       <td><?php echo ucwords(strtolower($row->lembaga_name)); ?></td> 
                                                    <?php endif ?>

                                                    <td align="center">
                                                        <?php echo anchor('program_kerja/todo_list/'.$row->kerja_id, 'TODO LIST', array('class' => 'btn btn-info btn-xs waves-effect')); ?>

                                                        <?php echo anchor('program_kerja/edit/'.$row->kerja_id, 'EDIT', array('class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                        <?php echo anchor('program_kerja/delete/'.$row->kerja_id, 'HAPUS', array(
                                                            'class' => 'btn btn-danger btn-xs waves-effect',
                                                            'onclick' => "return confirm('Hapus Program Kerja ".ucwords($row->kerja_name)." ?');"
                                                        )); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>
        </div>

    </div>
</section>


<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
            <?php echo form_open('program_kerja/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Formulir Program Kerja</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-md-8">
                                <label>Nama Program Kerja</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="program_nama" style="text-transform: capitalize;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Priode Program Kerja</label>
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-md-7 col-xs-7">
                                            <select class="form-control show-tick" name="program_bulan" data-live-search="true">
                                                <option value="" selected disabled>Pilih Bulan</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select> 
                                        </div>

                                        <div class="col-md-5 col-xs-5">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="program_tahun" placeholder="Tahun">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label>Deskripsi Program Kerja</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="program_desk" class="form-control no-resize" style="height: 50px;"></textarea>
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