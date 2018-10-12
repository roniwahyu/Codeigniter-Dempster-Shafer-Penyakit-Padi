$(document).ready(function(){


        
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
                { "sClass": "id_peny_gejala","sName": "id_peny_gejala","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "id_penyakit", "sName": "id_penyakit", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "id_gejala", "sName": "id_gejala", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "density", "sName": "density", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  