<div class="row  text-center fm1"> 
<div class="col-xs-12  fm">
<div class="panel panel-default">
  <div class="panel-heading "> 
  <h1 class="titre" style="font-weight:bold;color:red">
MODIFIER MES INFORMATIONS!!!</h1>
  </div>
  <div class="panel-body"style="background-color:black;">
<form class="form-horizontal "style="margin-top:30px"method="post" action="profile.php">
<div class="col-xs-6">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-5 control-label">Nom : </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputEmail3" value="<?php echo $row['nom'];?>" name="nomm" required patern="[a-zA-Z]">
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Prenom : </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputPassword3" value="<?php echo $row['prenom'];?>" name="prenomm"required patern="[a-zA-Z]">
    </div>
  </div>
  </div>
  <div class="col-xs-6">

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Adresse : </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputPassword3" value="<?php echo $row['adresse'];?>"name="adressee"required>
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Téléphone : </label>
    <div class="col-sm-7">
      <input type="phone" class="form-control" id="inputPassword3" value="<?php echo $row['tel'];?>"name="tell"required>
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Email : </label>
    <div class="col-sm-7">
      <input type="email" class="form-control" id="inputPassword3" value="<?php echo $row['email'];?>"name="maill"required>
    </div></div></div>
  
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Nom d'utilisateur : </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputPassword3" value="<?php echo $row['login'];?>"name="loginn"required>
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label"> Ancien mot de passe : </label>
    <div class="col-sm-7">
      <input type="password" class="form-control" id="inputPassword3" value="<?php echo '*****';?>"name="passold"required>
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-xs-5 control-label">Nouveau mot  de passe : </label>
    <div class="col-xs-7">
      <input type="password" class="form-control" id="inputPassword3" placeholder="newpass" name="passnew"required>
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-5 control-label">Date de Naissance: </label>
    <div class="col-sm-7">
      <input type="date" class="form-control" id="inputPassword3" value="<?php echo $row['date_naiss'];?>"name="agee"required>
    </div>
  </div></div>
  <div class="col-xs-6">
  <div class="row">
  <div class="form-group">
  <label for="inputPassword3" class="col-sm-5 control-label">Sexe:</label>
    <div class="radio col-xs-2">
  <label>
    <input type="radio" name="op" id="optionsRadios2" value="homme"required>
   Homme
  </label>
</div>
<div class="radio col-xs-2">
  <label>
    <input type="radio" name="op" id="optionsRadios3" value="femme" required>
    Femme
  </label>
</div>
  </div></div></div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-9">

<input type="submit" class="btn btn-default btn-danger envoyer bphp" value="MODIFIER" name="modifier"></input>
      
    </div>
  </div>
</form></div> 
</div>
 
</div> 
</div>

    
     
        
      </div>