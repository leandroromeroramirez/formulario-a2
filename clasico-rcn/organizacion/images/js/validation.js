
$(document).ready(function() {
    $("#form1").validate({
        rules: {
            nombre: {
                minlength: 5,
                required: true
            },
            cedula: {
                required: true,
                number: true
            },
            ano: 'required',
            mes: 'required',
            dia: 'required',
            // ciudad: 'required',
            telefono: {
                number: true,
                min: 1000000,
                // maxLength: 10,
                // required: true
            },
            celular: {
                number: true,
                min: 1000000000,
                // required: true
            },
            email: {
                email: true,
                // required: true,
            },
            gruposanguineo: 'required',
            eps: 'required',
            ars: 'required',
            funcion: 'required',
            equipo: 'required',
            empresa: 'required',
            direccionempresa: 'required',
            ciudadempresa: 'required',
            licencia: 'required',
            // participacion: 'required',
            responsableequipo: 'required',
        },
        messages: {
            nombre: {
                minlength: 'El nombre debe tener 5 caracteres mínimo',
                required: 'Ingrese su nombre completo',
            },
            cedula: {
                required: 'Ingrese su número de cedula',
                number: 'Ingrese su número de cédula sin puntos.'
            },
            ano: 'Campo requerido',
            mes: 'Campo requerido',
            dia: 'Campo requerido',
            // ciudad: 'Por favor ingrese la ciudad de residencia.',
            telefono: {
                number: 'Número de teléfono invalido',
                min: 'El número de teléfono debe tener mínimo 7 dígitos',
                // required: 'Por favor ingrese su número de teléfono.',
                maxLength: '',
            },
            celular: {
                number: 'Número de celular invalido',
                min: 'El número de celular debe ser de 10 dígitos',
                // required: 'Por favor ingrese su número de celular.',
                maxLength: '',
            },
            email: {
                email: 'Formato incorrecto',
                // required: 'Por favor ingrese su correo electronico.'
            },
            gruposanguineo: 'Por favor elija su grupo sanguíneo',
            eps: 'Por favor escriba el nombre de su EPS',
            ars: 'Por favor escriba el nombre de su ARS',
            funcion: 'Por favor escriba su función en el clásico',
            equipo: 'Por favor escriba el nombre del equipo',
            empresa: 'Por favor escriba el nombre de la empresa',
            direccionempresa: 'Por favor escriba la dirección de la empresa',
            ciudadempresa: 'Por favor escriba la ciudad',
            licencia: 'Por favor escriba su función en el clásico',
            // participacion: 'Por favor ingrese las ediciones en las que participó.',
            responsableequipo: 'Por favor escriba el nombre del responsable del equipo',
        },
        submitHandler: function(form) {
            form.submit();
        }
    })
});
