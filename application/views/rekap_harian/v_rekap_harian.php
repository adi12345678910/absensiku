<section class="content">

    <div class="container-fluid">



		<div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">



                    <div class="header">

                        <div class="row" style="margin-bottom: -30px;">

                            <div class="col-md-2">

                                <h2><?php echo $title_page; ?></h2>



                            </div>

                            

                            <?php echo form_open('rekap_harian/', array('method' => 'GET')); ?>

                                <?php if ($template_show_role == 1): ?>



                                    <div class="col-md-3">

                                        <div class="form-group">

                                            <select name="lembaga" id="filter_lembaga_karyawan" class="form-control show-tick" data-live-search="true" required>

                                                <option value="semua" selected>Semua Lembaga</option>

                                                <?php foreach ($qLembagaFilter as $rowLembaga): ?>

                                                    <option value="<?php echo $rowLembaga->lembaga_id; ?>" <?php if ($rowLembaga->lembaga_id == $lembaga_filter) {echo "selected";} ?>>

                                                        <?php echo ucwords($rowLembaga->lembaga_name); ?>        

                                                    </option>

                                                <?php endforeach ?>

                                            </select>

                                        </div>

                                    </div>



                                <?php elseif ($template_show_lembaga == 4): ?>

                                    <?php if ($template_show_role == 3 OR $template_show_role == 4): ?>



                                        <div class="col-md-3">

                                            <div class="form-group">

                                                <select name="lembaga" id="filter_lembaga_karyawan" class="form-control show-tick" data-live-search="true" required>

                                                    <option value="semua" selected>Semua Lembaga</option>

                                                    <?php foreach ($qLembagaFilter as $rowLembaga): ?>

                                                        <option value="<?php echo $rowLembaga->lembaga_id; ?>" <?php if ($rowLembaga->lembaga_id == $lembaga_filter) {echo "selected";} ?>>

                                                            <?php echo ucwords($rowLembaga->lembaga_name); ?>        

                                                        </option>

                                                    <?php endforeach ?>

                                                </select>

                                            </div>

                                        </div>



                                    <?php endif ?>

                                <?php else: ?>

                                    <div class="col-md-3">

                                        <div class="form-group">

                                            <input type="hidden" name="lembaga" value="<?php echo $template_show_lembaga; ?>">

                                        </div>

                                    </div>

                                <?php endif ?>



                                <div class="col-md-2">

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="mulai" class="date-start form-control" placeholder="Tanggal Mulai" value="<?php echo $tgl_mulai; ?>" required>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-md-2">

                                    <div class="form-group">

                                        <div class="form-line">

                                            <input type="text" name="akhir" class="date-end form-control" placeholder="Tanggal Akhir" value="<?php echo $tgl_akhir; ?>" required>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-md-1">

                                    <button type="submit" class="btn btn-info waves-effect">FILTER</button>

                                </div>



                                <div class="col-md-2 text-right">

                                    <?php echo $button_pdf; ?>

                                    <?php echo $button_print; ?>

                                </div>

                            </form>

                        </div>

                    </div>

                                

                    <?php if (empty($q_rekap_harian)): ?>



                        <div class="body four-zero-four">

                            <div class="four-zero-four-container">

                                <div class="error-message">Silahkan Pilih Tanggal Mulai Dan Tanggal Akhir Untuk Filter Harian.</div>

                            </div>

                        </div>

                        

                    <?php else: ?>



                        <div class="row">

                            <div class="body">

                                <div class="col-xs-12 table-responsive">



                                    <table class="table table-bordered table-hover js-basic-example-rekap-absen-bulanan dataTable font-12">

                                    <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>Nama</th>

                                            <th>Jabatan</th>

                                            <th>Divisi</th>

                                            <th>Lembaga</th>

                                            <th>Hari Kerja</th>

                                            <th>% Kehadiran</th>

                                            <th>T/I/S/A/CK/CT/R</th>

                                            <th></th>

                                        </tr>

                                    </thead>



                                    <tbody>

                                        <?php $no = 1; foreach ($q_rekap_harian as $row): ?>

                                        <tr>

                                            <td><?php echo $no++; ?></td>

                                            <td><?php echo ucwords(strtolower($row->user_name)); ?></td>

                                            <td><?php echo ucwords($row->user_jabatan); ?></td>

                                            <td><?php echo ucwords($row->user_divisi); ?></td>

                                            <td><?php echo ucwords($row->lembaga_name); ?></td>

                                            <td>

                                                <?php  

                                                    $kehadiran = $this->m_rekap_bulanan->f010_jumlahKehadiran($row->user_id, $filter_mulai, $filter_akhir);

                                                    echo $kehadiran;

                                                ?>

                                            </td>

                                            <td>

                                                <?php 

                                                    $hari_libur = $this->m_rekap_bulanan->f011_presentaseKehadiran($filter_mulai, $filter_akhir);

                                                    $begin      = new DateTime($filter_mulai);
                                                    $end        = new DateTime($filter_akhir);

                                                    $daterange  = new DatePeriod($begin, new DateInterval('P1D'), $end);

                                                    //mendapatkan range antara dua tanggal dan di looping
                                                    $i   = 0;
                                                    $x   = 0;
                                                    $end = 1;

                                                    foreach($daterange as $date)
                                                    {
                                                        $daterange  = $date->format("Y-m-d");
                                                        $datetime   = DateTime::createFromFormat('Y-m-d', $daterange);

                                                        //Convert tanggal untuk mendapatkan nama hari
                                                        $day        = $datetime->format('D');

                                                        //Check untuk menghitung yang bukan hari minggu
                                                        if($day != "Sun") 
                                                        {
                                                            //echo $i;
                                                            $x += $end-$i;
                                                        }

                                                        $end++;
                                                        $i++;
                                                    } 

                                                    $hari_kerja = $x+1; 

                                                    $kerja = $hari_kerja - $hari_libur;

                                                    $presentase = ($kehadiran/$kerja) * 100;

                                                    echo ceil($presentase).'%';

                                                ?>

                                            </td>

                                            <td>

                                               <?php  

                                                    $telat = $this->m_rekap_bulanan->f012_jumlahTelat($row->user_id, $filter_mulai, $filter_akhir);

                                                    $izin = $this->m_rekap_bulanan->f013_jumlahIzin($row->user_id, $filter_mulai, $filter_akhir);

                                                    $sakit = $this->m_rekap_bulanan->f014_jumlahSakit($row->user_id, $filter_mulai, $filter_akhir);

                                                    $alfa = $this->m_rekap_bulanan->f015_jumlahAlfa($row->user_id, $filter_mulai, $filter_akhir);

                                                    $cutikhusus = $this->m_rekap_bulanan->f017_jumlahcutikhusus($row->user_id, $filter_mulai, $filter_akhir);

                                                    $cutitahunan = $this->m_rekap_bulanan->f018_jumlahcutitahunan($row->user_id, $filter_mulai, $filter_akhir);

                                                    $remote = $this->m_rekap_bulanan->f019_jumlahRemote($row->user_id, $filter_mulai, $filter_akhir);

                                                    echo $telat.'/'.$izin.'/'.$sakit.'/'.$alfa.'/'.$cutikhusus.'/'.$cutitahunan.'/'.$remote;

                                                ?>

                                            </td>

                                            <td>

                                                <?php

                                                    // Tanggal pertama pada bulan ini

                                                    $broken_tgl_pertama     = explode(' ', $tgl_mulai);

                                                    $v_tgl_pertama          = $broken_tgl_pertama[0].'+'.$broken_tgl_pertama[1].'+'.$broken_tgl_pertama[2];



                                                    // Tanggal terakhir pada bulan ini

                                                    $broken_tgl_terakhir    = explode(' ', $tgl_akhir);

                                                    $v_tgl_terakhir         = $broken_tgl_terakhir[0].'+'.$broken_tgl_terakhir[1].'+'.$broken_tgl_terakhir[2];

                                                    

                                                ?>

                                                <?php if ($kehadiran > 0): ?>

                                                    <?php echo anchor(

                                                        "rekap_karyawan?mulai=$v_tgl_pertama&akhir=$v_tgl_terakhir&lembaga=$row->lembaga_id&name=$row->user_id", 

                                                        '<i class="material-icons">search</i>', 

                                                        array(

                                                            'class'             => 'btn btn-info btn-xs waves-effect',

                                                            'data-toggle'       => 'tooltip',

                                                            'data-placement'    => 'top',

                                                            'title'             => 'Detail'

                                                            )

                                                    );?>

                                                <?php endif ?>

                                            </td>

                                        </tr>

                                        <?php endforeach ?>

                                    </tbody>

                                </table>



                                </div> 

                            </div>

                        </div>

                        

                    <?php endif ?>



                </div>

            </div>

        </div>

        

    </div>

</section>