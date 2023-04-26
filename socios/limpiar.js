// Obtener los campos del formulario
var nombreSocio = document.getElementById("nombreSocio");
var apellidoSocio = document.getElementById("apellidoSocio");
var tipoDocumento = document.getElementById("tipoDocumento");
var documentoSocio = document.getElementById("documentoSocio");
var telefonoSocio = document.getElementById("telefonoSocio");
var marca = document.getElementById("marca");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
nombreSocio.value = "";
apellidoSocio.value = "";
tipoDocumento.value = "";
documentoSocio.value = "";
telefonoSocio.value = "";
marca.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
nombreSocio.value = storedData.nombreSocio || "";
apellidoSocio.value = storedData.apellidoSocio || "";
tipoDocumento.value = storedData.tipoDocumento || "";
documentoSocio.value = storedData.documentoSocio || "";
telefonoSocio.value = storedData.telefonoSocio || "";
marca.value = storedData.marca || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
var formData = {
nombreSocio: nombreSocio.value || "",
apellidoSocio: apellidoSocio.value || "",
tipoDocumento: tipoDocumento.value || "",
documentoSocio: documentoSocio.value || "",
telefonoSocio: telefonoSocio.value || "",
marca: marca.value || ""
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
nombreSocio.value = "";
apellidoSocio.value = "";
tipoDocumento.value = "";
documentoSocio.value = "";
telefonoSocio.value = "";
marca.value = "";
});