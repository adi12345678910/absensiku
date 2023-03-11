<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>
                    </div>

                    <div class="body">
                        
                        <?php echo form_open('todo_list_karyawan/', array('method' => 'GET')); ?>
                            <div class="row clearfix">

                                <div class="col-lg-12" style="margin-bottom: -40px;">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <p class="font-bold col-cyan">* Silihakan Pilih Filter Untuk Menampilkan Todo List Karyawan</p>                                        
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
                                <table class="table table-bordered table-hover js-basic-example dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>To Do List</th>
                                            <th>Penjelasan</th>
                                            <th>Program Kerja</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php if (!empty($nama_karyawan)): ?>
                                            <?php $no = 1; foreach ($karyawan_absen as $row): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo tgl_in(date('Y-m-d', strtotime($row->todo_tgl_input))); ?></td>
                                                <td><?php echo ucwords($row->todo_name); ?></td>
                                                <td><?php echo ucwords($row->todo_desk); ?></td>
                                                <td><?php echo ucwords($row->kerja_name); ?></td>
                                                <td><?php echo ucwords($row->user_name).' ('.ucwords($row->lembaga_name).')'; ?></td>
                                                <td>
                                                    <?php  
                                                        if ($row->todo_status == 'todo') 
                                                        {
                                                            echo "<span class='col-orange'>Sedang Dikerjakan</span>";
                                                        }
                                                        else
                                                        {
                                                            echo "<span class='col-teal'>Selesai</span>";
                                                        }
                                                    ?>
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
