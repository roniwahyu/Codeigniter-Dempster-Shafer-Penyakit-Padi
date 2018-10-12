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
                { "sClass": "id_temp","sName": "id_temp","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "var1", "sName": "var1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "var2", "sName": "var2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "var3", "sName": "var3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "var4", "sName": "var4", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "val1", "sName": "val1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "val2", "sName": "val2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "val3", "sName": "val3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "val4", "sName": "val4", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  