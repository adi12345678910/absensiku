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
                                    <table class="table table-bordered table-hover js-basic-example dataTable font-12">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Lokasi</th>
                                                <th>Latitude</th>
                                                <th>Longtitude</th>
                                                <th>Keterangan</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        
                                        <tbody>
                                            
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo tgl_in(date('Y-m-d', strtotime($row->todo_tgl_input))); ?></td>
                                                    <td><?php echo ucwords($row->nama_perusahaan); ?></td>
                                                    <td><?php echo ucfirst($row->lokasi); ?></td>
                                                    <td><?php echo ucwords($row->latitude); ?></td>
                                                    <td><?php echo ucwords($row->longtitude); ?></td>
                                                    <td><?php echo ucwords($row->keterangan); ?></td>
                                                    <td>
                                                        <?php  
                                                            if ($row->maps_status == 'active') 
                                                            {
                                                                echo anchor('maps/done/'.$row->maps_id, 'Update Done', array(
                                                                    'class' => 'btn btn-info btn-xs waves-effect',
                                                                    'onclick' => "return confirm('Apakah anda yakin ingin mengganti lokasi dengan ".ucwords($row->lokasi)." ?');"
                                                                ));
                                                            }
                                                        ?>

                                                    </td>
                                                </tr> 
                                        
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
            <?php echo form_open('role/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Formulir Pendaftaran Role Baru</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <label>Nama Role</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="role_name" style="text-transform: capitalize;">
                            </div>
                        </div>

                        <label>Deskripsi</label>
                        <div class="form-group">
                            <div class="form-line">
                                 <textarea name="role_desk" class="form-control no-resize" style="height: 50px;"></textarea>
                            </div>
                        </div>

                        <label>Status</label>
                        <div class="form-group">
                            <div class="demo-radio-button">
                                <input name="role_status" type="radio" id="radio_1" value="1" checked />
                                <label for="radio_1">Aktif</label>

                                <input name="role_status" class="radio-col-red" type="radio" id="radio_2" value="0" />
                                <label for="radio_2">Tidak Aktif</label>
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