<?php 
session_start();

if (isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])) {
$_SESSION['facture']="oui";
ob_start();
?>

<page backtop="0mm" backleft="5mm" backright="5mm" backbottom="0mm">
<div style="margin-bottom:10px;">
<page_header>
<p ><img src="imgsite/logo.png" class="image"></p>
<hr/>
</page_header>
</div>
<page_footer>
<hr />
<p><h4>OBSERVATION!:</h4>
<ul><h4 class="red"><li>VOUS DEVEZ IMPERATIVEMENT RAMENER CET EXEMPLAIRE LORS DE 
LA RECUPERATION DE VOTRE PRODUITS COMMANDES</li></h4>
 <h4 class="red"><li>VOUS DEVEZ VOUS PRESENTER AU MAGASIN AVANT 48H DE VOTRE COMMANDE</li></h4> 
</ul>
</p>
</page_footer>
<div class="row">
<link rel="stylesheet" type="text/css" href="facture.css"/>
<?php
include('try.php');

$commande=$bdd->prepare('SELECT * FROM client WHERE login=?');
$commande->execute(array($_SESSION['login']));
$infoclient=$commande->fetch();

?>



<h1  >Bon De Commande</h1>
     
         <div ><h3 >Information du client :</h3></div>
              <div class="encadre">
                  <div class="la_marge">

                      <p>  Nom  : 	<?php echo $infoclient['nom'];?></p>
                      <p> Prenom : <?php echo $infoclient['prenom'];?></p>
                      <p>Adresse : <?php echo $infoclient['adresse'];?></p>
                  
                  </div>
            	</div>

 
		

   <div  >

        <div ><h3>Information de la commande :</h3></div>
        <table >
	      <thead>
		       <tr >
		            <th>Catégorie</th>
			        <th >Information Produit</th>
			        <th>Prix unitaire (DA)</th>
			        <th>Quantité </th>
			        <th>prix  produit (DA)  </th>
		        </tr>
	      </thead>
	      <tbody>
     			<?php 
    				$req=$bdd->prepare('SELECT categorie.*, commande.*, panier.*, produit.*
					FROM (categorie INNER JOIN produit ON categorie.id_categorie = produit.id_categorie) 
					INNER JOIN (commande INNER JOIN panier ON commande.id_commande = panier.id_commande) 
					ON produit.ref_produit = panier.ref_produit  where commande.id_commande=? ');
					$req->execute(array($_SESSION['commande']));
					$nbr_produit=0;
					while ($res=$req->fetch()) {
						$nbr_produit=($nbr_produit+$res['nbr_produit']);
					?>
					<tr><td class="ted"><?php echo '<h4>'.$res['nom_categorie'].'</h4>'; ?></td>
    					<td class="ted1"><?php echo '<h4>'.nl2br($res['information']).'</h4>'; ?></td>
    					<td class="ted"><?php echo '<h4>'.number_format($res['prix'],2).'</h4>'; ?></td>
    					<td class="ted"><?php  echo '<h4>'.$res['nbr_produit'].'</h4>'; ?></td>
    					<td class="ted"><?php echo '<h4>'.number_format($res['prix']*$res['nbr_produit'],2).'</h4>';?></td>
    				</tr>

					<?php }?> 
			</tbody>
			<tfoot>
			<?php 
				$req=$bdd->prepare('SELECT * FROM commande where id_commande=?');
				$req->execute(array($_SESSION['commande']));
				$com=$req->fetch();
				?>
			<tr>
			<td colspan="3"></td>
			<td> <p ><?php echo '<h5><strong>total_produits :</strong> '. $nbr_produit.'</h5>';?></p></td>
			<td class="ted1"><p  ><?php echo '<h5>Le prix total : '. number_format($com['total_commande'],2).'</h5>';?></p></td>	
			</tr>	

			</tfoot>
		</table>
 				 
	</div>

	    
			<p ><?php echo '<h2><strong>Commandée le :</strong> '. date($com['date_commande']).'</h2>';?>
			
			<?php echo '<h2>Facture N° : '. $com['id_commande'].'</h2>';?></p>

			

</div>
</page>

<?php
$content = ob_get_clean();
require('pdf/class.php');
$req=$bdd->prepare('SELECT ref_produit as ligne FROM panier   where id_commande=?');
				$req->execute(array($_SESSION['commande']));
				$cpt=0;
				while($com=$req->fetch()){

					$cpt++;
				}





				 if($cpt<3){


try{
$pdf= new HTML2PDF('p','A4','fr');
$pdf->pdf->SetDisplayMode('fullpage');
$pdf->writeHTML($content);
$pdf->Output('test.pdf');
}catch(html2pdf_exception $e) {
	die($e);
}}else{


try{
$pdf= new HTML2PDF('p','A3','fr');
$pdf->pdf->SetDisplayMode('fullpage');
$pdf->writeHTML($content);
$pdf->Output('test.pdf');
}catch(html2pdf_exception $e) {
	die($e);
}






	}}else {

header('location:inscription.php');


		}?>


			
	