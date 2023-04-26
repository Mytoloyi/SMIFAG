// Obtener el elemento de los campos
var nombrePotrero = document.getElementById("nombrePotrero");
var medida = document.getElementById("medida");

// Validar el campo "nombrePotrero" mientras se escribe
nombrePotrero.addEventListener("input", function() {
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9.#\s]+$/.test(nombrePotrero.value)) {
        alert("El campo 'nombre del potrero' solo debe contener caracteres alfanuméricos, la letra 'ñ', y los signos '#' y '.'.");
        nombrePotrero.value = nombrePotrero.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0-9.#\s]/g, '');
    }
});
// Validar el campo "medida" mientras se escribe
medida.addEventListener("input", function() {
    if (!/^[\w\s]+$/.test(medida.value)) {
        alert("El campo 'medida' solo debe contener caracteres alfanuméricos y espacios entre palabras.");
        medida.value = medida.value.replace(/[^\w\s]/g, '');
    }
});
