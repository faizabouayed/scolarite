
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <SCRIPT SRC="script.js"></SCRIPT>   
    <link rel="stylesheet" type="text/css" href="style.css?x=1" />
    <script src="https://www.google.com/jsapi"></script>
    <title>Popup box</title>
</head>
<body>
    <style>
    /* Popup box BEGIN */
.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}
/* Popup box BEGIN */
</style>
<a class="trigger_popup_fricc">
    <button class="btn btn-light editbtn" >
         <i class="fa fa-edit text-success "></i>Edit
    </button></a>
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>
        <input type="text" name="name">  
        <input type="text" name="prenom"> 
        <button type="submit" class="btn btn-primary mr-2" onclick="openForm()">Edit</button>
                    <button class="btn btn-light" onclick="closeForm()">Cancel</button>
  </div>
</div>
</body>
</html>
<script>
    $(window).load(function () {
    $(".trigger_popup_fricc").click(function(){
       $('.hover_bkgr_fricc').show();
    });
    $('.hover_bkgr_fricc').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});
    function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<!--<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

<h2>Popup Form</h2>
<p>Click on the button at the bottom of this page to open the login form.</p>
<p>Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.</p>

<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>-->
<!--<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Popup container */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>
</head>
<body>

<div class="popup" onclick="myFunction()">Click me!
  <span class="popuptext" id="myPopup">Popup text...</span>
</div>

<script>
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

</body>
</html>-->

<!--

<!DOCTYPE html>
<html lang="en">
<head>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>-->
<!--</head>
<body>
        <meta charset="utf-8">
      <title>Popup Login Form Design | CodingNepal</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>   
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Les Listes des Enseignants
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Enseignants</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Les Enseignants</h4> 
                  <a href="{{url('Enseignants-User/create')}}">
                  <button class="btn btn-light ">
                     <i class="fa fa-plus text-success"></i> Add User</button></a><br><br>              
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table">

                          <thead>
                            <tr class="bg-primary text-white">
                                
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Grade</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                                                 
                          <tbody>

                            <tr> 
                                <td></td>
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td>
                                  <label class="badge badge-success"></label>
                                </td>
                                <td class="text-right">

                                 <button class="btn btn-light" onclick="window.location.href='/Profile-Ens';">
                                    <i class="fa fa-eye text-primary"></i>View
                                  </button>
                                
                                  
                  
                                 <a href="/popup">
                                 <button class="btn btn-light editbtn" >
                                    <i class="fa fa-edit text-success "></i>Edit
                                </button>
                                 </a>

                                  

                                  <button class="btn btn-drang servideletebtn"  >
                                    <i class="fa fa-times text-danger"></i>Remove
                                  </button></form>
                                  
                                </td>                                
                            </tr> 
                          </tbody>                        
                          
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

    
  
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>

  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  
  <script src="../../js/data-table.js"></script>
   <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  
  <meta name="csrf-token" content="{{ csrf_token() }}">


    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-eye text-primary"></i></button>
            </div>
            <div class="modal-body">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Prenom</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" name="prenom">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Date</label>
                      <input type="date" class="form-control" id="exampleInputPassword4" name="date_n" >
                    </div>                
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary mr-2">Edit</button>
                    <button class="btn btn-light">Cancel</button>
            </div>
            </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
</body>
</html>
<!--<!DOCTYPE html>
<html>
  <head>
    <title>Titre du document</title>
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        font-family: Roboto, Helvetica, sans-serif;
      }
      /* Fixez le bouton sur le côté gauche de la page the button on the left side of the page */
      .open-btn {
        display: flex;
        justify-content: flex-start;
      }
      /* Stylez et fixez le bouton sur la page */
      .open-button {
        background-color: #1c87c9;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
      }
      /* Positionnez la forme Popup */
      .login-popup {
        position: relative;
        text-align: center;
        width: 100%;
      }
      /* Masquez la forme Popup */
      .form-popup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-45%, 5%);
        border: 2px solid #666;
        z-index: 9;
      }
      /* Styles pour le conteneur de la forme */
      .form-container {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      /* Largeur complète pour les champs de saisie */
      .form-container input[type="text"],
      .form-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 22px 0;
        border: none;
        background: #eee;
      }
      /* Quand les entrées sont concentrées, faites quelque chose */
      .form-container input[type="text"]:focus,
      .form-container input[type="password"]:focus {
        background-color: #ddd;
        outline: none;
      }
      /* Stylez le bouton de connexion */
      .form-container .btn {
        background-color: #8ebf42;
        color: #fff;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
      }
      /* Stylez le bouton pour annuler */
      .form-container .cancel {
        background-color: #cc0000;
      }
      /* Planez les effets pour les boutons */
      .form-container .btn:hover,
      .open-button:hover {
        opacity: 1;
      }
    </style>
  </head>
  <body>
    <h2>Forme Popup</h2>
    <p>Cliquez sur le bouton "Ouvrir la forme" pour ouvrir la forme Popup.</p>
    <div class="open-btn">
      <button class="open-button" onclick="openForm()"><strong>Ouvrir la forme</strong></button>
    </div>
    <div class="login-popup">
      <div class="form-popup" id="popupForm">
        <form action="/action_page.php" class="form-container">
          <h2>Veuillez vous connecter</h2>
          <label for="email">
            <strong>E-mail</strong>
          </label>
          <input type="text" id="email" placeholder="Votre Email" name="email" required />
          <label for="psw">
            <strong>Mot de passe</strong>
          </label>
          <input type="password" id="psw" placeholder="Votre Mot de passe" name="psw" required />
          <button type="submit" class="btn">Connecter</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
      </div>
    </div>
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
  </body>
