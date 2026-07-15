

$result = $this->db->from('transaksi')
		->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'inner')
		->where('transaksi.id_transaksi = detail_transaksi.id_transaksi')->get();

 $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi');

->select('transaksi.id_transaksi, detail_transaksi.nama_produk, detail_transaksi.harga_produk')
    ->where('transaksi.id_transaksi', 'detail_transaksi.id_transaksi')
    ->get('id_transaksi, nama_pelanggan, nama_produk, harga_produk'); 

<?php
#login
    <!-- <script type="text/javascript">
        <?php if ($this->session->set_flashdata('error'))
        {
            ?>
            Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href="">Why do I have this issue?</a>'
})
        <?php }
        ?>
    </script> -->
    
public function index_transaksi($id_transaksi)
{
	#return $this->db->from('transaksi')
	#->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'inner')
	#->get()
	#->result_array();
	$result = $this->db->where('id_transaksi', $id_transaksi)->get('transaksi');
	if($result->num_rows() > 0)
	{
		return $result->result();
	}
	else
	{
		return false;
	}
}
public function detail_transaksi($id_transaksi)
{
	$result = $this->db->where('id_transaksi', $id_transaksi)->get('detail_transaksi');
	if($result->num_rows() > 0)
	{
		return $result->result();
	}
}

#return $this->db->get('transaksi')
		#->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')
		#->join('pelanggan', 'transaksi.id = pelanggan.id')
		#->join('produk', 'detail_transaksi.id_produk = produk.id_produk');

		#$query = $this->db->query("select * from transaksi a left join pelanggan b on a.id = b.id order by id_transaksi", "select * from produk c full outer join detail_transaksi on c.id_produk = d.id_produk");

		#$query = $this->db->query("select * from transaksi, pelanggan, detail_transaksi, produk where transaksi.id_transaksi = detail_transaksi.id_transaksi, transaksi.id = pelanggan.id, and detail_transaksi.id_produk = produk.id_produk order by id_transaksi");

		#$query = $this->db->query("select * from transaksi a 
		#	left join pelanggan b on a.id = b.id 
		#	left join detail_transaksi c on a.id_transaksi = c.id_transaksi
		#	left join produk d on c.id_produk = d.id_produk  
		#	order by a.id_transaksi");
		#if($query->num_rows() > 0)
		#{
		#	return $query->result();
		#}
		#return $this->db->get('transaksi');


		#return $this->db->from('transaksi')
		#->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'inner')
		#->get()
		#->result_array();

function detail_transaksi($id_transaksi)
    {
        $data['transaksi'] = $this->Model_transaksi->index_transaksi($id_transaksi);
        $data['detail_transaksi'] = $this->Model_transaksi->detail_transaksi($id_transaksi);
    }

    ->where('id_transaksi')->get('detail_transaksi')

    $result = $this->db->from('transaksi')->get('detail_transaksi');
    
    $this->db->where('id_transaksi', $trs->id_transaksi); 
	$detail_transaksi = $this->db->get('detail_transaksi');
	foreach($detail_transaksi->result() as $dtrs):

		
    	#$query = $this->Model_transaksi->view_transaksi();
    	#$data = array(
    	#	'title' => 'Dashboard Transaksi',
    	#	'isi' => 'transaksi/index',
    	#	'data' => $query
    	#);
?>

<a href="https://api.whatsapp.com/send?phone=62<?php echo $trs->nomor_wa ?>" target="_blank">
	<i class="bi bi-whatsapp"></i>
</a>

<a href="https://api.whatsapp.com/send?phone=62<?php echo $trs->nomor_wa ?>" target="_blank">
	<?php echo $trs->nomor_wa ?>
</a>