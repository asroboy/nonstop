<?php 
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Welcome extends CI_Controller{

	function __construct(){
		parent::__construct();

	}


    public function Logout(){
		$this->session->sess_destroy();
		redirect(base_url(''));
	}

	public function index(){
	    echo "hellooooooooooooooooooooooooooooooo";
		
	}

	public function popupvideo(){
	    $this->load->view('public/popupvideo.php');
	}

	public function slider(){
	    $this->load->view('public/slider.php');
	}

	public function hm()
	{
		echo "string";
	}

	public function pdf($target){
	    $this->load->library('pdf');
	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'format/'.$target.".pdf";
	    $this->pdf->load_view('format/'.$target.'.php');
	}

	public function excel(){
		$konf = $this->Model_main->Konf();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator($konf['nama_company_id'])
		->setLastModifiedBy($konf['nama_company_id'])
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory($konf['nama_company_id']);

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'Nama')
		->setCellValue('B1', 'Hobby')
		;

		for ($i=2; $i < 100 ; $i++) { 
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, 'Saya siapa?')
			->setCellValue('B'.$i, 'Hobby siapa?')
			;
		}
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(25);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Excel '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Excel ['.date('d-m-Y H').'].xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function email()
	{
		$from_email = "no-reply@gmail.com";
        $to_email = "muhamadaderohayat122@gmail.com";
        $data = array('msg' => 'dinas', );
       	$mesg = $this->load->view('format/email', $data,TRUE);
            
        $this->load->library('email');
        $config = $this->Model_main->ConfigMail();
            
        $this->email->initialize($config);
       	$this->email->from($from_email, 'Cek Dinas');
        $this->email->to($to_email);
        $this->email->subject('Cek Dinas');
        $this->email->message($mesg);
        if($this->email->send()){
            echo 'berhasil';
        }else{
            echo 'gagal';
        }
        echo $this->email->print_debugger();
	}

	public function API()
	{
		$k_api = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
		$data = json_decode($k_api, TRUE);
			echo "<pre>";
		print_r($data);
	}


}