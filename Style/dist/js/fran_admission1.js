jQuery(function ($) {
    'use strict';
    $('#table-basic').dataTable();
    $('#table-basic_wrapper select.form-control').select2({minimumResultsForSearch: -1});
});
jQuery(function () {
    'use strict';
	var $=jQuery.noConflict();	
    function format(data){ 
	    
        return '<p class="lead" style="margin-left: 25px; float: left; margin-right: 50px;">More Details</p>' +
		       '<table class=moretab style="width:75%;">'+
			   '<thead><tr><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">Pres.Address</th><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">Perm.Address</th><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">D.O.B</th><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">Gender</th><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">S/o,W/o,D/o</th></tr></thead>'+
			   '<tbody><tr><td style="padding:8px 10px;overflow:hidden;">'+data[14]+'</td><td style="padding:8px 10px;overflow:hidden;">'+data[15]+'</td><td style="padding:8px 10px;overflow:hidden;">'+data[17]+'</td><td style="padding:8px 10px;">'+data[18]+'</td><td style="padding:8px 10px;">'+data[16]+'</td></tr></tbody>'+   
 '</table>&hellip;';
											
    }

    var $rowDetailsTable = $('#table-hidden-row-details');
    // Insert a 'dt-details-control' column to the table
    $rowDetailsTable.find('thead tr, tfoot tr').each(function () {
       // this.insertBefore(document.createElement('th'), this.childNodes[0]);
    });
    $rowDetailsTable.find('tbody tr').each(function () {
        //$(this).prepend('<td class="dt-details-control"><i class="fa fa-fw dt-details-toggle"></i></td>');
    });

    var rowDetailsTable = $rowDetailsTable.dataTable({
        'processing': true,
        'aoColumnDefs': [
            { 'bSortable': false, 'aTargets': [ 0 ] }
        ],
        'order': [
            [1, 'asc']
        ]
    });
    $rowDetailsTable.find('tbody').on('click', 'tr td:first-child', function () {
        var tr = $(this).parents('tr');
        var row = $rowDetailsTable.api().row(tr);
        if (row.child.isShown()) {
            tr.removeClass('details');
            row.child.hide();

        } else {
            tr.addClass('details');
            row.child(format(row.data())).show();

        }
    });

    //$('#table-hidden-row-details_wrapper select.form-control').select2({minimumResultsForSearch: -1});
});
;