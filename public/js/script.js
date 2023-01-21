let selected_province;
let selected_canton;
$( document ).ready(function() {
    $('.provincias-select').change(function () {
        selected_province = $(this).val();
        $(this).parent().append('<input type="hidden" value="' + provinces[selected_province]['provincia'] + '" name="provincia"/>');
        let cantones = provinces[selected_province]['cantones'];
        $('.cantones-select').html('<option value="" selected disabled hidden>Seleccione una Opción</option>');
        $('.parroquias-select').html('<option value="" selected disabled hidden>Seleccione una Opción</option>');
        $.each(cantones, function( key, value ) {
            $('.cantones-select').append(new Option(value['canton'], key));
        });
    });

    $('.cantones-select').change(function () {
        selected_canton = $(this).val();
        $(this).parent().append('<input type="hidden" value="' + provinces[selected_province]['cantones'][selected_canton]['canton'] + '" name="canton"/>');
        let parroquias = provinces[selected_province]['cantones'][selected_canton]['parroquias'];
        $('.parroquias-select').html('<option value="" selected disabled hidden>Seleccione una Opción</option>');
        $.each(parroquias, function( key, value ) {
            $('.parroquias-select').append(new Option(value, key));
        });
    });

    $('.parroquias-select').change(function () {
        let key = $(this).val();
        $(this).parent().append('<input type="hidden" value="' + provinces[selected_province]['cantones'][selected_canton]['parroquias'][key] + '" name="parroquia"/>');
    });
});
