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
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah Bahasa Asing</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable font-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bahasa</th>
                                            <th>Lisan</th>
                                            <th>Tertulis</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($qBahasaAsing as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($row->bahasa_asing_name); ?></td>
                                            <td><?php echo ucwords($row->bahasa_asing_lisan); ?></td>
                                            <td><?php echo ucwords($row->bahasa_asing_tertulis); ?></td>
                                            <td align="center">
                                                <?php echo anchor('bahasa_asing/show/'.$row->bahasa_asing_id.'/'.$row->bahasa_asing_user, 'EDIT', array('class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                <?php echo anchor('bahasa_asing/delete/'.$row->bahasa_asing_id.'/'.$row->bahasa_asing_user, 'HAPUS', array(
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($row->bahasa_asing_name)." ?');"
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
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <?php echo form_open('bahasa_asing/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Tambah Bahasa Asing</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Bahasa</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="bahasa_asing_name" placeholder="Silahkan isi">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label>Lisan</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" name="bahasa_asing_lisan">
                                        <option value="baik">Baik</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="kurang">Kurang</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label>Tulisan</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" name="bahasa_asing_tertulis">
                                        <option value="baik">Baik</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="kurang">Kurang</option>
                                    </select>
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