<style type="text/css">

    /* Extra small devices (phones, less than 768px) */

    @media (max-width: 768px) { 

        .header_4 {

            font-size: 12px

        }

        .content_all {

            font-size: 9px;

        }



        .content_right {

            margin-top: -60px;

        }



        .ca_mr {

            margin-right: -20px;

        } 



        .header_6 {

            font-size: 9px;

            font-weight: normal;

        }   

    }

    

    /* Small devices (tablets, 768px and up) */

    @media (min-width: 768px) and (max-width: 992px) { 

        .header_4 {

            font-size: 13px

        }

        .content_all {

            font-size: 10px;

        }



        .content_right {

            margin-top: 0px;

        }



        .ca_mr {

            margin-right: -20px;

        } 



        .header_6 {

            font-size: 10px;

            font-weight: normal;

        }   

    }

    

    /* Medium devices (desktops, 992px and up) */

    @media (min-width: 992px) and (max-width: 1200px) {

        .header_4 {

            font-size: 14px

        }

        .content_all {

            font-size: 11px;

        }



        .content_right {

            margin-top: 0px;

        }



        .ca_mr {

            margin-right: -20px;

        } 



        .header_6 {

            font-size: 11px;

            font-weight: normal;

        }  

    }

    

    /* Large devices (large desktops, 1200px and up) */

    @media (min-width: 1200px) {

        .header_4 {

            font-size: 15px

        }

        .content_all {

            font-size: 12px;

        }



        .content_right {

            margin-top: 0px;

        }



        .ca_mr {

            margin-right: -20px;

        } 



        .header_6 {

            font-size: 12px;

            font-weight: normal;

        } 

    }

}

</style>



<?php foreach ($qUserBy as $row): ?>

