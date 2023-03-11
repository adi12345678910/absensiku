<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2><?php echo $title_page; ?></h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                

 
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <?php echo form_open('home/update'); ?>
                            <?php foreach ($qPosisiBy as $row): ?>

                                <input type="hidden" name="informasi_id" value="<?php echo $row->informasi_id; ?>">

                                <label>Judul Informasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="judul_informasi" value="<?php echo $row->judul_informasi; ?>" style="text-transform: capitalize;">
                                    </div>
                                </div>

                                <label>keterangan informasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <textarea name="keterangan_informasi" class="form-control no-resize" style="height: 50px;"><?php echo $row->keterangan_informasi; ?></textarea>
                                    </div>
                                </div>
                                
                                <?php echo anchor('home/create', 'BATAL', array('class' => 'btn btn-warning waves-effect')); ?>
                                <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

                            <?php endforeach ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
