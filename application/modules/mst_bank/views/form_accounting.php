<!-- Begin: Content -->
<section id="content">

    <div class="row">
        <div class="col-md-12 pn">
            <div class="panel">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="javascript:" id="form-input">

                        <input type="hidden" name="id" id="id"/>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Kode</label>
                            <div class="col-lg-2">
                                <input type="text" name="kode" id="kode" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Nama</label>
                            <div class="col-lg-4">
                                <input type="text" name="nama" id="nama" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">No. Rekening</label>
                            <div class="col-lg-4">
                                <input type="text" name="no_rekening" id="no_rekening" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Jenis</label>
                            <div class="col-lg-2">
                                <?=$data['cbo_jenis'];?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">CoA</label>
                            <div class="col-lg-2">
                                <input type="text" name="coa" id="coa" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Entity</label>
                            <div class="col-lg-4">
                                 <?=$data['cbo_entity'];?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">&nbsp;</label>
                            <div class="col-lg-2">
                                <button type="button" id="btn-submit" class="btn btn-primary btn-gradient dark btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End: Content -->