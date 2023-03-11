<section class="content">
    <div class="container-fluid">

		<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header">
                        <div class="row" style="margin-bottom: -30px;">
                            <div class="col-md-6">
                                <h2><?php echo $title_page.' '.strtoupper(month_in($month_now)); ?></h2>
                            </div>
                            
                            <?php echo form_open('rekap_bulanan/', array('method' => 'GET')); ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="month" class="form-control datemonth" value="<?php echo $tgl_my; ?>" placeholder="Silahkan Pilih" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-info waves-effect">FILTER</button>
                                </div>

                                <div class="col-md-3 text-right">
                                    <?php 
                                        if (empty($_GET['month'])) 
                                        {
                                            $month_filter   = '';
                                            $slassh         = '';
                                            $year_filter    = '';
                                        }
                                        else
                                        {
                                            $broken_bulan   = explode(' ', $_GET["month"]);
                                            $month_filter   = month_number($broken_bulan[0]);
                                            $slassh         = '/';
                                            $year_filter    = $broken_bulan[1];
                                        }
                                        // echo anchor(site_url('rekap_bulanan/export_to_excel/'.$month_filter.$slassh.$year_filter), 'EXCEL', array('class' => 'btn bg-teal waves-effect'));
                                        // echo "&nbsp;";
                                        echo anchor(site_url('rekap_bulanan/export_to_pdf/'.$month_filter.$slassh.$year_filter), 'PDF', array('class' => 'btn bg-green waves-effect'));
                                        echo "&nbsp;";
                                        echo anchor(site_url('rekap_bulanan/export_to_print/'.$month_filter.$slassh.$year_filter), 'PRINT', array(
                                            'class'     => 'btn bg-light-green waves-effect',
                                            'target'    => '__blank'
                                        ));
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>

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
                                            <th>Posisi</th>
                                            <th>Lembaga</th>
                                            <th>Hari Kerja</th>
                                            <th>% Kehadiran</th>
                                            <th>T/I/S/A/CK/CT/R</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; foreach ($q_rekap_bulanan as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo ucwords(strtolower($row->user_name)); ?></td>
                                            <td><?php echo ucwords($row->jabatan_name); ?></td>
                                            <td><?php echo ucwords($row->divisi_name); ?></td>
                                            <td><?php echo ucwords($row->posisi_name); ?></td>
                                            <td><?php echo ucwords($row->lembaga_name); ?></td>
                                            <td>
                                                <?php  
                                                    $kehadiran = $this->m_rekap_bulanan->f002_jumlahKehadiran($row->user_id, $month_now, $year_now);
                                                    echo $kehadiran;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $hari_libur = $this->m_rekap_bulanan->f003_presentaseKehadiran($year_now, $month_now);
                                                    $hari_kerja = sum_work_day($year_now, $month_now, array(7)); 

                                                    $kerja = $hari_kerja - $hari_libur;
                                                    $presentase = ($kehadiran/$kerja) * 100;
                                                    echo ceil($presentase).'%';
                                                ?>
                                            </td>
                                            <td>
                                                <?php  
                                                    $telat = $this->m_rekap_bulanan->f004_jumlahTelat($row->user_id, $month_now);

                                                    

                                                    $r_sakit = $this->m_rekap_bulanan->f006_jumlahSakit($row->user_id, $month_now, $year_now)->result();
                                                    $sakit = 0;
                                                    foreach ($r_sakit as $rrsakit) 
                                                    {
                                                        $sakit = $rrsakit->is_durasi+$sakit;
                                                    }
                                                    $alfa = $this->m_rekap_bulanan->f007_jumlahAlfa($row->user_id, $month_now);
                                                    

                                                    $r_cutikhusus = $this->m_rekap_bulanan->f1_jumlahcutikhusus($row->user_id, $month_now, $year_now)->result();
                                                    $cutikhusus = 0;
                                                    foreach ($r_cutikhusus as $rrcutikhusus) 
                                                    {
                                                        $cutikhusus = $rrcutikhusus->is_durasi+$cutikhusus;
                                                    }

                                                    $r_cutitahunan = $this->m_rekap_bulanan->f0_jumlahcutitahunan($row->user_id, $month_now, $year_now)->result();
                                                    $cutitahunan = 0;
                                                    foreach ($r_cutitahunan as $rrcutitahunan) 
                                                    {
                                                        $cutitahunan = $rrcutitahunan->is_durasi+$cutitahunan;
                                                    }

                                                    $r_remote = $this->m_rekap_bulanan->f2_jumlahRemote($row->user_id, $month_now, $year_now)->result();
                                                    $remote = 0;
                                                    foreach ($r_remote as $rrremote) 
                                                    {
                                                        $remote = $rrremote->is_durasi+$remote;
                                                    }

                                                    echo $telat.'/'.$izin.'/'.$sakit.'/'.$alfa.'/'.$cutikhusus.'/'.$cutitahunan.'/'.$remote;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    // Tanggal pertama pada bulan ini
                                                    $tgl_pertama            = date('Y-m-01', strtotime($hari_ini));
                                                    $broken_tgl_pertama     = explode('-', $tgl_pertama);
                                                    $v_tgl_pertama          = $broken_tgl_pertama[2].'+'.bulan_en($broken_tgl_pertama[1]).'+'.$broken_tgl_pertama[0];

                                                    // Tanggal terakhir pada bulan ini
                                                    $tgl_terakhir           = date('Y-m-t', strtotime($hari_ini));
                                                    $broken_tgl_terakhir    = explode('-', $tgl_terakhir);
                                                    $v_tgl_terakhir         = $broken_tgl_terakhir[2].'+'.bulan_en($broken_tgl_terakhir[1]).'+'.$broken_tgl_terakhir[0];
                                                    
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

                </div>
            </div>
        </div>
        
    </div>
</section>