<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php echo $title_page; ?></title>

		<link rel="icon" href="assets/template/favicon.ico" type="image/x-icon">

		<style type="text/css">

			body {

				font-family: Helvetica;

			}

			.tbl_header{

				text-align: center;

				background: #b3b3ff;

			}

			.tbl_header th {

				padding: 5px 0px 5px 0px;

				font-size: 12.55px;

			}



			.tbl_header2{

				text-align: center;

				background: #b3b3ff;



			}



			.tbl_header2 th {

				padding: 5px 0px 5px 0px;

				font-size: 12.55px;

			}



			.tbl_body{

				

			}

			.tbl_body td {

				padding: 5px 5px 5px 5px;

				font-size: 12.55px;

			}

		</style>

	</head>



	<body>



		<p align="center">REPORT HUMAN RESOURCE <br> MONTH <?php echo strtoupper(bulan_en($month_now)); ?> <?php echo $year_now; ?></p>



		<?php  

			$hari_libur = $this->m_rekap_bulanan->f003_presentaseKehadiran($year_now, $month_now);

	        $hari_kerja = sum_work_day($year_now, $month_now, array(7)); 



	        $kerja = $hari_kerja - $hari_libur;

		?>

		

		

		Efektif hari kerja : <?php echo $kerja; ?> Hari

		

		<table cellspacing="0" align="center" border="1" width="100%">

			

			<thead>

	            <tr class="tbl_header">

	                <th rowspan="2">NO</th>

	                <th rowspan="2">NAMA</th>

	                <th colspan="9">KEDISIPLINAN</th>

	            </tr>



	            <tr class="tbl_header2">

	                <th>KEHADIRAN</th>

	                <th>%</th>

	                <th>TELAT</th>

	                <th>IZIN</th>

	                <th>SAKIT</th>

					<th>CUTI KHUSUS</th>

					<th>CUTI TAHUNAN</th>

					<th>REMOTE</th>

	                <th>ALFA</th>

	            </tr>

            </thead>



            <tbody>

            	<?php $no = 1; foreach ($q_lembaga as $lRow): ?>



            		<tr class="tbl_body">

            			<td colspan="11"><b><?php echo strtoupper($lRow->lembaga_name); ?></b></td>

            		</tr>

					

					<?php $q_rekap_bulanan = $this->m_rekap_bulanan->f001_getKaryawan($lRow->lembaga_id)->result(); ?>

					<?php foreach ($q_rekap_bulanan as $row): ?>

						<tr class="tbl_body">

							<td class="tbl_body_borbottom" align="center"><?php echo $no++; ?></td>

	            			<td><?php echo ucwords(strtolower($row->user_name)); ?></td>

	            			<td align="center">

	            				<?php  

					                $kehadiran = $this->m_rekap_bulanan->f002_jumlahKehadiran($row->user_id, $month_now, $year_now);

					                echo $kehadiran;

					            ?>

	            			</td>

	            			<td align="center">

	            				<?php 

					                $hari_libur = $this->m_rekap_bulanan->f003_presentaseKehadiran($year_now, $month_now);

					                $hari_kerja = sum_work_day($year_now, $month_now, array(7)); 



					                $kerja = $hari_kerja - $hari_libur;

					                $presentase = ($kehadiran/$kerja) * 100;

					                echo ceil($presentase).'%';

					            ?>

	            			</td>

	            			<?php  

			                    $telat = $this->m_rekap_bulanan->f004_jumlahTelat($row->user_id, $month_now);



			                    $r_izin = $this->m_rekap_bulanan->f005_jumlahIzin($row->user_id, $month_now, $year_now)->result();

			                    $izin = 0;

			                    foreach ($r_izin as $rrizin) 

			                    {

			                    	$izin = $rrizin->$izin;

			                    }



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
			                ?>

	            			<td align="center"><?php echo $telat ?></td>

		                	<td align="center"><?php echo $izin ?></td>

		                	<td align="center"><?php echo $sakit ?></td>

							<td align="center"><?php echo $cutikhusus ?></td>

							<td align="center"><?php echo $cutitahunan ?></td>

							<td align="center"><?php echo $remote ?></td>

		                	<td align="center"><?php echo $alfa ?></td>

	            		</tr>

					<?php endforeach ?>



            	<?php endforeach ?>

            </tbody>



        </table>



	</body>

</html>