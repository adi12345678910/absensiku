<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title_page; ?></title>
		<link rel="icon" href="./assets/template/favicon.ico" type="image/x-icon">
		<style type="text/css">
			body {
				font-family: Helvetica;
			}
			.head_left {
				width:70%;
				height:100px;
				float:left;
				text-align: center;
				font-weight: bold;
				font-size: 24px;
				padding-top: 30px;
			}
			.head_right {
				width:30%;
				height:100px;
				float:right;
			}

			.header_prof {
				font-weight: bold;
				margin-bottom: 10px;
				background: black;
				color: white;
				padding: 5px;
				width: 40%;
				font-size: 10px;
			}

			.header_in_pendidikan {
				font-size: 10px;
				margin-bottom: 2px;
			}

			/*design table 1*/
			/*.table1 {
			    font-family: sans-serif;
			    color: #232323;
			    border-collapse: collapse;
			}
			 
			.table1, th, td {
			    border: 1px solid #999;
			    padding: 8px 20px;
			}*/
			
			.page_break { page-break-before: always; }
			
		</style>
	</head>

	<body>
		<?php foreach ($qUserBy as $row): ?>
			<div class="head_left">FORMULIR  BIODATA</div>

			<div class="head_right">
				<center>
					<?php if (!empty($row->user_photo)): ?>
                        <img class="img-responsive thumbnail" src="<?php echo base_url('assets/images/users/'.$row->user_photo); ?>" width="100">
                    <?php else: ?>
                        <?php if ($row->user_gender == 'l'): ?>
                            <img class="img-responsive thumbnail" src="<?php echo base_url(); ?>assets/images/users/no-man.png" width="100">
                        <?php elseif($row->user_gender == 'p'): ?>
                            <img class="img-responsive thumbnail" src="<?php echo base_url(); ?>assets/images/users/no-woman.png" width="100">
                        <?php else: ?>
                            <img class="img-responsive thumbnail" src="<?php echo base_url(); ?>assets/images/users/no-gender.jpg" width="100">
                        <?php endif ?>
                    <?php endif ?>
                </center>
			</div>

			<div style="clear: both;"></div>
			<br>

			<div class="body_biodata">
				<div class="header_prof">A. IDENTITAS</div>	

				<div style="float: left; width: 49.86%; border-top: 1px solid; border-bottom: 1px solid; border-left: 1px solid;">
					<table style="width: 100%; font-size: 10px; padding: 5px;">
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">Nama Lengkap</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo ucwords(strtolower($row->user_name)); ?></td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">Tempat & Tgl.Lahir</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo ucwords(strtolower($row->user_tmpt_lhr)).' & '.tgl_in($row->user_tgl_lhr); ?>		
							</td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">Dep./Bagian</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo ucwords(strtolower($row->user_divisi)); ?></td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">Nomor KTP/SIM</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo $row->user_ktp_sim; ?></td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">NPWP</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo $row->user_npwp; ?></td>
						</tr>
						<tr>
							<td>No.JAMSOSTEK</td>
							<td>:</td>
							<td><?php echo $row->user_jamsostek; ?></td>
						</tr>
					</table>
				</div>

				<div style="float: right; width: 49.86%; border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid;">
					<table style="width:100%; font-size: 10px; padding: 5px;">
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;" align="right">Jenis Kelamin</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php
                                    if ($row->user_gender == 'l') 
                                    {
                                        echo "Laki - laki";
                                    }
                                    elseif ($row->user_gender == 'p') 
                                    {
                                        echo "Perempuan";
                                    }
                                    else
                                    {
                                        echo "Tidak diketahui";
                                    }
                                ?>  
							</td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;" align="right">No. Induk Karyawan</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo $row->user_nik; ?></td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;" align="right">Kewarganegaraan</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo ucwords($row->user_warga); ?></td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;" align="right">Agama</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo ucwords($row->user_agama); ?></td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;" align="right">Golongan Darah</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">:</td>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;"><?php echo ucwords($row->user_gol_dar); ?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>	

				<div style="clear: both;"></div>

				<div style="float: left; width: 49.80%; border-right: 1px solid; border-bottom: 1px solid; border-left: 1px solid;">
					<table style="width: 100%; font-size: 10px; padding: 5px;">
						<tr>
							<td>Alamat lengkap di Bandung : (RT,RW,Kel,Kec,Kota, Prov)</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo $q_dbdg_1; ?>
							</td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo $q_dbdg_2; ?>
							</td>
							
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo $q_dbdg_3; ?>
							</td>
							
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								&nbsp;
							</td>
						</tr>
						<tr align="right">
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								Kode Pos : Kode Pos : <?php echo $q_dbdg_kode_pos; ?>	
							</td>
						</tr>
						<tr>
							<td>Telp. & HP : <?php echo $q_dbdg_no; ?></td>
						</tr>
					</table>
				</div>

				<div style="float: left; width: 49.80%; border-right: 1px solid; border-bottom: 1px solid;">
					<table style="width: 100%; font-size: 10px; padding: 5px;">
						<tr>
							<td>Alamat lengkap di luar Bandung :</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo $q_lbdg_1; ?>								
							</td>
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo $q_lbdg_2; ?>
							</td>
							
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								<?php echo $q_lbdg_3; ?>
							</td>
							
						</tr>
						<tr>
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								&nbsp;
							</td>
						</tr>
						<tr align="right">
							<td style="border-bottom: 1px dotted; padding-bottom: 5px;">
								Kode Pos : <?php echo $q_lbdg_kode_pos; ?>
							</td>	
						</tr>
						<tr>
							<td>Telp. & HP : <?php echo $q_lbdg_no; ?></td>
						</tr>
					</table>
				</div>

				<div style="clear: both;"></div>
				<br>

				<div class="header_prof">B. PENDIDIKAN</div>

				<div class="header_in_pendidikan">1. Pendidikan Formal (mulai dari yang terendah) :</div>
				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">No</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama Sekolah</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Fakultas</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Jurusan</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Prog. Studi</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Tempat</th>
						<th style=" border: 1px solid; padding: 5px 0px;">..s/d..</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Ket.</th>
					</tr>

					<?php if (empty($qPendidikanFormal)): ?>
						<tr>
							<td style=" border: 1px solid; text-align: center;"></td>
							<td style=" border: 1px solid; padding: 5px 5px;">&nbsp;</td>
							<td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px; text-align: center;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
						</tr>
					<?php else: ?>
						<?php $no = 1; foreach ($qPendidikanFormal as $rowqpf): ?>
	                        <tr>
								<td style=" border: 1px solid; text-align: center;"><?php echo $no++; ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpf->pendidikan_formal_nama_sekolah); ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpf->pendidikan_formal_fakultas); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpf->pendidikan_formal_jurusan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpf->pendidikan_formal_prog_studi); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpf->pendidikan_formal_tempat); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px; text-align: center;">
	                            	<?php echo ucwords($rowqpf->pendidikan_formal_s_d); ?>		
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpf->pendidikan_formal_ket); ?></td>
							</tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>

				<br>

				<div class="header_in_pendidikan">2. Sebutkan karya ilmiah yang pernah Anda buat : (skripsi, artikel, karya tulis, dll.)</div>
				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<?php if (empty($qKaryaIlmiah)): ?>
						<tr>
							<td style="border: 1px solid; padding: 5px 5px;">&nbsp;</td>
						</tr>
					<?php else: ?>
						<?php $no = 1; foreach ($qKaryaIlmiah as $rowqri): ?>
	                        <tr>
								<td style="border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqri->karya_ilmiah_name); ?></td>
							</tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>

				<br>

				<div class="header_in_pendidikan">3. Pendidikan Non Formal :</div>
				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">No</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama Kursus / Training</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Tempat</th>
						<th style=" border: 1px solid; padding: 5px 0px;">..s/d..</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Ket.</th>
					</tr>

					<?php if (empty($qPendidikanNonFormal)): ?>
						<tr>
							<td style=" border: 1px solid; text-align: center;"></td>
							<td style=" border: 1px solid; padding: 5px 5px;">&nbsp;</td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px; text-align: center;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
						</tr>
					<?php else: ?>
						<?php $no = 1; foreach ($qPendidikanNonFormal as $rowqpnf): ?>
	                        <tr>
								<td style=" border: 1px solid; text-align: center;"><?php echo $no++; ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpnf->formal_non_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpnf->formal_non_tempat); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px; text-align: center;">
	                            	<?php echo ucwords($rowqpnf->formal_non_s_d); ?>		
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpnf->formal_non_ket); ?></td>
							</tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>

				<br>

				<div class="header_in_pendidikan">4. Bahasa asing yang Anda dikuasai :</div>
				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th rowspan="2" style=" border: 1px solid; padding: 5px 0px;">No</th>
						<th rowspan="2" style=" border: 1px solid; padding: 5px 0px;">Bahasa</th>
						<th colspan="3" style=" border: 1px solid; padding: 5px 0px;">Lisan</th>
						<th colspan="3" style=" border: 1px solid; padding: 5px 0px;">Tulisan</th>
					</tr>

					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">Kurang</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Cukup</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Baik</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Kurang</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Cukup</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Baik</th>
					</tr>

					<?php if (empty($qBahasaAsing)): ?>
						<tr>
								<td style=" border: 1px solid; text-align: center;"></td>
								<td style=" border: 1px solid; padding: 5px 5px;">&nbsp;</td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;"></td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;"></td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;"></td>

								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;"></td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;"></td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;"></td>
							</tr>
					<?php else: ?>
						<?php $no = 1; foreach ($qBahasaAsing as $rowqba): ?>
	                        <tr>
								<td style=" border: 1px solid; text-align: center;"><?php echo $no++; ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqba->bahasa_asing_name); ?></td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
									<?php
										if ($rowqba->bahasa_asing_lisan == 'kurang') {
											echo "v";
										}
									?>
								</td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
									<?php
										if ($rowqba->bahasa_asing_lisan == 'cukup') {
											echo "v";
										}
									?>
								</td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
									<?php
										if ($rowqba->bahasa_asing_lisan == 'baik') {
											echo "v";
										}
									?>
								</td>

								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
									<?php
										if ($rowqba->bahasa_asing_tertulis == 'kurang') {
											echo "v";
										}
									?>
								</td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
									<?php
										if ($rowqba->bahasa_asing_tertulis == 'cukup') {
											echo "v";
										}
									?>
								</td>
								<td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
									<?php
										if ($rowqba->bahasa_asing_tertulis == 'baik') {
											echo "v";
										}
									?>
								</td>
							</tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>

				<br>

				<table style="width: 20%; font-size: 10px; border-collapse: collapse;" align="right">
					<tr>
						<td style=" border: 1px solid; padding: 5px 5px;">No. : SDM/0316/0002</td>
					</tr>

					<tr>
						<td style=" border: 1px solid; padding: 5px 5px;">Rev : 0</td>
					</tr>
				</table>

				<!-- page 2 -->

				<div class="page_break"></div>

				<div class="header_prof">C. LINGKUNGAN KELUARGA</div>

				<div class="header_in_pendidikan">
					<div style="float: left; width: 20%;">1. Status Pernikahan :</div>

					<div style="float: left; width: 60%;">
						<table>
							<tr>
								<td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo $qSP1; ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;">Single / Lajang &nbsp;&nbsp;&nbsp;</td>
							</tr>

							<tr>
								<td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo $qSP2; ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;">Menikah sejak tanggal  : <?php echo $qSP2status; ?></td>
							</tr>

							<tr>
								<td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo $qSP3; ?></td>
								<td style=" border: 1px solid; padding: 5px 5px;">Bercerai sejak tanggal  : <?php echo $qSP2status; ?></td>
							</tr>
						</table>
					</div>	
				</div>
				
				<div style="clear: both;"></div>
				<br>

				<div class="header_in_pendidikan">2. Susunan keluarga (suami/istri dan anak) :</div>
				<table style="width: 100%; font-size: 10px; border-collapse: collapse; margin-top: -8px;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">STATUS</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama</th>
						<th style=" border: 1px solid; padding: 5px 0px;">L/P</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Tempat/Tgl.Lahir</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Pendidikan</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Pekerjaan</th>
					</tr>

					<?php if (empty($k_satu_suami->result()) && empty($k_satu_istri->result()) && empty($k_satu_anak)): ?>
						<tr>
                            <td style=" border: 1px solid; text-align: center; padding: 5px 5px;">&nbsp;</td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                        </tr> 
					<?php else: ?>
						<?php foreach ($k_satu_suami->result() as $rowSuami): ?>
	                        <tr>
	                            <td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
	                            	<?php echo ucwords($rowSuami->k_satu_status); ?>/<span style="text-decoration: line-through;">Istri</span>
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowSuami->k_satu_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowSuami->k_satu_jk); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;">
	                            	<?php echo ucwords($rowSuami->k_satu_tmpt_lahir).' / '.tgl_in($rowSuami->k_satu_tgl_lahir); ?>	
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowSuami->k_satu_pendidikan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowSuami->k_satu_pekerjaan); ?></td>
	                        </tr> 
	                    <?php endforeach ?>

	                    <?php foreach ($k_satu_istri->result() as $rowIstri): ?>
	                        <tr>
	                            <td style=" border: 1px solid; text-align: center; padding: 5px 5px;">
	                            	<span style="text-decoration: line-through;">Suami</span>/<?php echo ucwords($rowIstri->k_satu_status); ?> *)
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIstri->k_satu_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIstri->k_satu_jk); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;">
	                            	<?php echo ucwords($rowIstri->k_satu_tmpt_lahir).' / '.tgl_in($rowIstri->k_satu_tgl_lahir); ?>	
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIstri->k_satu_pendidikan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIstri->k_satu_pekerjaan); ?></td>
	                        </tr> 
	                    <?php endforeach ?>

	                    <?php foreach ($k_satu_anak as $rowAnak): ?>
	                        <tr>
	                            <td  style=" border: 1px solid; text-align: center; padding: 5px 5px;"><?php echo ucwords($rowAnak->k_satu_status); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnak->k_satu_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnak->k_satu_jk); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;">
	                            	<?php echo ucwords($rowAnak->k_satu_tmpt_lahir).' / '.tgl_in($rowAnak->k_satu_tgl_lahir); ?>
	                            </td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnak->k_satu_pendidikan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnak->k_satu_pekerjaan); ?></td>
	                        </tr> 
	                    <?php endforeach ?>
					<?php endif ?>
				</table>
				<p style="font-size: 10px; text-align: right;">*) Coret yang tidak perlu.</p>

				<br>

				<div class="header_in_pendidikan">3. Susunan keluarga (ayah, ibu, saudara sekandung, termasuk anda) :</div>

				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">STATUS</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama</th>
						<th style=" border: 1px solid; padding: 5px 0px;">L/P</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Tempat/Tgl.Lahir</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Pendidikan</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Pekerjaan</th>
					</tr>

					<?php if (empty($k_dua_ayah) && empty($k_dua_ibu) && empty($k_dua_anak)): ?>
						<tr>
                            <td style=" border: 1px solid; padding: 5px 5px;" align="center"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"> &nbsp;</td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                        </tr>
					<?php else: ?>
						<?php foreach ($k_dua_ayah as $rowAyah): ?>
	                        <tr>
	                            <td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo ucwords($rowAyah->k_dua_status); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAyah->k_dua_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAyah->k_dua_jk); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAyah->k_dua_tmpt_lahir).' / '.tgl_in($rowAyah->k_dua_tgl_lahir); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAyah->k_dua_pendidikan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAyah->k_dua_pekerjaan); ?></td>
	                        </tr> 
	                    <?php endforeach ?>

	                    <?php foreach ($k_dua_ibu as $rowIbu): ?>
	                        <tr>
	                            <td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo ucwords($rowIbu->k_dua_status); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIbu->k_dua_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIbu->k_dua_jk); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIbu->k_dua_tmpt_lahir).' / '.tgl_in($rowIbu->k_dua_tgl_lahir); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIbu->k_dua_pendidikan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowIbu->k_dua_pekerjaan); ?></td>
	                        </tr> 
	                    <?php endforeach ?>

	                    <?php foreach ($k_dua_anak as $rowAnakDua): ?>
	                        <tr>
	                            <td style=" border: 1px solid; padding: 5px 5px;"  align="center"><?php echo ucwords($rowAnakDua->k_dua_status); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnakDua->k_dua_name); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnakDua->k_dua_jk); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnakDua->k_dua_tmpt_lahir).' / '.tgl_in($rowAnakDua->k_dua_tgl_lahir); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnakDua->k_dua_pendidikan); ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAnakDua->k_dua_pekerjaan); ?></td>
	                        </tr> 
	                    <?php endforeach ?>
					<?php endif ?>
				</table>

				<br>

				<div class="header_in_pendidikan">4. Ahli Waris *)</div>
				<div class="header_in_pendidikan">Apabila terjadi hal-hal yang tidak diinginkan pada diri Anda, siapakah ahli waris yang Anda tunjuk :</div>

				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">No</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Hubungan</th>
					</tr>

					<?php if (empty($ahli_waris)): ?>
						<tr>
                            <td style=" border: 1px solid; padding: 5px 5px;" align="center">&nbsp;</td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                        </tr>
					<?php else: ?>
						<?php $no = 1; foreach ($ahli_waris as $rowAW): ?>
                        	<tr>
	                            <td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo $no++; ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAW->ahli_waris_name) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowAW->ahli_waris_hub) ?></td>
	                        </tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>
				<p style="font-size: 10px;">*) Bila anda tidak mengisi kolom di atas, maka ahli waris adalah anggota keluarga yang mempunyai hubungan terdekat dengan Anda.</p>

				<div style="clear: both;"></div>
				<br>	

				<div class="header_prof">D. PERSONAL SKILL</div>

				<div class="header_in_pendidikan">1. Pengalaman Kerja  :</div>

				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">No</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama Perusahaan</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Jabatan</th>
						<th style=" border: 1px solid; padding: 5px 0px;">..s/d..</th>
						<th style=" border: 1px solid; padding: 5px 0px;">KETERANGAN</th>
					</tr>

					<?php if (empty($qPengalamanKerja)): ?>
						<tr>
                            <td style=" border: 1px solid; padding: 5px 5px;" align="center">&nbsp;</td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                        </tr>
					<?php else: ?>
						<?php $no = 1; foreach ($qPengalamanKerja as $rowqpk): ?>
	                        <tr>
	                            <td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo $no++; ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpk->pengalaman_kerja_nama_perusahaan) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpk->pengalaman_kerja_jab) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpk->pengalaman_kerja_s_d) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpk->pengalaman_kerja_ket) ?></td>
	                        </tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>
				<p style="font-size: 10px; text-align: right;">* Jika diperlukan dapat dituliskan di kertas tambahan.</p>

				<br>

				<div class="header_in_pendidikan">2. Pengalaman Organisasi  :</div>

				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
					<tr>
						<th style=" border: 1px solid; padding: 5px 0px;">No</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Nama Organisasi</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Tempat</th>
						<th style=" border: 1px solid; padding: 5px 0px;">Jabatan</th>
						<th style=" border: 1px solid; padding: 5px 0px;">..s/d..</th>
					</tr>

					<?php if (empty($qPengalamanOrganisasi)): ?>
						<tr>
                            <td style=" border: 1px solid; padding: 5px 5px;" align="center">&nbsp;</td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                            <td style=" border: 1px solid; padding: 5px 5px;"></td>
                        </tr>
					<?php else: ?>
						<?php $no = 1; foreach ($qPengalamanOrganisasi as $rowqpo): ?>
	                        <tr>
	                            <td style=" border: 1px solid; padding: 5px 5px;" align="center"><?php echo $no++; ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpo->pengalaman_organisasi_name) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpo->pengalaman_organisasi_tempat) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpo->pengalaman_organisasi_jab) ?></td>
	                            <td style=" border: 1px solid; padding: 5px 5px;"><?php echo ucwords($rowqpo->pengalaman_organisasi_s_d) ?></td>
	                        </tr>
	                    <?php endforeach ?>
					<?php endif ?>
				</table>
				<p style="font-size: 10px; text-align: right;">* Jika diperlukan dapat dituliskan di kertas tambahan.</p>

				<br>

				<div class="header_in_pendidikan">3. Hobby / Kegemaran Anda  :</div>

				<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
                    <tr>
                        <td style=" border: 1px solid; padding: 5px 5px;">
                        	<?php if (empty($qHK)): ?>
                        		&nbsp;
                        	<?php else: ?>
								<?php foreach ($qHK as $rowqhk): ?>
									<?php echo ucwords($rowqhk->hk_name); ?>,
								<?php endforeach ?>
                        	<?php endif ?>
                        </td>
                    </tr>
				</table>

				<br><br><br>

				<div style="float: right; width: 30%; font-size: 10px;">
					<p>Diisi dengan sesungguhnya,</p>
					<p>Bandung, ………………………………….2017</p>

					<br><br><br>

					<center><?php echo ucwords(strtolower($row->user_name)); ?></center>
				</div>
		

			</div>
		<?php endforeach ?>

	</body>
</html>