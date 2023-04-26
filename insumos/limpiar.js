// Obtener los campos del formulario
var nombreInsumo = document.getElementById("nombreInsumo");
var cantidadInsumo = document.getElementById("cantidadInsumo");
var fechavencimiento = document.getElementById("fechavencimiento");
var valorUnidad = document.getElementById("valorUnidad");
var novedades = document.getElementById("novedades");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
nombreInsumo.value = "";
cantidadInsumo.value = "";
fechavencimiento.value = "";
valorUnidad.value = "";
novedades.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
nombreInsumo.value = storedData.nombreInsumo || "";
cantidadInsumo.value = storedData.cantidadInsumo || "";
fechavencimiento.value = storedData.fechavencimiento || "";
valorUnidad.value = storedData.valorUnidad || "";
novedades.value = storedData.novedades || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
var formData = {
nombreInsumo: nombreInsumo.value || "",
cantidadInsumo: cantidadInsumo.value || "",
fechavencimiento: fechavencimiento.value || "",
valorUnidad: valorUnidad.value || "",
novedades: novedades.value || ""
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
nombreInsumo.value = "";
cantidadInsumo.value = "";
fechavencimiento.value = "";
valorUnidad.value = "";
novedades.value = "";
});