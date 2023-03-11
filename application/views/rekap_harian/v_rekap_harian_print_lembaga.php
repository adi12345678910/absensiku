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



		<p align="center">REPORT HUMAN RESOURCE <br> <?php echo strtoupper($tanggal); ?> <br> LEMBAGA <?php echo strtoupper($lembaga_header); ?></p>



		<?php  
			$hari_libur = $this->m_rekap_bulanan->f011_presentaseKehadiran($filter_mulai, $filter_akhir);

			$begin 		= new DateTime($filter_mulai);
			$end 		= new DateTime($filter_akhir);

			$daterange 	= new DatePeriod($begin, new DateInterval('P1D'), $end);

			//mendapatkan range antara dua tanggal dan di looping
			$i 	 = 0;
			$x   = 0;
			$end = 1;

			foreach($daterange as $date)
			{
			    $daterange	= $date->format("Y-m-d");
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
		?>
		

		Efektif hari kerja : <?php echo $kerja; ?> Hari

		

		<table cellspacing="0" align="center" border="1" width="100%">

			

			<thead>

	            <tr class="tbl_header">

	                <th rowspan="2">NO</th>

	                <th rowspan="2">NAMA</th>

	                <th colspan="6">KEDISIPLINAN</th>

	            </tr>



	            <tr class="tbl_header2">

	                <th>KEHADIRAN</th>

	                <th>%</th>

	                <th>TELAT</th>

	                <th>IZIN</th>

	                <th>SAKIT</th>

	                <th>ALFA</th>

	            </tr>

            </thead>



            <tbody>

				<?php $no = 1; foreach ($q_rekap_harian as $row): ?>

					<tr class="tbl_body">

						<td class="tbl_body_borbottom" align="center"><?php echo $no++; ?></td>

            			<td><?php echo ucwords(strtolower($row->user_name)); ?></td>

            			<td align="center">

            				<?php  

				                $kehadiran = $this->m_rekap_bulanan->f010_jumlahKehadiran($row->user_id, $filter_mulai, $filter_akhir);

				                echo $kehadiran;

				            ?>

            			</td>

            			<td align="center">

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

            			<?php  

		                    $telat = $this->m_rekap_bulanan->f012_jumlahTelat($row->user_id, $filter_mulai, $filter_akhir);

                            $izin = $this->m_rekap_bulanan->f013_jumlahIzin($row->user_id, $filter_mulai, $filter_akhir);

                            $sakit = $this->m_rekap_bulanan->f014_jumlahSakit($row->user_id, $filter_mulai, $filter_akhir);

                            $alfa = $this->m_rekap_bulanan->f015_jumlahAlfa($row->user_id, $filter_mulai, $filter_akhir);

		                ?>

            			<td align="center"><?php echo $telat; ?></td>

	                	<td align="center"><?php echo $izin; ?></td>

	                	<td align="center"><?php echo $sakit; ?></td>

	                	<td align="center"><?php echo $alfa; ?></td>

            		</tr>

				<?php endforeach ?>

            </tbody>



        </table>



	</body>

</html>