<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Rekap_harian extends CI_Controller {



	public function __construct() 

	{

		parent:: __construct();



		$this->load->model('m_rekap_bulanan');



		$this->load->library("PHPExcel/PHPExcel");

		$this->load->library("pdf");
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');

	}



	public function index()

	{

		$data['title_page'] = "REKAP HARIAN";



		if (empty($_GET)) 

		{

			$data['tgl_mulai'] 	= '';

			$data['tgl_akhir'] 	= '';



			$data['button_pdf'] = '';

			$data['button_print'] = '';



			$data['qLembagaFilter'] = $this->m_rekap_bulanan->f008_getLembaga()->result();

			$data['lembaga_filter'] = '';



			$data['q_rekap_harian']	= '';

		}

		else

		{

			if ($_GET['lembaga'] == 'semua') 

			{

				$data['tgl_mulai'] 	= $_GET['mulai'];

				$data['tgl_akhir'] 	= $_GET['akhir'];



				$exp_mulai = explode(' ', $_GET['mulai']);

				$data['filter_mulai'] = $filter_mulai = $exp_mulai[2].'-'.month_number($exp_mulai[1]).'-'.$exp_mulai[0];



				$exp_akhir = explode(' ', $_GET['akhir']);

				$data['filter_akhir'] = $filter_akhir = $exp_akhir[2].'-'.month_number($exp_akhir[1]).'-'.$exp_akhir[0];



				$data['button_pdf'] = anchor(site_url('rekap_harian/export_to_pdf/'.$filter_mulai.'/'. $filter_akhir.'/'.$_GET['lembaga']), 'PDF', array('class' => 'btn bg-green waves-effect'));

	            $data['button_print'] = anchor(site_url('rekap_harian/export_to_print/'.$filter_mulai.'/'. $filter_akhir.'/'.$_GET['lembaga']), 'PRINT', array(

	                'class'     => 'btn bg-light-green waves-effect',

	                'target'    => '__blank'

	            ));



	            $data['qLembagaFilter'] = $this->m_rekap_bulanan->f008_getLembaga()->result();

	            $data['lembaga_filter'] = $_GET['lembaga'];



				$data['q_rekap_harian']	= $this->m_rekap_bulanan->f009_getKaryawanView()->result();

			}

			else

			{

				$data['tgl_mulai'] 	= $_GET['mulai'];

				$data['tgl_akhir'] 	= $_GET['akhir'];



				$exp_mulai = explode(' ', $_GET['mulai']);

				$data['filter_mulai'] = $filter_mulai = $exp_mulai[2].'-'.month_number($exp_mulai[1]).'-'.$exp_mulai[0];



				$exp_akhir = explode(' ', $_GET['akhir']);

				$data['filter_akhir'] = $filter_akhir = $exp_akhir[2].'-'.month_number($exp_akhir[1]).'-'.$exp_akhir[0];



				$data['button_pdf'] = anchor(site_url('rekap_harian/export_to_pdf/'.$filter_mulai.'/'. $filter_akhir.'/'.$_GET['lembaga']), 'PDF', array('class' => 'btn bg-green waves-effect'));

	            $data['button_print'] = anchor(site_url('rekap_harian/export_to_print/'.$filter_mulai.'/'. $filter_akhir.'/'.$_GET['lembaga']), 'PRINT', array(

	                'class'     => 'btn bg-light-green waves-effect',

	                'target'    => '__blank'

	            ));



	            $data['qLembagaFilter'] = $this->m_rekap_bulanan->f008_getLembaga()->result();

	            $data['lembaga_filter'] = $_GET['lembaga'];



				$data['q_rekap_harian']	= $this->m_rekap_bulanan->f015_getKaryawanView($_GET['lembaga'])->result();

			}

		}





		$this->template->show('rekap_harian/v_rekap_harian', $data);

	}



	public function export_to_excel($month_filter = '', $year_filter = '')

	{

		if (empty($month_filter) AND empty($year_filter)) 

		{

			$year_now 	= date('Y');

			$month_now 	= date('m');

		}

		else

		{

			$year_now 	= $year_filter;

			$month_now 	= $month_filter;

		}



		$title = 'Rekap Bulanan'.' '.month_in($month_now).' '.$year_now;



        $q_lembaga = $this->m_rekap_bulanan->f008_getLembaga()->result();



        $hari_libur = $this->m_rekap_bulanan->f003_presentaseKehadiran($year_now, $month_now);

        $hari_kerja = sum_work_day($year_now, $month_now, array(7)); 



        $kerja = $hari_kerja - $hari_libur;



		// $this->load->view('rekap_bulanan/v_rekap_bulanan_exel', $data);





        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0);



        /*start title*/

        $objPHPExcel->getActiveSheet()

        	->mergeCells('A1:H1')

        	->setCellValueByColumnAndRow(0, 1, 'REPORT HUMAN RESOURCE')

        	->getStyle('A1:H1')->getAlignment()->applyFromArray(

			    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)

			);

		$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setSize(16);



        $objPHPExcel->getActiveSheet()

            ->mergeCells('A2:H2')

            ->setCellValueByColumnAndRow(0, 2, 'MOON '.strtoupper(bulan_en($month_now)).' '.$year_now)

            ->getStyle('A2:H2')->getAlignment()->applyFromArray(

                array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)

            );

        $objPHPExcel->getActiveSheet()->getStyle("A2:H2")->getFont()->setSize(16);



        $objPHPExcel->getActiveSheet()

            ->mergeCells('A4:H4')

            ->setCellValueByColumnAndRow(0, 4, 'Efektif hari kerja : '.$kerja.' Hari');

		/*end title*/  



        /*start style*/

        $BStyleHeader = array(

            'borders' => array(

                'allborders' => array(

                    'style' => PHPExcel_Style_Border::BORDER_THIN

                )

            ),

            'font'  => array(

                'bold'  => true,

                'size'  => 12

            ),

            'alignment' => array(

                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

            )

        );



        $StyleLembaga = array(

            'font'  => array(

                'bold'  => true

            ),

            'borders' => array(

                'allborders' => array(

                    'style' => PHPExcel_Style_Border::BORDER_THIN

                )

            )

        );

        



        $BStyleBody = array(

            'borders' => array(

                'allborders' => array(

                    'style' => PHPExcel_Style_Border::BORDER_THIN

                )

            )

        );



        $style = array(

            'borders' => array(

                'allborders' => array(

                    'style' => PHPExcel_Style_Border::BORDER_THIN

                )

            ),

            'alignment' => array(

                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

            )

        );

        /*end style*/



        /*start header*/

        $objPHPExcel->getActiveSheet()->getStyle('A5:H5')->applyFromArray($BStyleHeader);

        $objPHPExcel->getActiveSheet()->getStyle('A6:H6')->applyFromArray($BStyleHeader);



        $objPHPExcel->getActiveSheet()

            ->mergeCells('A5:A6')

            ->setCellValueByColumnAndRow(0, 5, 'NO')

            ->getStyle('A5:A6')->getAlignment()->applyFromArray(

                array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)

            );

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->mergeCells('B5:B6')

            ->setCellValueByColumnAndRow(1, 5, 'NAMA')

            ->getStyle('B5:B6')->getAlignment()->applyFromArray(

                array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)

            );

        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->mergeCells('C5:H5')

            ->setCellValueByColumnAndRow(2, 5, 'KEDISIPLINAN')

            ->getStyle('C5:H5')->getAlignment()->applyFromArray(

                array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)

            );



        $objPHPExcel->getActiveSheet()

            ->setCellValue('C6', 'KEHADIRAN')

            ->getColumnDimension('C')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->setCellValue('D6', '%')

            ->getColumnDimension('D')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->setCellValue('E6', 'TELAT')

            ->getColumnDimension('E')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->setCellValue('F6', 'IZIN')

            ->getColumnDimension('F')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->setCellValue('G6', 'SAKIT')

            ->getColumnDimension('G')->setAutoSize(true);



		$objPHPExcel->getActiveSheet()

            ->setCellValue('H6', 'CUTI KHUSUS')

            ->getColumnDimension('H')->setAutoSize(true);

		
		
		$objPHPExcel->getActiveSheet()

            ->setCellValue('I6', 'CUTI TAHUNAN')

            ->getColumnDimension('I')->setAutoSize(true);


		$objPHPExcel->getActiveSheet()

            ->setCellValue('J6', 'REMOTE')

            ->getColumnDimension('J')->setAutoSize(true);



        $objPHPExcel->getActiveSheet()

            ->setCellValue('K6', 'ALFA')

            ->getColumnDimension('K')->setAutoSize(true);

        /*end header*/  





        /*start body*/

        $merge_l_a = 7;

        $merge_l_h = 7;



        $merge_b_a = 7;

        $merge_b_h = 7;



        $no_l = 7;



        $no = 1;

        foreach ($q_lembaga as $lRow) 

        {

            $objPHPExcel->getActiveSheet()

            ->mergeCells('A'.$merge_l_a++.':H'.$merge_l_h++)

            ->setCellValue('A'.$no_l++, strtoupper($lRow->lembaga_name) );

            $objPHPExcel->getActiveSheet()->getStyle('A'.$merge_b_a++.':H'.$merge_b_h++)->applyFromArray($StyleLembaga);



            $q_rekap_bulanan = $this->m_rekap_bulanan->f001_getKaryawan($lRow->lembaga_id)->result();

            foreach ($q_rekap_bulanan as $row) 

            {

                $objPHPExcel->getActiveSheet()->setCellValue('A'.$col_no_a++, $no++);

            }

        }

        

        /*end body*/ 

                 



        $objPHPExcel->getActiveSheet()->setTitle('Sheet1');



        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

        header("Cache-Control: no-store, no-cache, must-revalidate");

        header("Cache-Control: post-check=0, pre-check=0", false);

        header("Pragma: no-cache");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment; filename="'.$title.'.xlsx"');

        $objWriter->save("php://output");

	}



	public function export_to_pdf($filter_mulai, $filter_akhir, $lembaga)

	{

        if ($lembaga == 'semua') 

		{

			$data['tanggal'] = tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



			$data['filter_mulai'] 	= $filter_mulai;

			$data['filter_akhir'] 	= $filter_akhir;



			$data['title_page'] = $title_page = 'Rekap Bulan '.tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



	        $data['q_lembaga'] = $this->m_rekap_bulanan->f008_getLembaga()->result();



			// $data['title_page'] = $title_page = 'Rekap Bulan '.month_in($month_now).' '.$year_now;

			$this->pdf->load_view('rekap_harian/v_rekap_harian_print', $data);

	  		$this->pdf->set_paper("A4", "portrait"); //landscape or portrait

	  		$this->pdf->render();



	  		$this->pdf->stream("$title_page.pdf", array('Attachment' => TRUE));

		}

		else

		{

			$data['tanggal'] = tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



			$data['filter_mulai'] 	= $filter_mulai;

			$data['filter_akhir'] 	= $filter_akhir;



			$data['lembaga_header'] = $this->m_rekap_bulanan->f016_getLembaga($lembaga)->row()->lembaga_name;



			$data['title_page'] = $title_page = 'Rekap Bulan '.tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



	       	$data['q_rekap_harian']	= $this->m_rekap_bulanan->f015_getKaryawanView($lembaga)->result();



			// $data['title_page'] = $title_page = 'Rekap Bulan '.month_in($month_now).' '.$year_now;

			$this->pdf->load_view('rekap_harian/v_rekap_harian_print_lembaga', $data);

	  		$this->pdf->set_paper("A4", "portrait"); //landscape or portrait

	  		$this->pdf->render();



	  		$this->pdf->stream("$title_page.pdf", array('Attachment' => TRUE));

		}

	}



	public function export_to_print($filter_mulai, $filter_akhir, $lembaga)

	{

		if ($lembaga == 'semua') 

		{

			$data['tanggal'] = tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



			$data['filter_mulai'] 	= $filter_mulai;

			$data['filter_akhir'] 	= $filter_akhir;



			$data['title_page'] = $title_page = 'Rekap Bulan '.tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



	        $data['q_lembaga'] = $this->m_rekap_bulanan->f008_getLembaga()->result();



			// $data['title_page'] = $title_page = 'Rekap Bulan '.month_in($month_now).' '.$year_now;

			$this->pdf->load_view('rekap_harian/v_rekap_harian_print', $data);

	  		$this->pdf->set_paper("A4", "portrait"); //landscape or portrait

	  		$this->pdf->render();



	  		$this->pdf->stream("$title_page.pdf", array('Attachment' => false));

		}

		else

		{

			$data['tanggal'] = tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



			$data['filter_mulai'] 	= $filter_mulai;

			$data['filter_akhir'] 	= $filter_akhir;



			$data['lembaga_header'] = $this->m_rekap_bulanan->f016_getLembaga($lembaga)->row()->lembaga_name;



			$data['title_page'] = $title_page = 'Rekap Bulan '.tgl_en($filter_mulai).' - '.tgl_en($filter_akhir);



	       	$data['q_rekap_harian']	= $this->m_rekap_bulanan->f015_getKaryawanView($lembaga)->result();



			// $data['title_page'] = $title_page = 'Rekap Bulan '.month_in($month_now).' '.$year_now;

			$this->pdf->load_view('rekap_harian/v_rekap_harian_print_lembaga', $data);

	  		$this->pdf->set_paper("A4", "portrait"); //landscape or portrait

	  		$this->pdf->render();



	  		$this->pdf->stream("$title_page.pdf", array('Attachment' => false));

		}

		

	}



}



/* End of file Rekap_harian.php */

/* Location: ./application/controllers/Rekap_harian.php */