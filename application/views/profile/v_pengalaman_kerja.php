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
                        <h2><?php echo $title_page; ?></h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah</a>
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
                                            <th>Nama Perusahaan</th>
                                            <th>Jabatan</th>
                                            <th>..s/d..</th>
                                            <th>KETERANGAN</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($qPengalamanKerja as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($row->pengalaman_kerja_nama_perusahaan); ?></td>
                                            <td><?php echo ucwords($row->pengalaman_kerja_jab); ?></td>
                                            <td><?php echo ucwords($row->pengalaman_kerja_s_d); ?></td>
                                            <td><?php echo ucwords($row->pengalaman_kerja_ket); ?></td>
                                            <td align="center">
                                                <?php echo anchor('pengalaman_kerja/show/'.$row->pengalaman_kerja_id.'/'.$row->pengalaman_kerja_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                <?php echo anchor('pengalaman_kerja/delete/'.$row->pengalaman_kerja_id.'/'.$row->pengalaman_kerja_user, 'HAPUS', array(
                                                    'id' => 'tbl_font',
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($row->pengalaman_kerja_nama_perusahaan)." ?');"
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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <?php echo form_open('pengalaman_kerja/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2 id="head_S">Tambah Pengalaman Kerja</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Nama Perusahaan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pengalaman_kerja_nama_perusahaan" placeholder="Silahkan isi nama perusahaan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label>Jabatan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pengalaman_kerja_jab" placeholder="Silahkan isi tempat" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label>..s/d..</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pengalaman_kerja_s_d" required>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-lg-6">
                                <label>Keterangan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pengalaman_kerja_ket" required>
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