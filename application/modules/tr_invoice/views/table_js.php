<script type="text/javascript">
	// init action fn
	var action = function(act, id) {
		if(act==='edit') {
			location.href = "<?=base_url()?>index.php/invoice/edit/"+id;
		} else if(act==='delete') {
			if(confirm("Anda yakin akan menghapus data ini?")) {
				$.post("<?=base_url()?>index.php/invoice/delete/"+id,function(ev) {
					if(ev.response==='1') {
						alert('Data berhasil dihapus.');
						location.href = "<?=base_url()?>index.php/invoice";
					} else {
						alert('Data gagal dihapus, mohon diperiksa.');
					}
				});
			}
		}
	};
	// init plugins
	$('#datatable').dataTable({
		"bServerSide":true,
		"bProcessing":true,
		"sPaginationType": "full_numbers",
		"bFilter":true,
		"sServerMethod": "POST",
		"sAjaxSource": "<?=base_url()?>index.php/invoice/DT",
		"columns": [
			{ "name": "tanggal" },
			{ "name": "no_po" },
			{ "name": "kode_rekanan" },
			{ "name": "kode_bpdp" },
			{ "searchable": false, "sortable": false }
		]
	});
</script>
