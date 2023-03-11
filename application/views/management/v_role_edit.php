<section class="content">
    <div class="container-fluid">

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
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#largeModal">Tambah User</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <?php echo form_open('role/update'); ?>
                            <?php foreach ($qRoleBy as $row): ?>

                                <input type="hidden" name="role_id" value="<?php echo $row->role_id; ?>">

                                <label>Nama Role</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="role_name" value="<?php echo $row->role_name; ?>" style="text-transform: capitalize;">
                                    </div>
                                </div>

                                <label>Deskripsi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <textarea name="role_desk" class="form-control no-resize" style="height: 50px;"><?php echo $row->role_desk; ?></textarea>
                                    </div>
                                </div>

                                <label>Status</label>
                                <div class="form-group">
                                    <div class="demo-radio-button">
                                        <input name="role_status" type="radio" id="radio_1" value="1" <?php if ($row->role_status == 1) {echo "checked";} ?> />
                                        <label for="radio_1">Aktif</label>

                                        <input name="role_status" class="radio-col-red" type="radio" id="radio_2" value="0" <?php if ($row->role_status == 0) {echo "checked";} ?> />
                                        <label for="radio_2">Tidak Aktif</label>
                                    </div>
                                </div>

                                <?php echo anchor('role', 'BATAL', array('class' => 'btn btn-warning waves-effect')); ?>
                                <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

                            <?php endforeach ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
