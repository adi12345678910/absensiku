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
                        <?php echo form_open('kritik_atau_saran/kirim'); ?>

                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <p><b>Pilih Kategori</b></p>
                                    <select class="form-control show-tick" name="ks_status" required>
                                        <option value="" selected>Silahkan Pilih</option>
                                        <option value="kritik">Kritik</option>
                                        <option value="saran">Saran</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-xs-12" id="kss_text">
                                    <h2 class="card-inside-title">Silahkan Masukan</h2>

                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" name="ks_text" placeholder="Please type what you want..." required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">KIRIM</button>
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
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Text</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($q_ks as $row): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo datetime_in($row->ks_date); ?></td>
                                                <td><?php echo ucwords($row->ks_status); ?></td>
                                                <td><?php echo ucfirst($row->ks_text); ?></td>
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