</html>-->
<!--<!DOCTYPE html>
<html>
  <head>
    <title>Titre du document</title>
    <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 8;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
      }
      .modal-content {
        margin: 50px auto;
        border: 1px solid #999;
        width: 60%;
      }
      h2,
      p {
        margin: 0 0 20px;
        font-weight: 400;
        color: #999;
      }
      span {
        color: #666;
        display: block;
        padding: 0 0 5px;
      }
      form {
        padding: 25px;
        margin: 25px;
        box-shadow: 0 2px 5px #f5f5f5;
        background: #eee;
      }
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
      }
      .contact-form button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      button:hover {
        background: #2371a0;
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      button.button {
        background: none;
        border-top: none;
        outline: none;
        border-right: none;
        border-left: none;
        border-bottom: #02274a 1px solid;
        padding: 0 0 3px 0;
        font-size: 16px;
        cursor: pointer;
      }
      button.button:hover {
        border-bottom: #a99567 1px solid;
        color: #a99567;
      }
    </style>
  </head>
  <body>
    <h2>Formes Popup Multiple</h2>
    <p>
      <button class="button" data-modal="modalOne">Contacter nous</button>
    </p>
    <p>
      <button class="button" data-modal="modalTwo">Envoyer un formulaire de plainte</button>
    </p>
    <div id="modalOne" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <a class="close">&times;</a>
          <form action="/">
            <h2>Contacter Nous</h2>
            <div>
              <input class="fname" type="text" name="name" placeholder="Nom" />
              <input type="text" name="name" placeholder="Email" />
              <input type="text" name="name" placeholder="Nombre de téléphone" />
              <input type="text" name="name" placeholder="Site Web" />
            </div>
            <span>Message</span>
            <div>
              <textarea rows="4"></textarea>
            </div>
            <button type="submit" href="/">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
    <div id="modalTwo" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <span class="close">&times;</span>
          <form action="/">
            <h2>Formulaire de plainte</h2>
            <div>
              <input class="fname" type="text" name="name" placeholder="Full name" />
              <input type="text" name="name" placeholder="Email" />
              <input type="text" name="name" placeholder="Phone number" />
              <input type="text" name="name" placeholder="Website" />
            </div>
            <span>Message</span>
            <div>
              <textarea rows="4"></textarea>
            </div>
            <button type="submit" href="/">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script>
      let modalBtns = [...document.querySelectorAll(".button")];
      modalBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.getAttribute("data-modal");
          document.getElementById(modal).style.display = "block";
        };
      });
      let closeBtns = [...document.querySelectorAll(".close")];
      closeBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.closest(".modal");
          modal.style.display = "none";
        };
      });
      window.onclick = function (event) {
        if (event.target.className === "modal") {
          event.target.style.display = "none";
        }
      };
    </script>
  </body>
</html>-->
<!--<template>
  <div class="q-pa-md">
    <div class="q-gutter-md">
      <div class="cursor-pointer" style="width: 100px">
        <q-popup-edit v-model="label" class="bg-accent text-white" v-slot="scope">
          <q-input dark color="white" v-model="scope.value" dense autofocus counter @keyup.enter="scope.set">
            <template v-slot:append>
              <q-icon name="edit" />
            </template>
          </q-input>
        </q-popup-edit>
      </div>

      <div class="cursor-pointer" style="width: 100px">
        <q-popup-edit v-model="label2" :cover="false" :offset="[0, 10]" v-slot="scope">
          <q-input color="accent" v-model="scope.value" dense autofocus counter @keyup.enter="scope.set">
            <template v-slot:prepend>
              <q-icon name="record_voice_over" color="accent" />
            </template>
          </q-input>
        </q-popup-edit>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
export default {
  setup () {
    return {
      label: ref('Click me'),
      label2: ref('Also click me')
    }
  }
}
</script>-->