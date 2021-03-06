<!-- Begin: Content -->
<section id="content">

    <div class="row">
        <div class="col-md-12 pn">
            <div class="panel mbn">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="javascript:">

                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">No. Unit</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pno_unit"></p>
                                <button class="row-unit hidden" id="eno_unit" data-encunit=""></button>
                            </div>
                        </div>
                        <?php if($this->session->userdata('type_entity')==='HR') { ?>
                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Type</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="ptype_unit"></p>
                            </div>
                            <label class="col-lg-2 control-label">Tower</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="ptower_cluster"></p>
                            </div>
                        </div>
                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Luas Netto</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pwide_netto"></p>
                            </div> 
                            <label class="col-lg-2 control-label">Luas Semi Gross</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pwide_gross"></p>
                            </div>
                        </div>
                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Lantai</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="plantai_blok"></p>
                            </div> 
                            <label class="col-lg-2 control-label">View</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pdirection"></p>
                            </div>
                        </div>
                        <?php } elseif($this->session->userdata('type_entity')==='LD') { ?>
                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Type</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="ptype_unit"></p>
                            </div>
                            <label class="col-lg-2 control-label">Cluster</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="ptower_cluster"></p>
                            </div>
                        </div>
                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Luas Bangunan</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pwide_netto"></p>
                            </div> 
                            <label class="col-lg-2 control-label">Luas Tanah</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pwide_gross"></p>
                            </div>
                        </div>
                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Blok</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="plantai_blok"></p>
                            </div> 
                            <label class="col-lg-2 control-label">Arah Mata Angin</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pdirection"></p>
                            </div>
                        </div>
                        <?php } ?>
                        <div id="prices-container">

                        <div class="form-group mbn">
                            <label class="col-lg-2 control-label">Harga</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted input-numeric" id="pharga">0</p>
                            </div> 
                            <label class="col-lg-2 control-label">Terbilang</label>
                            <div class="col-lg-4">
                                <p class="form-control-static text-muted" id="pterbilang"></p>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 pn">
            <div class="panel-group accordion" id="panel-payment-plan">
                <div class="panel">
                    <div class="panel-heading bg-success2">
                        <a class="accordion-toggle accordion-icon" data-toggle="collapse" data-parent="#panel-payment-plan" href="#panel-payment-plan-item1" style="color:#fff">Payment Plan</a>
                    </div>
                    <div id="panel-payment-plan-item1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="javascript:" id="form-payment">

                                <input type="hidden" id="status_tr" name="status_tr" value="RESERVE"/> 
                                <input type="hidden" id="hold_date" name="hold_date"/> 
                                <input type="hidden" id="no_unit" name="no_unit"/>
                                <input type="hidden" id="harga" name="harga"/>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tgl. Akad Kredit</label>
                                    <div class="col-lg-3">
                                        <input type="text" name="tgl_akad" id="tgl_akad" class="form-control input-sm" value="<?=date('d/m/Y')?>">
                                    </div>
                                    <label class="col-lg-3 control-label">Tgl. Penyerahan Aplikasi</label>
                                    <div class="col-lg-3">
                                        <input type="text" name="tgl_dokumen" id="tgl_dokumen" class="form-control input-sm" value="<?=date('d/m/Y')?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">No. Reserve</label>
                                    <div class="col-lg-4"> 
                                        <p class="form-control-static text-muted" id="preserve_no">RSV----------</p>
                                        <input type="hidden" name="reserve_no" id="reserve_no">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">ID Sales</label>
                                    <div class="col-lg-4">
                                        <select name="sales_no" id="sales_no" class="chosen-select">
                                            <option value=""></option>
                                            <?php foreach($data['saleses'] as $k => $v) { ?>
                                            <option value="<?=$v['kode']?>"><?=$v['nama']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Cara Bayar</label>
                                    <div class="col-lg-10">
                                        <select name="cara_bayar" id="cara_bayar" class="chosen-select">
                                            <option value=""></option>
                                            <?php foreach($data['paymodes'] as $k => $v) { ?>
                                            <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb50">
                                    <label class="col-lg-2 control-label">Pola Bayar</label>
                                    <div class="col-lg-10"> 
                                        <select name="kode_pay" id="kode_pay" class="chosen-select">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div id="pay-container"></div>
                                <div class="form-group hidden">
                                    <label class="col-lg-2 control-label">Bank KPR</label>
                                    <div class="col-lg-10">
                                        <select name="kode_bank" id="kode_bank" class="chosen-select">
                                            <option value=""></option>
                                            <?php foreach($data['bankkpr'] as $k => $v) { ?>
                                            <option value="<?=$v['kode']?>"><?=$v['nama']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt20">
                                    <input type="hidden" id="is_diskon" value="0"/>
                                    <label class="col-lg-2 control-label">&nbsp;</label>
                                    <div class="col-lg-2">
                                        <button type="button" id="btn-pilih-diskon" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Pilih Diskon</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pn">
        <form class="form-horizontal" role="form" action="javascript:" id="form-customer">
            <div class="panel-group accordion" id="example1">
                <div class="panel">
                    <div class="panel-heading bg-success2" style="padding: 1px 0px 0px 5px!important;">
                        <a class="accordion-toggle accordion-icon" data-toggle="collapse" data-parent="#example1" href="#panel-item1" style="color:#fff">Data Nasabah</a>
                    </div>
                    <div id="panel-item1" class="panel-collapse collapse in">
                        <div class="panel-body">
            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Kode Nasabah</label>
                                <div class="col-lg-4">
                                    <p class="form-control-static text-muted" id="pkode"></p>
                                    <input type="hidden" name="kode" id="kode">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Klasifikasi <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <select id="klasifikasi" name="klasifikasi" class="chosen-select">
                                        <option value=""></option>
                                    <?php foreach($data['klasifikasi'] as $k => $v) { ?>
                                        <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label">Salutation <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <select id="salutation" name="salutation" class="chosen-select">
                                        <option value=""></option>
                                    <?php foreach($data['salutation'] as $k => $v) { ?>
                                        <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nama Nasabah <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="nama" id="nama" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Jenis Identitas <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <select id="jenis_id" name="jenis_id" class="chosen-select">
                                        <option value=""></option>
                                    <?php foreach($data['jenis_id'] as $k => $v) { ?>
                                        <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label">No. Identitas <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="no_id" id="no_id" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">NPWP <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="npwp" id="npwp" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">HP <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="hp" id="hp" class="form-control input-sm">
                                </div>
                                <label class="col-lg-2 control-label">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="email" id="email" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-sm">
                                </div>
                                <label class="col-lg-2 control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Kewarga negaraan</label>
                                <div class="col-lg-4">
                                    <select id="nationality" name="nationality" class="chosen-select">
                                        <option value=""></option>
                                    <?php foreach($data['nationality'] as $k => $v) { ?>
                                        <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <label class="col-lg-2 control-label">Agama</label>
                                <div class="col-lg-4">
                                    <select id="agama" name="agama" class="chosen-select">
                                        <option value=""></option>
                                    <?php foreach($data['agama'] as $k => $v) { ?>
                                        <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Jenis Kelamin</label>
                                <div class="col-lg-4">
                                    <select id="jk" name="jk" class="chosen-select">
                                        <option value=""></option>
                                    <?php foreach($data['jk'] as $k => $v) { ?>
                                        <option value="<?=$v['kode']?>"><?=$v['konten']?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;</label>
                                <div class="col-lg-4">
                                    <button type="button" id="btn-add-alamat" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Alamat</button>
                                </div>
                            </div>
                            <div id="alamat-container">
                            <div class="alamat-group">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Alamat #1</label>
                                <div class="col-lg-4">
                                    <textarea name="alamat[]" class="form-control input-sm" row="3"></textarea>
                                </div>
                                <label class="col-lg-2 control-label blank-label">&nbsp;</label>
                                <div class="col-lg-4">
                                    <div class="radio-custom square radio-success">
                                        <input id="ckalamat-1" type="radio" value="0" name="idx-alamat">
                                        <label for="ckalamat-1"> Alamat Surat-menyurat ?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Kota</label>
                                <div class="col-lg-4">
                                    <input type="text" name="kota[]" class="form-control input-sm">
                                </div>
                                <label class="col-lg-2 control-label">Kodepos</label>
                                <div class="col-lg-4">
                                    <input type="text" name="kodepos[]" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">No. Telepon</label>
                                <div class="col-lg-4">
                                    <input type="text" name="telp[]" class="form-control input-sm">
                                </div>
                                <label class="col-lg-2 control-label">Fax</label>
                                <div class="col-lg-4">
                                    <input type="text" name="fax[]" class="form-control input-sm">
                                </div>
                            </div>

                            </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nama Perusahaan</label>
                                <div class="col-lg-4">
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control input-sm">
                                </div>
                                <label class="col-lg-2 control-label">Alamat Perusahaan</label>
                                <div class="col-lg-4">
                                    <textarea name="alamat_perusahaan" id="alamat_perusahaan" class="form-control input-sm" row="3"></textarea>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    </div>


<div class="row mt20 text-center">
    <div class="col-md-9">&nbsp;</div> 
    <div class="col-md-2">
        <button type="button" id="btn-reserve" class="btn btn-primary btn-gradient dark btn-block">Submit Reserve</button>
    </div>
</div>

    <!-- modal -->
    <div class="modal fade" role="dialog" id="modal-diskon">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Transaksi Diskon</h4>
                </div>
                <div class="modal-body">
                    <div class="row mb10">
                        <label class="col-lg-2 control-label">Jenis Diskon</label>
                        <div class="col-lg-6">
                            <select id="sel-diskon" class="chosen-select">
                                <option value=""></option>
                            <?php foreach($data['diskons'] as $k => $v) { ?>
                                <option value="<?=$v['diskon']?>" data-jenis="<?=$v['jenis']?>" data-meka="<?=$v['mekanisme']?>"><?=$v['nama']?> (<?=$v['mekanisme']?>)</option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" id="datatable-diskon" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="bg-primary light bg-gradient">
                                        <th>Jenis Payment</th>
                                        <th>Nominal Lama</th>
                                        <th>Nominal Baru</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-submit-diskon" class="btn btn-primary btn-gradient dark">Terapkan</button>
                    <button type="button" id="btn-cancel-diskon" class="btn btn-danger btn-gradient dark">Batal</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- modal end -->

</section>
<!-- End: Content -->