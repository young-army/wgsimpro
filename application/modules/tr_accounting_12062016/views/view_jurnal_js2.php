<script type="text/javascript" src="<?=base_url()?>assets/vendor/plugins/datatables/extensions/ReloadAjax/js/dataTables.reloadAjax.min.js"></script>
<script src="<?=base_url()?>assets/vendor/plugins/table2excel/jquery.table2excel.js"></script>
<script type="text/javascript">

var table = null;
var loadJurnal = function() {
  var periode = $('#periode').val(),
    arrPer = periode.split('/'),
    bln = arrPer[0],
    thn = arrPer[1],
    groupBy = $('#group_by').val();
    if($('#group_by').val()==''){
        $('#datatable').dataTable().fnReloadAjax('<?=base_url()?>index.php/jurnal/DT/'+bln+'-'+thn);
    }else{
        $('#datatable').dataTable().fnReloadAjax('<?=base_url()?>index.php/jurnal/vjurnal_dt/'+bln+'-'+thn+'/'+groupBy);
    }
    
};
  $(document).ready( function () {
    $('.input-date').datetimepicker({
    minViewMode: 'months',
    pickTime: false,
    format: 'MM/YYYY'
  });
    $('body').addClass('sb-l-m');
    var periode = $('#periode').val(),
        arrPer = periode.split('/'),
        bln1 = arrPer[0],
        thn1 = arrPer[1];

  $('#modal-list_nobuk').modal({
        show: false,
        backdrop: false
    });

  var t_listnobuk =$('#datatable-listnobuk').DataTable({
    "bServerSide":true,
    "bProcessing":true,
    "sPaginationType": "full_numbers",
    "bFilter":true,
    "sServerMethod": "POST",
    "ajax": "<?=base_url()?>index.php/jurnal/listNoBuk/A",
    "columns": [
      { "name": 0 }
    ]
  });

  $('#btn-v_listnobuk').on('click', function(){
    $('#modal-list_nobuk').modal('show');
  });
  $('#btn-close').on('click', function(){
    $('#modal-list_nobuk').modal('hide');
  });

  $('[data-toggle="tooltip"]').tooltip(); 

  $('#exp2excel').on('click', function(){
        $('.export2excel').table2excel({
            exclude: ".noExl",
            name: "VIEWJURNAL",
            filename: "VIEW_JURNAL_"+periode,
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
  table =$('#datatable').DataTable({
      "bServerSide": true,
      "bProcessing": true,
      "lengthMenu": [[10, 25, 50, 100, 200, 500, 99999], [10, 25, 50, 100, 200, 500, 'All']],
      "sPaginationType": "full_numbers",
      "bSortable": true,
      "sServerMethod": "POST", 
        "bInfo": false,
        "bRetrieve": true,
        "ordering": true,
        "orderMulti": true,
      "columnDefs": [ { "visible": true, "targets": 0 } ],
      "order": [[ 0, 'desc' ]],
      "aaSorting": [[0, 'desc'],[1, 'desc']],
      "drawCallback": function ( settings ) {
        if( $('#group-switch').is(':checked') ) {
          var api = this.api();
          var rows = api.rows( {page:'current'} ).nodes();
          var last=null;
          //var cell = table.cell( this );
          //var dtval = cell.data( cell.data() + 1 ).draw();
          api.column(0, {page:'current'} ).data().each( function ( group, i ) {
            console.log(group);
              if ( last !== group ) {
                  $(rows).eq( i ).before(
                      '<tr class="group">'+
                      '   <td colspan="14">'+
                      '     <table> '+
                      '       <!--td><input name="no_bukti[]" id="no_bukti[]" type="radio" value="'+group+'">&nbsp;&nbsp;</td-->'+
                      '       <td><b><h5>'+group+'</h5></b></td> '+
                      '       <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                      '           <a href="javascript:" class="row-edit" data-toggle="tooltip" title="Edit Nomor Bukti" data-val="'+group+'" tgl-val="'+this.column(1).data().reduce( function (tanggal) { return tanggal; })+'"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;'+
                      '           <a href="javascript:" class="row-delete" data-toggle="tooltip" title="Hapus per-Nomor Bukti" data-val="'+group+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                      '       </td> '+
                      '     </table> '+
                      '   </td> '+
                      '</tr>'
                  );
                  last = group;
              }
          });
        }
      },
      "sAjaxSource": '<?=base_url()?>index.php/jurnal/DT',
      "createdRow": function ( row, data, index ) {
            $('td', row).eq(0).addClass('highlight');
            console.log(data[11])
            if(data[11] == null){
              
            }else{
              if ( data[11].replace(/[\$,]/g, '') * 1 > 0 ) {
                $('td', row).eq(11).addClass('highlight');
              }
              if ( data[12].replace(/[\$,]/g, '') * 1 > 0 ) {
                  $('td', row).eq(12).addClass('highlight');
              }
            }
            
        },
      "aoColumns": [
          { "name": "no_bukti", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "tanggal", "class": "text-center", "width": "60px", "bSortable": true },
          { "name": "kode_coa", "class": "text-center", "width": "40px", "bSortable": true },
          { "name": "keterangan", "class": "text-left","width": "150px", "bSortable": true },
          { "name": "kode_nasabah", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "kode_sumberdaya", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "kode_spk", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "kode_tahap", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "no_invoice", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "kode_faktur", "class": "text-center", "width": "100px", "bSortable": true },
          { "name": "volume", "class": "text-right", "width": "100px", "bSortable": true },
          { "name": "debet", "class": "text-right", "width": "100px", "bSortable": true },
          { "name": "kredit", "class": "text-right", "width": "100px", "bSortable": true },
          { "name": "volume", "class": "text-right", "width": "100px", "bSortable": true}
        ]

    });

    function dt_tgl(){
      table
          .column( 1 )
          .data()
          .reduce( function (tanggal) {
              return tanggal;
          } );
    }
    function createCookie(name, value) {
        var date = new Date();
        date.setTime(date.getTime()+(1120*1000));
        var expires = "; expires="+date.toGMTString();

       document.cookie = name+"="+value+expires+"; path=/";
    }
    $('body').on('click','.row-edit',function(){
        if(confirm('Nomor Bukti ini akan diedit ulang?')) {
            var id = $(this).attr('data-val');
            var tgl = $(this).attr('tgl-val');
            $('#no_bukti').val(id);
            $('#tanggal').val(tgl);
            $('#go-edit-jurnal').attr('action', "<?=base_url()?>index.php/jurnal-entry/edit");
            createCookie('is_edit_nobukti',id);
            createCookie('is_edit_tanggal',tgl);
            //createCookie('is_mode','edit');
            //var form=$("#form-input"); 
            $("#go-edit-jurnal").submit();
        }else{
            $('#no_bukti').val('');
        }
    });
    $('body').on('click','.row-delete',function(){
        if(confirm('Anda yakin Nomor Bukti ini akan dihapus?')) {
            var id = $(this).attr('data-val');
            
            $.post('del_nobuk/',{ no_bukti: id }).done(function( data ){

                //alert( "Data Loaded: " + data );
                loadJurnal();
                //table.ajax.reload();
                //table.draw();
            });
        }
    });
    $('#group-switch').change(function() {
        if($(this).is(':checked')) {
             table
                .columns( 0 )
                .visible( false )
                .draw();
          }
           else {
            table
                .columns( 0 )
                .visible(true)
                .draw();
          }
    });
    
    $('#btn-submit').click(function() {
        loadJurnal();
        //table.ajax.reload();
        //table.draw();
      
    });
      $('#show_kolom').on('change',function(){
        $( "select option:selected" ).each(function() {
            fnShowHide($( this ).val());
          });
      });
      $('#show_kolom').multiselect({
          buttonClass: 'multiselect dropdown-toggle btn btn-sm btn-primary btn-block'
      });
      function fnShowHide( iCol )
      {
        //var oTable = $('#datatable').DataTable();
        
        var bVis = oTbl.fnSettings().aoColumns[iCol].bVisible;
        oTbl.fnSetColumnVis( iCol, bVis ? false : true );
      }
  });

</script>

