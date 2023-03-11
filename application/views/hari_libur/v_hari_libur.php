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
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#defaultModal">Tambah Hari</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="body">
                            <div class="col-xs-12 table-responsive">

                                <table class="table table-bordered table-hover js-basic-example-hari-libur dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($q_hari_libur as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo tgl_in($row->hari_libur_tanggal); ?></td>
                                            <td><?php echo ucwords($row->hari_libur_nama); ?></td>
                                            <td><?php echo $row->hari_libur_desk; ?></td>
                                            <td>
                                                <?php echo anchor('hari_libur/delete/'.$row->hari_libur_id, 'HAPUS', array(
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus Hari ".ucwords($row->hari_libur_nama)." ?');"
                                                )); ?>
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




<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Hari</h4>
            </div>

            <?php echo form_open('hari_libur/create'); ?>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4">
                            <label>Tanggal</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="hari_libur_tanggal" class="datepicker form-control" placeholder="Silahkan Pilih" required>
                                </div>
                            </div> 
                        </div>
                        
                        <div class="col-md-8">
                            <label>Nama</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="hari_libur_nama" id="email_address" class="form-control" placeholder="Masukan Hari Libur" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Deskripsi</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="hari_libur_desk" class="form-control no-resize" placeholder="Masukan Deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">BATAL</button>
                </div>
            </form>

        </div>
    </div>
</div>