<section class="content">

    <div class="container-fluid">

        <div class="row clearfix">



            <?php echo $alert; ?>



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

                                        <?php echo anchor(site_url('karyawan/print_out/'.$row->user_id), 'Print Out', array('target' => '__blank')); ?>

                                    </li>



                                    <?php if ($row->user_status == 1): ?>

                                        <li>

                                            <?php

                                                echo anchor('karyawan/nonaktifkan/'.$row->user_id, 'Nonaktifkan',

                                                    array(

                                                        'onclick' => "return confirm('Anda yakin untuk menonaktifkan karyanwan ".ucwords(strtolower($row->user_name))." !!!');", 

                                                    )

                                                );  

                                            ?>

                                        </li>

                                    <?php else: ?>

                                        <li>

                                            <?php

                                                echo anchor('karyawan/aktifkan/'.$row->user_id, 'Aktifkan',

                                                    array(

                                                        'onclick' => "return confirm('Anda yakin untuk mengaktifkan karyanwan ".ucwords(strtolower($row->user_name))." !!!');", 

                                                    )

                                                );  

                                            ?>

                                        </li>

                                    <?php endif ?>

                                </ul>

                            </li>

                        </ul>

                    </div>



                    <div class="body">

                        <h4 style="margin-top: -5px;" class="header_4">A. IDENTITAS</h4>

                        <div class="row content_all">

                            <div class="col-lg-6 col-sm-6 col-xs-12">

                                <div class="row">

                                    

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-sm-5 col-xs-5 ca_mr">Nama Lengkap</div>

                                            <div class="col-lg-1 col-sm-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-sm-6 col-xs-6"><?php echo ucwords($row->user_name); ?></div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Tempat & Tgl. Lahir</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo ucwords($row->user_tmpt_lhr).', '.tgl_in($row->user_tgl_lhr); ?></div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Dep./Bagian</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_divisi; ?></div>

                                        </div>

                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Nomor KTP/SIM</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_ktp_sim; ?></div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">NPWP</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_npwp; ?></div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">No. JAMSOSTEK</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_jamsostek; ?></div>

                                        </div>

                                    </div>   



                                </div>

                            </div>



                            <div class="col-lg-6 col-sm-6 col-xs-12 content_right">

                                <div class="row">

                                    

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Jenis Kelamin</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6">

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

                                            </div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">No. Induk Karyawan</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_nik; ?></div>

                                        </div>

                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Kewarganegaraan</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_warga; ?></div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -17px;">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Agama</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_agama; ?></div>

                                        </div>

                                    </div> 



                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">

                                            <div class="col-lg-5 col-xs-5 ca_mr">Golongan Darah</div>

                                            <div class="col-lg-1 col-xs-1 ca_mr">:</div>

                                            <div class="col-lg-6 col-xs-6"><?php echo $row->user_gol_dar; ?></div>

                                        </div>

                                    </div> 



                                </div>

                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -40px; margin-bottom: -20px;">

                                <div class="row">

                                    

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"">

                                        Alamat lengkap di Bandung : (RT,RW,Kel,Kec,Kota, Prov)

                                        <br>

                                        <?php echo $q_dbdg_1.' '.$q_dbdg_2.' '.$q_dbdg_3.'.'; ?>

                                        <br>

                                        Kode Pos : <?php echo $q_dbdg_kode_pos.'.'; ?> Telp. & Hp : <?php echo $q_dbdg_no; ?>

                                    </div> 

                        

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                        Alamat lengkap di luar Bandung :

                                        <br>

                                        <?php echo $q_lbdg_1.' '.$q_lbdg_2.' '.$q_lbdg_3.'.'; ?>

                                        <br>

                                        Kode Pos : <?php echo $q_lbdg_kode_pos.'.'; ?> Telp. & Hp : <?php echo $q_lbdg_no; ?>

                                    </div> 

                                     

                                </div>

                            </div>

                        </div>

                        <hr style="border-color: red;">



                        <h4 class="header_4">B. PENDIDIKAN</h4>

                        <div class="row content_all">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -10px;">

                                

                                <h6 class="header_6">1. Pendidikan Formal (mulai dari yang terendah) :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">No</th>

                                                <th style="text-align: center;">Nama Sekolah</th>

                                                <th style="text-align: center;">Fakultas</th>

                                                <th style="text-align: center;">Jurusan</th>

                                                <th style="text-align: center;">Prog. Studi </th>

                                                <th style="text-align: center;">Tempat</th>

                                                <th style="text-align: center;">..s/d..</th>

                                                <th style="text-align: center;">Ket.</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($qPendidikanFormal)): ?>

                                                <tr>

                                                    <td align="center">&nbsp;</td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php $noPF = 1; foreach ($qPendidikanFormal as $rowPFormal): ?>

                                                    <tr>

                                                        <td align="center"><?php echo $noPF++; ?></td>

                                                        <td><?php echo ucwords($rowPFormal->pendidikan_formal_nama_sekolah); ?></td>

                                                        <td><?php echo ucwords($rowPFormal->pendidikan_formal_fakultas); ?></td>

                                                        <td><?php echo ucwords($rowPFormal->pendidikan_formal_jurusan); ?></td>

                                                        <td><?php echo ucwords($rowPFormal->pendidikan_formal_prog_studi); ?></td>

                                                        <td><?php echo ucwords($rowPFormal->pendidikan_formal_tempat); ?></td>

                                                        <td><?php echo $rowPFormal->pendidikan_formal_s_d; ?></td>

                                                        <td><?php echo ucwords($rowPFormal->pendidikan_formal_ket); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                                <h6 class="header_6">2. Sebutkan karya ilmiah yang pernah Anda buat : (skripsi, artikel, karya tulis, dll.) :</h6>

                                <table class="table table-bordered">

                                    <tbody>

                                        <?php if (empty($qKaryaIlmiah)): ?>

                                            <tr>

                                                <td>&nbsp;</td>

                                            </tr>

                                        <?php else: ?>

                                            <?php foreach ($qKaryaIlmiah as $rowKI): ?>

                                                <tr>

                                                    <td><?php echo ucwords($rowKI->karya_ilmiah_name); ?></td>

                                                </tr>

                                            <?php endforeach ?>

                                        <?php endif ?>

                                    </tbody>

                                </table>



                                <h6 class="header_6">3. Pendidikan Non Formal :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">No</th>

                                                <th style="text-align: center;">Nama Kursus / Training</th>

                                                <th style="text-align: center;">Tempat</th>

                                                <th style="text-align: center;">..s/d..</th>

                                                <th style="text-align: center;">Ket.</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($qPendidikanNonFormal)): ?>

                                                <tr>

                                                    <th scope="row">&nbsp;</th>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php $noNPF = 1; foreach ($qPendidikanNonFormal as $rowPFormal): ?>

                                                    <tr>

                                                        <td align="center"><?php echo $noNPF++; ?></td>

                                                        <td><?php echo ucwords($rowPFormal->formal_non_name); ?></td>

                                                        <td><?php echo ucwords($rowPFormal->formal_non_tempat); ?></td>

                                                        <td><?php echo $rowPFormal->formal_non_s_d; ?></td>

                                                        <td><?php echo ucwords($rowPFormal->formal_non_ket); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                                <h6 class="header_6">4.  Bahasa asing yang Anda dikuasai :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>

                                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Bahasa</th>

                                                <th colspan="3" style="text-align: center;">Lisan</th>

                                                <th colspan="3" style="text-align: center;">Tulisan</th>

                                            </tr>



                                            <tr>

                                                <th style="text-align: center;">Kurang</th>

                                                <th style="text-align: center;">Cukup</th>

                                                <th style="text-align: center;">Baik</th>

                                                <th style="text-align: center;">Kurang</th>

                                                <th style="text-align: center;">Cukup</th>

                                                <th style="text-align: center;">Baik</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($qBahasaAsing)): ?>

                                                <tr>

                                                    <th scope="row">&nbsp;</th>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <th></th>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php $noNBA = 1; foreach ($qBahasaAsing as $rowBasing): ?>

                                                    <tr>

                                                        <td align="center"><?php echo $noNBA++; ?></td>

                                                        <td><?php echo ucwords($rowBasing->bahasa_asing_name); ?></td>

                                                        <td align="center">

                                                            <?php

                                                                if ($rowBasing->bahasa_asing_lisan == 'kurang') {

                                                                    echo "&#8730;";

                                                                }

                                                            ?>

                                                        </td>

                                                        <td align="center">

                                                            <?php

                                                                if ($rowBasing->bahasa_asing_lisan == 'cukup') {

                                                                    echo "&#8730;";

                                                                }

                                                            ?>

                                                        </td>

                                                        <td align="center">

                                                            <?php

                                                                if ($rowBasing->bahasa_asing_lisan == 'baik') {

                                                                    echo "&#8730;";

                                                                }

                                                            ?>

                                                        </td>

                                                        <td align="center">

                                                            <?php

                                                                if ($rowBasing->bahasa_asing_tertulis == 'kurang') {

                                                                    echo "&#8730;";

                                                                }

                                                            ?>

                                                        </td>

                                                        <td align="center">

                                                            <?php

                                                                if ($rowBasing->bahasa_asing_tertulis == 'cukup') {

                                                                    echo "&#8730;";

                                                                }

                                                            ?>

                                                        </td>

                                                        <td align="center">

                                                            <?php

                                                                if ($rowBasing->bahasa_asing_tertulis == 'baik') {

                                                                    echo "&#8730;";

                                                                }

                                                            ?>

                                                        </td>

                                                    </tr>

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                            </div>

                        </div>

                        <hr style="border-color: red;">



                        <h4 class="header_4">C. LINGKUNGAN KELUARGA</h4>

                        <div class="row content_all">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -10px;">

                                

                                <h6 class="header_6">1. Status Pernikahan : <?php echo $qSP.' '.$qSPstatus; ?></h6>



                                <h6 class="header_6">2. Susunan keluarga (suami/istri dan anak) :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">STATUS</th>

                                                <th style="text-align: center;">Nama</th>

                                                <th style="text-align: center;">L/P</th>

                                                <th style="text-align: center;">Tempat/Tgl.Lahir</th>

                                                <th style="text-align: center;">Pendidikan</th>

                                                <th style="text-align: center;">Pekerjaan</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($k_satu_suami->result()) && empty($k_satu_istri->result()) && empty($k_satu_anak)): ?>

                                                <tr>

                                                    <td align="center">&nbsp;</td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php foreach ($k_satu_suami->result() as $rowkss): ?>

                                                   <tr>

                                                        <td align="center"><?php echo ucwords($rowkss->k_satu_status); ?></td>

                                                        <td><?php echo ucwords($rowkss->k_satu_name); ?></td>

                                                        <td><?php echo ucwords($rowkss->k_satu_jk); ?></td>

                                                        <td><?php echo ucwords($rowkss->k_satu_tmpt_lahir).' / '.tgl_in($rowkss->k_satu_tgl_lahir); ?></td>

                                                        <td><?php echo ucwords($rowkss->formal_jenis_name); ?></td>

                                                        <td><?php echo ucwords($rowkss->k_satu_pekerjaan); ?></td>

                                                    </tr>

                                                <?php endforeach ?>



                                                <?php foreach ($k_satu_istri->result() as $rowksi): ?>

                                                    <tr>

                                                        <td align="center"><?php echo ucwords($rowksi->k_satu_status); ?></td>

                                                        <td><?php echo ucwords($rowksi->k_satu_name); ?></td>

                                                        <td><?php echo ucwords($rowksi->k_satu_jk); ?></td>

                                                        <td><?php echo ucwords($rowksi->k_satu_tmpt_lahir).' / '.tgl_in($rowksi->k_satu_tgl_lahir); ?></td>

                                                        <td><?php echo ucwords($rowksi->formal_jenis_name); ?></td>

                                                        <td><?php echo ucwords($rowksi->k_satu_pekerjaan); ?></td>

                                                    </tr>

                                                <?php endforeach ?>



                                                <?php foreach ($k_satu_anak as $rowksa): ?>

                                                    <tr>

                                                        <td align="center"><?php echo ucwords($rowksa->k_satu_status); ?></td>

                                                        <td><?php echo ucwords($rowksa->k_satu_name); ?></td>

                                                        <td><?php echo ucwords($rowksa->k_satu_jk); ?></td>

                                                        <td><?php echo ucwords($rowksa->k_satu_tmpt_lahir).' / '.tgl_in($rowksa->k_satu_tgl_lahir); ?></td>

                                                        <td><?php echo ucwords($rowksa->formal_jenis_name); ?></td>

                                                        <td><?php echo ucwords($rowksa->k_satu_pekerjaan); ?></td>

                                                    </tr>

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                                <h6 class="header_6">3. Susunan keluarga (ayah, ibu, saudara sekandung, termasuk anda) :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">STATUS</th>

                                                <th style="text-align: center;">Nama</th>

                                                <th style="text-align: center;">L/P</th>

                                                <th style="text-align: center;">Tempat/Tgl.Lahir</th>

                                                <th style="text-align: center;">Pendidikan</th>

                                                <th style="text-align: center;">Pekerjaan</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($k_dua_ayah) && empty($k_dua_ibu) && empty($k_dua_anak)): ?>

                                                <tr>

                                                    <td align="center">&nbsp;</td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php foreach ($k_dua_ayah as $rowkda): ?>

                                                    <tr>

                                                        <td align="center"><?php echo ucwords($rowkda->k_dua_status); ?></td>

                                                        <td><?php echo ucwords($rowkda->k_dua_name); ?></td>

                                                        <td><?php echo ucwords($rowkda->k_dua_jk); ?></td>

                                                        <td><?php echo ucwords($rowkda->k_dua_tmpt_lahir).' / '.tgl_in($rowkda->k_dua_tgl_lahir); ?></td>

                                                        <td><?php echo ucwords($rowkda->formal_jenis_name); ?></td>

                                                        <td><?php echo ucwords($rowkda->k_dua_pekerjaan); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>



                                                <?php foreach ($k_dua_ibu as $rowkdi): ?>

                                                    <tr>

                                                        <td align="center"><?php echo ucwords($rowkdi->k_dua_status); ?></td>

                                                        <td><?php echo ucwords($rowkdi->k_dua_name); ?></td>

                                                        <td><?php echo ucwords($rowkdi->k_dua_jk); ?></td>

                                                        <td><?php echo ucwords($rowkdi->k_dua_tmpt_lahir).' / '.tgl_in($rowkdi->k_dua_tgl_lahir); ?></td>

                                                        <td><?php echo ucwords($rowkdi->formal_jenis_name); ?></td>

                                                        <td><?php echo ucwords($rowkdi->k_dua_pekerjaan); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>



                                                <?php foreach ($k_dua_anak as $rowkdan): ?>

                                                    <tr>

                                                        <td align="center"><?php echo ucwords($rowkdan->k_dua_status); ?></td>

                                                        <td><?php echo ucwords($rowkdan->k_dua_name); ?></td>

                                                        <td><?php echo ucwords($rowkdan->k_dua_jk); ?></td>

                                                        <td><?php echo ucwords($rowkdan->k_dua_tmpt_lahir).' / '.tgl_in($rowkdan->k_dua_tgl_lahir); ?></td>

                                                        <td><?php echo ucwords($rowkdan->formal_jenis_name); ?></td>

                                                        <td><?php echo ucwords($rowkdan->k_dua_pekerjaan); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>

                               

                                <h6 class="header_6">4. Ahli Waris :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">No</th>

                                                <th style="text-align: center;">Nama</th>

                                                <th style="text-align: center;">Hubungan</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($ahli_waris)): ?>

                                                <tr>

                                                    <td align="center">&nbsp;</td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php $noaw = 1; foreach ($ahli_waris as $rowaw): ?>

                                                    <tr>

                                                        <td align="center"><?php echo $noaw++; ?></td>

                                                        <td><?php echo ucwords($rowaw->ahli_waris_name); ?></td>

                                                        <td><?php echo ucwords($rowaw->ahli_waris_hub); ?></td>

                                                    </tr>

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                            </div>

                        </div>

                        <hr style="border-color: red;">



                        <h4 class="header_4">D. PERSONAL SKILL</h4>

                        <div class="row content_all">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            

                                <h6 class="header_6">1. Pengalaman Kerja :</h6>

                                <div class="table-responsive">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">No</th>

                                                <th style="text-align: center;">Nama Perusahaan</th>

                                                <th style="text-align: center;">Jabatan</th>

                                                <th style="text-align: center;">..s/d..</th>

                                                <th style="text-align: center;">Keterangan</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($qPengalamanKerja)): ?>

                                                <tr>

                                                    <td align="center">&nbsp;</td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php $nopk = 1; foreach ($qPengalamanKerja as $rowpk): ?>

                                                    <tr>

                                                        <td align="center"><?php echo $nopk++; ?></td>

                                                        <td><?php echo ucwords($rowpk->pengalaman_kerja_nama_perusahaan); ?></td>

                                                        <td><?php echo ucwords($rowpk->pengalaman_kerja_jab); ?></td>

                                                        <td><?php echo ucwords($rowpk->pengalaman_kerja_s_d); ?></td>

                                                        <td><?php echo ucwords($rowpk->pengalaman_kerja_ket); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                                <h6 class="header_6">2. Pengalaman Organisasi :</h6>

                                <div class="table-responsive">

                                <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th style="text-align: center;">No</th>

                                                <th style="text-align: center;">Nama Organisasi</th>

                                                <th style="text-align: center;">Tempat</th>

                                                <th style="text-align: center;">Jabatan</th>

                                                <th style="text-align: center;">..s/d..</th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php if (empty($qPengalamanOrganisasi)): ?>

                                                <tr>

                                                    <td align="center">&nbsp;</td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                    <td></td>

                                                </tr>

                                            <?php else: ?>

                                                <?php $nopo = 1; foreach ($qPengalamanOrganisasi as $rowpo): ?>

                                                    <tr>

                                                        <td align="center"><?php echo $nopo++; ?></td>

                                                        <td><?php echo ucwords($rowpo->pengalaman_organisasi_name); ?></td>

                                                        <td><?php echo ucwords($rowpo->pengalaman_organisasi_tempat); ?></td>

                                                        <td><?php echo ucwords($rowpo->pengalaman_organisasi_jab); ?></td>

                                                        <td><?php echo ucwords($rowpo->pengalaman_organisasi_s_d); ?></td>

                                                    </tr> 

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </tbody>

                                    </table>

                                </div>



                                <h6 class="header_6">3. Hobby / Kegemaran Anda :</h6>

                                <table class="table table-bordered">

                                    <tbody>

                                        <?php if (empty($qHK)): ?>

                                            <tr>

                                                <td align="center">&nbsp;</td>

                                            </tr>

                                        <?php else: ?>

                                            <tr>

                                                <td>

                                                    <?php foreach ($qHK as $rowhk): ?>

                                                        <?php echo ucwords($rowhk->hk_name).', '; ?>

                                                    <?php endforeach ?>    

                                                </td>

                                            </tr> 

                                        <?php endif ?>

                                    </tbody>

                                </table>



                            </div>

                        </div>

                        <hr style="border-color: red;"> 



                        <a href="<?php echo site_url('karyawan'); ?>" class="btn bg-grey btn-sm waves-effect">KEMBALI</a>                  

                    </div>



                </div>

            </div>



        </div>

    </div>

</section>

<?php endforeach ?>