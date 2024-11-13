function loadUserData(name) {
    document.getElementById("ItName-e").value = "";
    document.getElementById("ItLastName-e").value = "";
    document.getElementById("ItEmail-e").value = "";
    document.getElementById("ItPassword-e").value = "";

  // Llamada AJAX para obtener los datos del usuario seleccionado
  fetch(`../PHP/GetItInfo.php?it_name=${name}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        console.error(data.error);
      } else {
        // Rellenar los campos con los datos obtenidos
        document.getElementById("ItName-e").value = data.ItName;
        document.getElementById("ItLastName-e").value = data.ItLastName;
        document.getElementById("ItEmail-e").value = data.ItEmail;
        document.getElementById("ItPassword-e").value=data.ItPassword;
      }
    })
    .catch((error) => console.error("Error al obtener datos:", error));
}

function CargaUser(name) {
    document.getElementById("Username-e").value = "";
    document.getElementById("Useremail-e").value = "";
  // Llamada AJAX para obtener los datos del usuario seleccionado
  fetch(`../PHP/GetUserInfo.php?usuario-e=${name}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        console.error(data.error);
      } else {
        // Rellenar los campos con los datos obtenidos
        document.getElementById("Username-e").value = data.NombreUser;
        document.getElementById("Useremail-e").value = data.CorreoUser;
      }
    })
    .catch((error) => console.error("Error al obtener datos:", error));
}
