// Obtener los campos del formulario
var nombreHerramienta = document.getElementById("nombreHerramienta");
var cantidadHerramienta = document.getElementById("cantidadHerramienta");
var novedades = document.getElementById("novedades");

// Inicializar los valores de los campos del formulario a una cadena vacía ("") para evitar "undefined"
nombreHerramienta.value = "";
cantidadHerramienta.value = "";
novedades.value = "";

// Obtener los datos almacenados en el almacenamiento local
var storedData = JSON.parse(localStorage.getItem("formData"));

// Si hay datos almacenados, completar los campos del formulario con esos datos
if (storedData) {
nombreHerramienta.value = storedData.nombreHerramienta || "";
cantidadHerramienta.value = storedData.cantidadHerramienta || "";
novedades.value = storedData.novedades || "";
}

// Escuchar el evento "beforeunload" para guardar los datos en el almacenamiento local antes de abandonar la página
window.addEventListener("beforeunload", function() {
var formData = {
nombreHerramienta: nombreHerramienta.value || "",
cantidadHerramienta: cantidadHerramienta.value || "",
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
nombreHerramienta.value = "";
cantidadHerramienta.value = "";
novedades.value = "";
});