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

    $('.estado_civil-select').change(function () {
        selected_estadi_civil = $(this).val();
        if (selected_estadi_civil == 'Casado/a') {
            $('.cedula-conyuge-div').show();
            $('#cedula_conyuge').attr('required', true);
            $('.nombre-conyuge-div').show();
            $('#nombres_conyuge').attr('required', true);
        }
        else {
            $('.cedula-conyuge-div').hide();
            $('#cedula_conyuge').attr('required', false);
            $('.nombre-conyuge-div').hide();
            $('#nombres_conyuge').attr('required', false);
        }
    });
});
function validateCodigoD(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    const input = String.fromCharCode(keyCode);
    if (!(/[A-Za-z0-9]/.test(input))) {
        e.preventDefault();
    }
}

function validateName(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    const input = String.fromCharCode(keyCode);
    if (!(/[A-Za-z ]/.test(input))) {
        e.preventDefault();
    }
}

function validateAddress(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    const input = String.fromCharCode(keyCode);
    if (!(/[A-Za-z-_. ]/.test(input))) {
        e.preventDefault();
    }
}

function validatePhone(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode < 48 || keyCode > 57) {
        e.preventDefault();
    }
}
