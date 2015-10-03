
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form  class="form-ingreso " onsubmit="GuardarVoto();return false;">
        <h2 class="form-ingreso-heading">Votar</h2>
        <label for="Provincia" class="sr-only" hidden>Provincia</label>
                <input type="text" id="Provincia" class="form-control" placeholder="Provincia" required="" autofocus="">
        <select >
          <option value="Candidato1">Candidato 1</option>
          <option value="Candidato2">Candidato 2</option>
          <option value="Candidato3">Candidato 3</option>
        </select>
        <div class="radiobutton">
          <label>
            <input type="radio" Name="sexo" id="sexo" value="M" checked>Masculino
            <input type="radio" Name="sexo" id="sexo" value="F">Femenino
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="idVoto" id="idVoto" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  
