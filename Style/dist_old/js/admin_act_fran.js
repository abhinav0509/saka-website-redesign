jQuery(function ($) {
    'use strict';
    $('#table-basic').dataTable();
    $('#table-basic_wrapper select.form-control').select2({minimumResultsForSearch: -1});
});
jQuery(function () {
    'use strict';
	var $=jQuery.noConflict();	
    function format(data) {
        return '<p class="lead" style="margin-left: 25px; float: left; margin-right: 50px;">More Details</p>' +
		       '<table class=moretab style="width:75%;">'+
			   '<tr><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">Address</th><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">PinCode</th><th style="padding:8px 10px; border: 1px solid #ccc; text-align:center;">City</th></tr>'+
			   '<tr><td style="padding:8px 10px;overflow:hidden;" title="'+data[11]+'">'+data[11]+'</td><td style="padding:8px 10px;overflow:hidden;" title="'+data[12]+'">'+data[12]+'</td><td style="padding:8px 10px;overflow:hidden;" title="'+data[13]+'">'+data[13]+'</td></tr>'+          
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