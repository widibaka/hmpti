<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
$pdf = new FPDF('L');
// membuat halaman baru

$pdf->AddPage();

// echo '<pre>'; var_dump( $pendaftar ); die;

$image_exploded = explode('?', $event['sertifikat']);
$image_pisah_dengan_titik = explode('.', $image_exploded[0]);
$filetype = end( $image_pisah_dengan_titik );
$url = 'assets/img/events/' . $image_exploded[0];

$pdf->Image( $url , 0, 0, 297, 0, $filetype ); // zoom out yang paling pas 297. udah saya test
$color = explode(',', str_replace( ')', '', str_replace( 'rgb(', '', $sertifikat['font_color_id'] ) ));
$pdf->SetTextColor( (int)$color[0], (int)$color[1], (int)$color[2] );

// ID Peserta
$pdf->SetFont('Arial', 'B', 12);
if ( !empty( $this->input->get('test') ) ) { // menyiapkan bila test download berlaku
    $pdf->Cell( 0 , 0, 'ID: HMPTI0000000000', 0, 1, 'R'); 
}else{ 
    $pdf->Cell( 0 , 0, 'ID: '.$pendaftar['id_pendaftar'], 0, 1, 'R');
}


// set font yang akan digunakan
$pdf->SetFont('Arial', 'B', $sertifikat['font_size']);
$color = explode(',', str_replace( ')', '', str_replace( 'rgb(', '', $sertifikat['font_color_nama'] ) ));
$pdf->SetTextColor( (int)$color[0], (int)$color[1], (int)$color[2] );
// mencetak string 
if ( !empty( $this->input->get('test') ) ) { // menyiapkan bila test download berlaku
    $pdf->Cell($sertifikat['posisi_x'], $sertifikat['posisi_y'], ucwords( strtolower( 'TES NAMA PESERTA' )), 0, 1, 'C');   
}else{ 
    $pdf->Cell($sertifikat['posisi_x'], $sertifikat['posisi_y'], ucwords( strtolower( $pendaftar['nama'] )), 0, 1, 'C');
}


ob_clean();


if ( !empty( $this->input->get('test') ) ) {
    $nama_berkas = $event['judul'] . ' - TES DOWNLOAD';
}else{
    $nama_berkas = $event['judul'] . ' - ' . $pendaftar['nama'];
}
$pdf->Output('D', $nama_berkas .'.pdf');
