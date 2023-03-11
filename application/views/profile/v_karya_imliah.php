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
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah Karya Ilmiah</a>
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
                                            <th>Nama Karya Ilmiah</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($qKaryaIlmiah as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($row->karya_ilmiah_name); ?></td>
                                            <td align="center">
                                                <?php echo anchor('karya_ilmiah/show/'.$row->karya_ilmiah_id.'/'.$row->karya_ilmiah_user, 'EDIT', array('id' => 'tbl_font', 'class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                <?php echo anchor('karya_ilmiah/delete/'.$row->karya_ilmiah_id.'/'.$row->karya_ilmiah_user, 'HAPUS', array(
                                                    'id' => 'tbl_font',
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin menghapus ".ucwords($row->karya_ilmiah_name)." ?');"
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
            
            <?php echo form_open('karya_ilmiah/create'); ?>
                <div class="card">

                    <div class="header">
                        <h2>Formulir Pendaftaran Role Baru</h2>
                    </div>
                    
                    <div class="modal-body"> 
                        <label>Nama Karya Ilmiah</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="4" class="form-control no-resize" name="karya_ilmiah_name" placeholder="Please type what you want..."></textarea>
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