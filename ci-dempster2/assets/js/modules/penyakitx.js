$(document).ready(function(){
    $("body").on("click",'.baru',function(e){
            e.preventDefault();
            $('a.setup-gejala').hide(200);
        }); 
    $("body").on("click",'.edit',function(e){
            e.preventDefault();
            $('a.setup-gejala').fadeIn(200);
        });
    $('body').on('click','.setup-gejala',function(e) {
        e.preventDefault(); 
        // var idx=$('#id_penyakit').val();
        // ajax load from data-url
        $('.modal-body').load($('a.setup-gejala').attr("data-url"),function(result){
            $('#modal-id').modal('show');
        });
      
    });

        $('body').on('click','.save-gejala',function(e) {
            var data = $('form').serializeArray();
            data.push({name: 'ajax', value: 1});
            // alert(data.id_gejala);
            $(this).ready(function(){
                 $.ajax({
                    url:baseurl+"submit_form",
                    data:data,
                    type:"POST",
                    success:function(){
                       /* $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                        // $('.kelola').fadeOut(200);

                       
                        
                        $('#inside').addClass('active in');
                        $('li.daftar').addClass('active');
                        $('li.baru').removeClass('active');
                        $('#outside').removeClass('active');
                        oTable.fnClearTable( 0 );
                        oTable.fnDraw();*/
                        // va/r id=0;
                        //$('.id').trigger("reset");
                        // alert(data);
                    }
                });
            });
           
        });
        oTable=$('#datatables').dataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bScrollCollapse": true,    
            "bStateSave": true,
            "responsive": true,
            "aoColumns": [
                { "sClass": "id_penyakit","sName": "id_penyakit","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "kode", "sName": "kode", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "penyakit", "sName": "penyakit", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "keterangan", "sName": "keterangan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "penyebab", "sName": "penyebab", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "penanggulangan", "sName": "penanggulangan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });

    /*function PopulateCheckBoxList() {
            $.ajax({
                type: "POST",
                url: "CheckBoxList.aspx/GetCheckBoxDetails",
                contentType: "application/json; charset=utf-8",
                data: "{}",
                dataType: "json",
                success: AjaxSucceeded,
                error: AjaxFailed
            });
        }
        function AjaxSucceeded(result) {
            BindCheckBoxList(result);
        }
        function AjaxFailed(result) {
            alert('Failed to load checkbox list');
        }
        function BindCheckBoxList(result) {
 
            var items = JSON.parse(result.d);
            CreateCheckBoxList(items);
        }
        function CreateCheckBoxList(checkboxlistItems) {
            var table = $('<table></table>');
            var counter = 0;
            $(checkboxlistItems).each(function () {
                table.append($('<tr></tr>').append($('<td></td>').append($('<input>').attr({
                    type: 'checkbox', name: 'chklistitem', value: this.Value, id: 'chklistitem' + counter
                })).append(
                $('<label>').attr({
                    for: 'chklistitem' + counter++
                }).text(this.Name))));
            });
 
            $('#dvCheckBoxListControl').append(table);
        }
      */
});   


  