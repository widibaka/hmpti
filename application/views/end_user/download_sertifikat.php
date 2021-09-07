<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
$pdf = new FPDF('L');
// membuat halaman baru

$pdf->AddPage();

// echo '<pre>'; var_dump( $pendaftar ); die;

$image_exploded = explode('?', $event['sertifikat']);
$image_pisah_dengan_titik = explode('.', $image_exploded[0]);
$filetype = end( $image_pisah_dengan_titik );
$url = base_url() . 'assets/img/events/' . $image_exploded[0];


$pdf->Image( $url , 0, 0, 297, 0, $filetype ); // zoom out yang paling pas 297. udah saya test
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 30);
// mencetak string 
if ( !empty( $this->input->get('test') ) ) { // menyiapkan bila test download berlaku
    $pdf->Cell($sertifikat['posisi_x'], $sertifikat['posisi_y'], 'TES NAMA PESERTA', 0, 1, 'C');   
}else{ 
    $pdf->Cell($sertifikat['posisi_x'], $sertifikat['posisi_y'], $pendaftar['nama'], 0, 1, 'C');
}

ob_clean();


if ( !empty( $this->input->get('test') ) ) {
    $nama_berkas = $event['judul'] . ' - TES DOWNLOAD';
}else{
    $nama_berkas = $event['judul'] . ' - ' . $pendaftar['nama'];
}
$pdf->Output('D', $nama_berkas .'.pdf');
