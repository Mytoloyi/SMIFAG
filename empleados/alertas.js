 // Obtener los elementos de los campos
 var nombreEmpleado = document.getElementById("nombreEmpleado");
 var apellidoEmpleado = document.getElementById("apellidoEmpleado");
 var documentoEmpleado = document.getElementById("documentoEmpleado");
 var nomina = document.getElementById("nomina");
 var telefonoEmpleado = document.getElementById("telefonoEmpleado");

 // Validar el campo "nombreEmpleado" mientras se escribe
nombreEmpleado.addEventListener("input", function() {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test(nombreEmpleado.value)) {
        alert("El campo 'nombre' solo debe contener caracteres alfabéticos y espacios entre palabras.");
        nombreEmpleado.value = nombreEmpleado.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    }
});

// Validar el campo "apellidoEmpleado" mientras se escribe
apellidoEmpleado.addEventListener("input", function() {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test(apellidoEmpleado.value)) {
        alert("El campo 'apellido' solo debe contener caracteres alfabéticos y espacios entre palabras.");
        apellidoEmpleado.value = apellidoEmpleado.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    }
});



 // Validar el campo "documentoEmpleado" mientras se escribe
 documentoEmpleado.addEventListener("input", function() {
     if (!/^[0-9a-zA-Z]+$/.test(documentoEmpleado.value)) {
         alert("El campo 'documento' solo debe contener caracteres alfanuméricos.");
         documentoEmpleado.value = documentoEmpleado.value.replace(/[^0-9a-zA-Z]/g, '');
     }
 });

 // Validar el campo "nomina" mientras se escribe
 nomina.addEventListener("input", function() {
     if (!/^[0-9]+$/.test(nomina.value)) {
         alert("El campo 'nómina' solo debe contener caracteres numéricos.");
         nomina.value = nomina.value.replace(/[^0-9]/g, '');
     }
 });

 // Validar el campo "telefonoEmpleado" mientras se escribe
 telefonoEmpleado.addEventListener("input", function() {
     if (!/^[0-9-]+$/.test(telefonoEmpleado.value)) {
         alert("El campo 'teléfono' solo debe contener caracteres numéricos y guiones.");
         telefonoEmpleado.value = telefonoEmpleado.value.replace(/[^0-9-]/g, '');
     }
 });