<!-- Begin : Content -->
<section id="content">
	<div class="row">
		<div class="col-md-12-pn">
			<div class="panel">
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
						<thead>
							<tr class="bg-primary light bg-gradient">
								<th>#</th>
								<th>No.Reserve</th>
								<th>Nama Nasabah</th>
								<th>No.Unit</th>	
								<th>Ra</th>	
								<th>Ri</th>
								<th>Sisa</th>	
								<th>Tanggal Tempo</th>	
								<th>Email</th>	
								<th>Nomor HP</th>	
								<th>&nbsp;</th>	
							</tr>
						</thead>
						<tbody>
						<?php 
						$data = json_decode($data['jdata']);
						$i = 1;
							foreach($data as $row => $v){
								
						?>
						<tr>
							<td><?=$i?></td>
							<td><?=$v->reserve_no?></td>
							<td><?=$v->nama_nasabah?></td>
							<td><?=$v->no_unit?></td>	
							<td class="text-right"><?=number_format($v->rp_ra,0)?></td>
							<td class="text-right"><?=number_format($v->rp_ri,0)?></td>
							<td class="text-right"><?=number_format(($v->rp_ra-$v->rp_ri),0)?></td>
							<td><?=$v->tgl_tempo?></td>
							<td><?=$v->alamat_email?></td>
							<td><?=$v->no_hp?></td>
							<td>
							<?=($v->rp_ra-$v->rp_ri)==0?'':'
								<button id="btn-resendmail" onclick="action(\'emailid\','.$v->id.')" surel-id="'.$v->id.'">Email</button> <button id="btn-resendsms" onclick="action(\'sms\','.$v->id.')"sms-id="'.$v->id.'">SMS</button>'?>
							</td>
						</tr>
						<?php 
						$i++;
						}
						?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End : Content -->