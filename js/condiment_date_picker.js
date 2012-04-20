jQuery(function($){
    $("#start_date").datepicker({
        dateFormat: 'dd MM yy',
        altField: "#start_unix",
        altFormat: "@"
    });
    $("#end_date").datepicker({
        dateFormat: 'dd MM yy',
        altField: "#end_unix",
        altFormat: "@"
    });
    $(".timey").timepicker({
        showPeriod: true,
        showLeadingZero: false
    });
});