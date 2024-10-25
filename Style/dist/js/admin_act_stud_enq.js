jQuery(function ($) {
    'use strict';
    $('#table-basic').dataTable();
    $('#table-basic_wrapper select.form-control').select2({minimumResultsForSearch: -1});
});
// Hidden row details example
jQuery(function () {
    'use strict';
    function format(data) {
        return '<p class="lead" style="margin-left: 85px; float: left; margin-right: 50px;">More Details</p>' +
		       '<table class=moretab>'+
			   '<tr><th rowspan=2>Address</th><th rowspan=2>Contact</th><th rowspan=2>Email</th><th rowspan=2>Fax</th><th rowspan=2>Website</th><th colspan=3>Fit</th><th colspan=3>Group</th></tr>'+
			   '<tr><th>Twin</th><th>Single</th><th>Triple</th><th>Twin</th><th>Single</th><th>Triple</th></tr>'+
			   '<tr><td>'+data[5]+'</td><td>'+data[6]+'</td><td>'+data[7]+'</td><td>'+data[8]+'</td><td>'+data[9]+'</td><td>'+data[10]+'</td><td>'+data[11]+'</td><td>'+data[12]+'</td><td>'+data[13]+'</td><td>'+data[14]+'</td><td>'+data[15]+'</td></tr>'+          
               '</table>&hellip;';
    }

    var $rowDetailsTable = $('#table-hidden-row-details');
    // Insert a 'dt-details-control' column to the table
    //$rowDetailsTable.find('thead tr, tfoot tr').each(function () {
     //   this.insertBefore(document.createElement('th'), this.childNodes[0]);
		
    //});
    //$rowDetailsTable.find('tbody tr').each(function () {
       // $(this).prepend('<td class="dt-details-control"><i class="fa fa-fw dt-details-toggle" title="View More..."></i></td>');
   // });

    var rowDetailsTable = $rowDetailsTable.dataTable({
        'processing': true,
        'aoColumnDefs': [
            { 'bSortable': false, 'aTargets': [ 0 ] },
			{ 'bSortable': false, 'aTargets': [ 16 ] },
			{ 'bSortable': false, 'aTargets': [ 17 ] }
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

    $('#table-hidden-row-details_wrapper select.form-control').select2({minimumResultsForSearch: -1});
});
;