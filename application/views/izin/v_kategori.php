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
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" kategori="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah Kategori</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-bordered table-hover js-basic-example-kategori dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($qKategori as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($row->kategori_name); ?></td>
                                            <td><?php echo ucwords($row->kategori_desk); ?></td>
                                            
                                            <td>
                                                <?php echo anchor('izin/edit/'.$row->kategori_id, 'EDIT', array('class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                <?php echo anchor('izin/delete/'.$row->kategori_id, 'HAPUS', array(
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus kategori ".ucwords($row->kategori_name)." ?');"
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

<!-- Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" kategori="dialog">
    <div class="modal-dialog modal-lg" kategori="document">
        <div class="modal-content">
            
            <?php echo form_open('izin/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Tambah Jenis Izin</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <label>Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="kategori_name" style="text-transform: capitalize;">
                            </div>
                        </div>

                        <label>Deskripsi</label>
                        <div class="form-group">
                            <div class="form-line">
                                 <textarea name="kategori_desk" class="form-control no-resize" style="height: 50px;"></textarea>
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

