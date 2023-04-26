// Obtener los elementos de los campos
var nombreSocio = document.getElementById("nombreSocio");
var apellidoSocio = document.getElementById("apellidoSocio");
var documentoSocio = document.getElementById("documentoSocio");
var telefono = document.getElementById("telefonoSocio");
var marca = document.getElementById("marca");

// Validar el campo "nombreSocio" mientras se escribe
nombreSocio.addEventListener("input", function() {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test(nombreSocio.value)) {
        alert("El campo 'nombre' solo debe contener caracteres alfabéticos y espacios entre palabras, sin espacios al principio.");
        nombreSocio.value = nombreSocio.value.replace(/^[ \t]+|[ \t]+$/g,'').replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    }
});

// Validar el campo "apellidoSocio" mientras se escribe
apellidoSocio.addEventListener("input", function() {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test(apellidoSocio.value)) {
        alert("El campo 'apellido' solo debe contener caracteres alfabéticos y espacios entre palabras, sin espacios al principio.");
        apellidoSocio.value = apellidoSocio.value.replace(/^[ \t]+|[ \t]+$/g,'').replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    }
});

// Validar el campo "documentoSocio" mientras se escribe
documentoSocio.addEventListener("input", function() {
    if (!/^[0-9a-zA-Z]+$/.test(documentoSocio.value)) {
        alert("El campo 'documento' solo debe contener caracteres alfanuméricos, sin espacios al principio.");
        documentoSocio.value = documentoSocio.value.replace(/^[ \t]+|[ \t]+$/g,'').replace(/[^0-9a-zA-Z]/g, '');
    }
});

// Validar el campo "telefono" mientras se escribe
telefono.addEventListener("input", function() {
    if (!/^[0-9]+$/.test(telefono.value)) {
        alert("El campo 'teléfono' solo debe contener caracteres numéricos.");
        telefono.value = telefono.value.replace(/[^0-9]/g, '');
    }
});

// Validar el campo "marca" mientras se escribe
marca.addEventListener("input", function() {
    if (!/^[a-zA-Z0-9]+$/.test(marca.value)) {
        alert("El campo 'marca' solo debe contener caracteres alfanuméricos.");
        marca.value = marca.value.replace(/[^a-zA-Z0-9]/g, '');
    }
});
