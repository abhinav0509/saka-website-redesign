jQuery(function ($) {
    'use strict';
    
});
//alert("hgfjhg");
jQuery(function () {
    'use strict';
	var $=jQuery.noConflict();	
    function format(data) {
        return '<div class="lead1"></div>' + 
				'<div class="col-md-6" style="word-wrap:break-word;font-size:12px;">'+
				'<section class="one-half">'
				+  '<div class="row" style="margin-bottom:8px;"><div class="col-md-4"> <div class="lead1" >ID:</div></div><div class="col-md-8" style="margin-left:-10%;">' + data[1] +'</div></div>'+ 
                         '<div class="row" style="margin-bottom:8px;"><div class="col-md-4"><div class="lead1">Book_Name:</div></div><div class="col-md-8" style="margin-left:-10%;">' + data[2] +'</div></div>'+ 
						 '<div class="row" style="margin-bottom:8px;"><div class="col-md-4"><div class="lead1">Author Name:</div></div><div class="col-md-8" style="margin-left:-10%;">' + data[3] +'</div></div>'+ 
						 '<div class="row" style="margin-bottom:8px;"><div class="col-md-4"><div class="lead1">Book Title:</div></div><div class="col-md-8" style="margin-left:-10%;">' + data[4] +'</div></div>'+ 
						 
						 '</div>'+
					    '</section>'
						+'</div>'+
				  
				  '<div class="lead1"></div>'+
				  '<div class="col-md-6" style="word-wrap:break-word;font-size:12px;">'+
				  '<section class="one-half">'
				  +
		             '<div class="row" style="margin-bottom:8px;"><div class="col-md-4"><div class="lead1">Price:</div></div><div class="col-md-8"  style="margin-left:-10%;">' + data[5] +'</div></div>'+ 
						     '<div class="row" style="margin-bottom:8px;"><div class="col-md-4"><div class="lead1">Description:</div></div><div class="col-md-8"  style="margin-left:-10%;">' + data[7] +'</div></div>'+ 
						 '</div>'+
					    '</section>'+'</div>'+
						
				  
					    
						'</section>'+'</div>';
											
    }

    var $rowDetailsTable = $('#table-hidden-row-details');
    // Insert a 'dt-details-control' column to the table
    $rowDetailsTable.find('thead tr, tfoot tr').each(function () {
        this.insertBefore(document.createElement('th'), this.childNodes[0]);
    });
    $rowDetailsTable.find('tbody tr').each(function () {
        $(this).prepend('<td class="dt-details-control" style="width:4%;"><i class="fa fa-fw dt-details-toggle"></i></td>');
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

    $('#table-hidden-row-details_wrapper select.form-control').select2({minimumResultsForSearch: -1});
});
;