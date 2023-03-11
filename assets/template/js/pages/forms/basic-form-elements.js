$(function () {
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.date-end').bootstrapMaterialDatePicker({ 
        format: 'DD MMMM YYYY',
        clearButton: true,
        weekStart: 0,
        time: false
    });

    $('.date-start').bootstrapMaterialDatePicker({ 
        format: 'DD MMMM YYYY',
        clearButton: true,
        weekStart: 0,
        time: false
    }).on('change', function(e, date) {
        $('.date-end').bootstrapMaterialDatePicker('setMinDate', date);
    }); 

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});