<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-ykPjIy65ghymlLcw5sI2nBC_', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		
		$id_transaksi = date('YmdHis').rand();
		$program_id = $this->input->post('program_id');
    	$nama = $this->input->post('nama_donatur');
    	$no_telepon = $this->input->post('no_telepon');
    	$email_donatur = $this->input->post('email_donatur');
    	$nominal = $this->input->post('nominal');
    	$catatan_donatur = $this->input->post('catatan_donatur');

    	$ganti_nama = $this->input->post('ganti_nama');
    	if($ganti_nama == 'on') {
    		$nama_donatur = 'Hamba Allah';
    	} else {
    		$nama_donatur = $nama;
    	}

    	$data = [
    		'id_transaksi' => $id_transaksi,
    		'program_id' => $program_id,
    		'nominal' => $nominal,
    		'nama_donatur' => $nama_donatur,
    		'email_donatur' => $email_donatur,
    		'no_telepon' => $no_telepon,
    		'detail_id' => '',
    		'catatan_donatur' => $catatan_donatur,
    	];

		// Required
		$transaction_details = array(
		  'order_id' => $id_transaksi,
		  'gross_amount' => $nominal, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $nominal,
		  'quantity' => 1,
		  'name' => "Pembayaran Donasi"
		);

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// // Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
		  'first_name'    => $nama,
		  'email'         => $email_donatur,
		  'phone'         => $no_telepon,
		  // 'billing_address'  => $billing_address,
		  // 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		if($snapToken) {
			$this->db->insert('transaksi', $data);
		}
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'), true);

    	$data = [
    		'id_detail' 		=> $result['transaction_id'],
    		'payment_type' 		=> $result['payment_type'],
    		'transaction_time' 	=> $result['transaction_time'],
    		'bank' 				=> $result['va_numbers'][0]['bank'],
    		'va_number' 		=> $result['va_numbers'][0]['va_number'],
    		'pdf_url' 			=> $result['pdf_url'], 
    		'status_code'		=> $result['status_code'],
    	];

    	if($result) {
    		$this->db->insert('detail', $data);
    		$this->db->where('id_transaksi', $result['order_id']);
    		$this->db->update('transaksi', ['detail_id' => $result['transaction_id']]);
    		redirect('home');
    	} else {
    		redirect('home');
    	}
    }
}
