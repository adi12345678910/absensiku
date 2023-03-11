<style type="text/css">
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 
        #kss_text {
            margin-bottom: -20px;
        }
    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 
        #kss_text {
            margin-bottom: -20px;
        }
    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {
        #kss_text {
            margin-bottom: -20px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        #kss_text {
            margin-bottom: -20px;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">

        <?php echo $alert; ?>

        <div class="row clearfix">

            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2>FORM <?php echo $title_page; ?></h2>

                   
                    </div>

                    <div class="body">
                        <?php echo form_open('home/kirim'); ?>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">

                                <div class="col-lg-12 col-xs-12" id="kss_text">
                                    <h2 class="card-inside-title">Judul Pengumuman</h2>

                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input typpe="text" rows="4" class="form-control no-resize" name="judul_informasi" placeholder="Please type what you want..." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-lg-12 col-xs-12" id="kss_text">
                                    <h2 class="card-inside-title">Silahkan Masukan Pengumuman</h2>

                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" name="keterangan_informasi" placeholder="Please type what you want..." required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">KIRIM</button>
                                    <button type="button" class="btn bg-grey btn-sm m-t-15 waves-effec" style="margin-left: 15px;" onclick="javascript:history.back()"><span ></span> KEMBALI</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <div class="card">

                    <div class="header">
                        <h2>DATA <?php echo $title_page; ?></h2>
                    </div>

                    <div class="row">
                        <div class="body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable font-12">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Pengumuman</th>
                                            <th>Keterangan Pengumuman</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($q_ks as $row): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo ucfirst($row->judul_informasi); ?></td>
                                                <td><?php echo ucfirst($row->keterangan_informasi); ?></td>
                                                <td><?php echo datetime_in($row->informasi_date); ?></td>
                                               
                                                <td> 
                                                <?php echo anchor('home/edit/'.$row->informasi_id, 'EDIT', array('class' => 'btn btn-warning btn-xs waves-effect')); ?>

                                                <?php echo anchor('home/delete/'.$row->informasi_id, 'HAPUS', array(
                                                    'class' => 'btn btn-danger btn-xs waves-effect',
                                                    'onclick' => "return confirm('Apakah anda yakin ingin menghapus pengumuman ".ucwords($row->judul_informasi)." ?');"
                                                )); ?>
                                            </td>
                                                    
                                              
                                                <!-- Button trigger modal -->
                                              
                                                 

                                                <!-- Modal -->
                                                
                                            
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