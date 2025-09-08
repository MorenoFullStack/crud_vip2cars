function toggleSubmitButton(formSelector, submitButtonId, inputSelectors) {
    $(submitButtonId).prop("disabled", true);

    const initialValues = {};
    $(inputSelectors).each(function() {
        const fieldId = $(this).attr('id');
        initialValues[fieldId] = $(this).val();
    });

    $(inputSelectors).on("input change", function() {
        let formChanged = false;

        $(inputSelectors).each(function() {
            const fieldId = $(this).attr('id');
            if ($(this).val() !== initialValues[fieldId]) {
                formChanged = true;
            }
        });

        $(submitButtonId).prop("disabled", !formChanged);
    });

    $(formSelector).on('submit', function(e) {
        $(submitButtonId).prop("disabled", true).text("Procesando...");
    });
}

$(document).ready(function() {
    toggleSubmitButton('#formContacto', '#btnSubmit', '#nombre, #apellido, #documento_identidad, #correo, #telefono');
    
    toggleSubmitButton('#formVehiculo', '#btnSubmitVehiculo', '#placa, #marca, #modelo, #year_fabricacion, #cliente_id');
});