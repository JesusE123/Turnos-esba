function removeAccents(str) {
  // Normaliza la cadena y elimina los acentos
  return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function filterTable() {
  var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("searchInput");
  filter = removeAccents(input.value.toUpperCase()); // Eliminar tildes en la búsqueda
  table = document.querySelector("table");
  tr = table.getElementsByTagName("tr");
  var noRecordsMessage = document.getElementById("noRecordsMessage");

  // Iterar sobre las filas de datos (omitir la fila del encabezado)
  var matchesFound = false;
  for (i = 1; i < tr.length; i++) {
    // Comienza desde 1 para omitir la fila del encabezado
    tds = tr[i].getElementsByTagName("td");
    var matches = false;

    // Filtrar solo por la columna de Especialidad (índice 2)
    var especialidadColumnIndex = 2; // La columna de especialidad está en el índice 2 (tercera columna)

    td = tds[especialidadColumnIndex]; // Seleccionar la celda de la columna de especialidad
    if (td) {
      txtValue = td.textContent || td.innerText;
      txtValue = removeAccents(txtValue.toUpperCase()); // Eliminar tildes del texto de la celda
      if (txtValue.indexOf(filter) > -1) {
        matches = true;
        matchesFound = true;
      }
    }

    // Mostrar u ocultar la fila según si hay coincidencias
    if (matches) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }

  // Mostrar u ocultar el mensaje "No hay registros"
  if (!matchesFound) {
    noRecordsMessage.style.display = "block";
  } else {
    noRecordsMessage.style.display = "none";
  }
}

// Agregar un evento de escucha al campo de búsqueda
document.getElementById("searchInput").addEventListener("input", filterTable);
