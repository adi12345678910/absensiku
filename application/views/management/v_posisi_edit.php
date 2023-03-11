<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" posisi="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah User</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <?php echo form_open('posisi/update'); ?>
                            <?php foreach ($qPosisiBy as $row): ?>

                                <input type="hidden" name="posisi_id" value="<?php echo $row->posisi_id; ?>">

                                <label>Nama Posisi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="posisi_name" value="<?php echo $row->posisi_name; ?>" style="text-transform: capitalize;">
                                    </div>
                                </div>

                                <label>Deskripsi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <textarea name="posisi_desk" class="form-control no-resize" style="height: 50px;"><?php echo $row->posisi_desk; ?></textarea>
                                    </div>
                                </div>
                                
                                <?php echo anchor('posisi', 'BATAL', array('class' => 'btn btn-warning waves-effect')); ?>
                                <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

                            <?php endforeach ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
