<style type="text/css">    

    /* Extra small devices (phones, less than 768px) */

    @media (max-width: 768px) { 



        #head_s {

            font-size: 15px;

        }

    }

    

    /* Small devices (tablets, 768px and up) */

    @media (min-width: 768px) and (max-width: 992px) { 



        #head_s {

            font-size: 16px;

        }

    }

    

    /* Medium devices (desktops, 992px and up) */

    @media (min-width: 992px) and (max-width: 1200px) {



        #head_s {

            font-size: 17px;

        }

    }

    

    /* Large devices (large desktops, 1200px and up) */

    @media (min-width: 1200px) {



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

                    </div>



                    <?php if ($url_4 != $user_id_pf): ?>

                        <div class="body four-zero-four">

                            <div class="four-zero-four-container">

                                <div class="error-code" style="font-size: 120px;">404</div>

                                <div class="error-message">Halaman ini tidak ada.</div>

                                <div class="button-place">

                                    <button type="button" class="btn bg-grey btn-lg waves-effect" onclick="javascript:history.back()">KEMBALI</button>

                                </div>

                            </div>

                        </div>

                    <?php else: ?>

                        <?php if ($qPendidikanFormal->num_rows() < 1): ?>

                            <div class="body four-zero-four">

                                <div class="four-zero-four-container">

                                    <div class="error-code" style="font-size: 120px;">404</div>

                                    <div class="error-message">Halaman ini tidak ada.</div>

                                    <div class="button-place">

                                        <button type="button" class="btn bg-grey btn-lg waves-effect" onclick="javascript:history.back()">KEMBALI</button>

                                    </div>

                                </div>

                            </div>

                        <?php else: ?>



                            <?php foreach ($qPendidikanFormal->result() as $row): ?>

                                <div class="body">

                                    <?php echo form_open('pendidikan_formal/update'); ?>



                                        <input type="hidden" name="pendidikan_formal_id" value="<?php echo $row->pendidikan_formal_id; ?>">



                                        <div class="row">

                                            <div class="col-lg-2">

                                                <label>Jenis Pendidikan</label>

                                                <div class="form-group">

                                                    <div class="form-line">

                                                        <select class="form-control show-tick" name="pendidikan_formal_jenis" id="pendidikan_formal_jenis_edit" required>

                                                            <option value="" selected>Silahkan Pilih</option>

                                                            <?php foreach ($jenisp as $rjp): ?>

                                                                <option value="<?php echo $rjp->formal_jenis_id; ?>" <?php if ($row->pendidikan_formal_jenis == $rjp->formal_jenis_id) {echo "selected";} ?>><?php echo $rjp->formal_jenis_name; ?></option>

                                                            <?php endforeach ?>

                                                        </select>

                                                    </div>

                                                </div>    

                                            </div>



                                            <div class="col-lg-4">

                                                <label>Nama Sekolah</label>

                                                <div class="form-group">

                                                    <div class="form-line">

                                                        <input type="text" class="form-control" name="pendidikan_formal_nama_sekolah" placeholder="Silahkan isi nama sekolah" value="<?php echo ucwords($row->pendidikan_formal_nama_sekolah); ?>">

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-4">

                                                <label>Tempat</label>

                                                <div class="form-group">

                                                    <div class="form-line">

                                                        <input type="text" class="form-control" name="pendidikan_formal_tempat" placeholder="Silahkan isi tempat" value="<?php echo ucwords($row->pendidikan_formal_tempat); ?>">

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-2">

                                                <label>..s/d..</label>

                                                <div class="form-group">

                                                    <div class="form-line">

                                                        <input type="text" class="form-control" name="pendidikan_formal_s_d" value="<?php echo ucwords($row->pendidikan_formal_s_d); ?>">

                                                    </div>

                                                </div> 

                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="formal_jenis_view">

                                                <?php if ($row->pendidikan_formal_jenis == 3): ?>



                                                    <div class="col-lg-4">

                                                       <label>Jurusan</label>

                                                        <div class="form-group">

                                                            <div class="form-line">

                                                                <input type="text" class="form-control" name="pendidikan_formal_jurusan" value="<?php echo ucwords($row->pendidikan_formal_jurusan); ?>">

                                                            </div>

                                                        </div> 

                                                    </div>



                                                <?php elseif ($row->pendidikan_formal_jenis == 4 || $row->pendidikan_formal_jenis == 5 || $row->pendidikan_formal_jenis == 6): ?>



                                                    <div class="col-lg-4">

                                                        <label>Fakultas</label>

                                                        <div class="form-group">

                                                            <div class="form-line">

                                                                <input type="text" class="form-control" name="pendidikan_formal_fakultas" value="<?php echo ucwords($row->pendidikan_formal_fakultas); ?>">

                                                            </div>

                                                        </div>

                                                    </div>



                                                    <div class="col-lg-4">

                                                       <label>Jurusan</label>

                                                        <div class="form-group">

                                                            <div class="form-line">

                                                                <input type="text" class="form-control" name="pendidikan_formal_jurusan" value="<?php echo ucwords($row->pendidikan_formal_jurusan); ?>">

                                                            </div>

                                                        </div> 

                                                    </div>



                                                    <div class="col-lg-4">

                                                        <label>Program Studi</label>

                                                        <div class="form-group">

                                                            <div class="form-line">

                                                                <input type="text" class="form-control" name="pendidikan_formal_prog_studi" value="<?php echo ucwords($row->pendidikan_formal_prog_studi); ?>">

                                                            </div>

                                                        </div> 

                                                    </div>

                                                    

                                                <?php endif ?>

                                            </div>



                                            <div class="col-lg-8">

                                                <label>Ket.</label>

                                                <div class="form-group">

                                                    <div class="form-line">

                                                        <input type="text" class="form-control" name="pendidikan_formal_ket" placeholder="Silahkan isi keterangan" value="<?php echo ucwords($row->pendidikan_formal_ket); ?>">

                                                    </div>

                                                </div>  

                                            </div>

                                        </div>



                                        <?php echo anchor('pendidikan_formal', 'KEMBALI', array('class' => 'btn bg-grey waves-effect')); ?>



                                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>

                                    </form>

                                    

                                </div>

                            <?php endforeach ?>



                        <?php endif ?>

                    <?php endif ?>



                </div>

            </div>

        </div>



    </div>

</section>