<script>
var j = jQuery.noConflict();
j(document).ready(function () {
    j("#img").addClass("active open");

    // Initialize CKEditor for the description field
    CKEDITOR.replace('Desc');
    
    // Initialize date picker
    j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    var Pageindex = j('#pindex').val() || 1;
    var rcount = j('#rcount').val() || 0;

    j(".Pager").ASPSnippets_Pager({
        ActiveCssClass: "current",
        PagerCssClass: "pager",
        PageIndex: parseInt(Pageindex),
        PageSize: 4,
        RecordCount: parseInt(rcount)
    });

    j(".page").click(function () {
        var pageindex = j(this).attr('page');
        j('#pindex').val(pageindex);
        j('#hfield').submit();
    });
});
</script>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Empty Data</h4>
                            <!-- Collapse Button (Plus/Minus) -->
                            <button class="btn btn-icon" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-plus" id="collapseIcon"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="collapse" id="collapseExample">
                                <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>We couldn't find any data</h2>
                                    <p class="lead">
                                        Sorry we can't find any data, working in progress....!!
                                    </p>
                                    <a href="#" class="btn btn-primary mt-4">Contact Us</a>
                                    <a href="#" class="mt-4 bb">Need Help?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Custom Script to Toggle Icon -->
<script>
    // Change icon based on collapse state
    $('#collapseExample').on('shown.bs.collapse', function () {
        $('#collapseIcon').removeClass('fa-plus').addClass('fa-minus');
    }).on('hidden.bs.collapse', function () {
        $('#collapseIcon').removeClass('fa-minus').addClass('fa-plus');
    });
</script>
