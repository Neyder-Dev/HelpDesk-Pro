const Nticket = document.getElementById("Form-n-ticket");
const Nit = document.getElementById("Form-n-It");
const nuser = document.getElementById("Form-n-User");
const Tickets = document.getElementById("Content-Tickets");
const TeamIT = document.getElementById("Content-It");
const Users = document.getElementById("Content-Usuarios");
const SolvedTickets = document.getElementById("Content-Tickets-r");
const eit = document.getElementById("Form-e-It");
const dit = document.getElementById("Form-d-It");
const euser = document.getElementById("Form-e-User");
const duser = document.getElementById("Form-d-User");

function tickets() {
  Tickets.style.display = "block";
  TeamIT.style.display = "none";
  Users.style.display = "none";
  SolvedTickets.style.display = "none";
  Nticket.style.display = "none";
  Nit.style.display = "none";
  nuser.style.display = "none";
  eit.style.display="none";
  dit.style.display="none";
  euser.style.display="none";
  duser.style.display="none";
}

function teamIT() {
  Tickets.style.display = "none";
  TeamIT.style.display = "block";
  Users.style.display = "none";
  SolvedTickets.style.display = "none";
  Nticket.style.display = "none";
  Nit.style.display = "none";
  nuser.style.display = "none";
  eit.style.display="none";
  dit.style.display="none";
  euser.style.display="none";
  duser.style.display="none";

}

function users() {
  Tickets.style.display = "none";
  TeamIT.style.display = "none";
  Users.style.display = "block";
  SolvedTickets.style.display = "none";
  Nticket.style.display = "none";
  Nit.style.display = "none";
  nuser.style.display = "none";
  eit.style.display="none";
  dit.style.display="none";
  euser.style.display="none";
  duser.style.display="none";

}

function solvedTickets() {
  Tickets.style.display = "none";
  TeamIT.style.display = "none";
  Users.style.display = "none";
  SolvedTickets.style.display = "block";
  Nticket.style.display = "none";
  Nit.style.display = "none";
  nuser.style.display = "none";
  eit.style.display="none";
  dit.style.display="none";
  euser.style.display="none";
  duser.style.display="none";
}

function Logout() {
  if (confirm("¿Seguro que deseas cerrar sesión?")) {
    window.location.href = "../HTML/Index.php";
  }
}

document.getElementById("btn_n_ticket").addEventListener("click", function () {
  document.getElementById("Content-Tickets").style.display = "none";
  document.getElementById("Form-n-ticket").style.display = "block";
});

document.getElementById("btn_n_it").addEventListener("click", function () {
  document.getElementById("Content-It").style.display = "none";
  document.getElementById("Form-n-It").style.display = "block";
});

document.getElementById("btn_n_user").addEventListener("click", function () {
  document.getElementById("Content-Usuarios").style.display = "none";
  document.getElementById("Form-n-User").style.display = "block";
});

document.getElementById("btn-e-it").addEventListener("click", function () {
  document.getElementById("Content-It").style.display = "none";
  document.getElementById("Form-e-It").style.display = "block";
});

document.getElementById("btn-d-it").addEventListener("click", function(){
  document.getElementById("Content-It").style.display = "none";
  document.getElementById("Form-d-It").style.display = "block";
})

document.getElementById("btn-e-user").addEventListener("click", function(){
  document.getElementById("Content-Usuarios").style.display = "none";
  document.getElementById("Form-e-User").style.display = "block";
})

document.getElementById("btn-d-user").addEventListener("click", function (){
  document.getElementById("Content-Usuarios").style.display = "none";
  document.getElementById("Form-d-User").style.display = "block";
})

document.getElementById("i-logout").parentElement.onclick = Logout;
document.getElementById("i-ticket").parentElement.onclick = tickets;
document.getElementById("i-equipo").parentElement.onclick = teamIT;
document.getElementById("i-usuario").parentElement.onclick = users;
document.getElementById("i-tclosed").parentElement.onclick = solvedTickets;
