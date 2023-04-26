// Obtener los campos del formulario
var nombreActividad = document.getElementById("nombreActividad");
var fecha = document.getElementById("fecha");
var idEmpledo = document.getElementById("idEmpledo");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
nombreActividad.value = "";
fecha.value = "";
idEmpledo.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
nombreActividad.value = storedData.nombreActividad || "";
fecha.value = storedData.fecha || "";
idEmpledo.value = storedData.idEmpledo || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
var formData = {
nombreActividad: nombreActividad.value || "",
fecha: fecha.value || "",
idEmpledo: idEmpledo.value || ""
};
localStorage.setItem("formData", JSON.stringify(formData));
});

// Escuchar el evento "submit" del formulario para eliminar los datos almacenados en el almacenamiento local cuando se envía el formulario
document.getElementById("miFormulario").addEventListener("submit", function() {
localStorage.removeItem("formData");
});

// Escuchar el evento "click" del botón para eliminar los datos almacenados en el almacenamiento local
document.getElementById("limpiarCampos").addEventListener("click", function() {
localStorage.removeItem("formData");
nombreActividad.value = "";
fecha.value = "";
idEmpledo.value = "";
});



