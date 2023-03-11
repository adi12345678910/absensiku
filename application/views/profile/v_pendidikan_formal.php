<style type="text/css">    
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 

        #tbl_font {
             font-size: 10px;
        }

        #head_s {
            font-size: 15px;
        }
    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 

        #tbl_font {
             font-size: 11px;
        }

        #head_s {
            font-size: 16px;
        }
    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {

        #tbl_font {
             font-size: 12px;
        }

        #head_s {
            font-size: 17px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {

        #tbl_font {
             font-size: 13px;
        }

        #head_s {
            font-size: 18px;
        }
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
                        <h2 id="head_s"><?php echo $title_page; ?></h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah Pendidikan</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable font-12" id="tbl_font">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sekolah</th>
                                            <th>Fakultas</th>
                                            <th>Jurusan</th>
                                            <th>Program Studi</th>
                                            <th>Tempat</th>
                                            <th>..s/d..</th>
                                            <th>Ket.</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($qPendidikanFormal as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_nama_sekolah); ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_fakultas); ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_jurusan); ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_prog_studi); ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_tempat); ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_s_d); ?></td>
                                            <td><?php echo ucwords($row->pendidikan_formal_ket); ?></td>
                                            <td align="center">
                                                <?php echo anchor('pendidikan_formal/show/'.$row->pendidikan_formal_id.'/'.$row->pendidikan_formal_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                <?php echo anchor('pendidikan_formal/delete/'.$row->pendidikan_formal_id.'/'.$row->pendidikan_formal_user, 'HAPUS', array(
                                                    'id' => 'tbl_font',
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($row->pendidikan_formal_nama_sekolah)." ?');"
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
            
            <?php echo form_open('pendidikan_formal/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Tambah Pendidikan Formal</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Jenis Pendidikan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="pendidikan_formal_jenis" id="pendidikan_formal_jenis_add" required>
                                            <option value="" selected>Silahkan Pilih</option>
                                            <?php foreach ($jenisp as $rjp): ?>
                                                <option value="<?php echo $rjp->formal_jenis_id; ?>"><?php echo $rjp->formal_jenis_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>    
                            </div>

                            <div class="col-lg-4">
                                <label>Nama Sekolah</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pendidikan_formal_nama_sekolah" placeholder="Silahkan isi nama sekolah">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label>Tempat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pendidikan_formal_tempat" placeholder="Silahkan isi tempat">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="formal_jenis_view_add"></div>

                            <div class="col-lg-4">
                                <label>..s/d..</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pendidikan_formal_s_d">
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-4">
                                <label>Ket.</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pendidikan_formal_ket" placeholder="Silahkan isi keterangan">
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