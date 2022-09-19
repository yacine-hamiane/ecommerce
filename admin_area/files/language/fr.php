<?php 

function lang($phrase)
{
	# code...
	static $lang = array(
		//start navbar language
		'home'    => 'Acceuil',
		'about'	  => 'a propos',
		'shop'	  => 'Boutique',
		'contact' => 'Contact',
		'langue'  => 'تغيير اللّغة',
		//end navbar language

		//start banner
		'image1title' => 'Numéro 1 de shoping en ligne',
		'image1desc'  => 'On prospose plusieurs produits en electromenager. 
                                    comme des <a rel="sponsored" class="text-success" href="https://templatemo.com" target="_blank">friteuse</a> moderne avec ou sans huile. 
                                    vous pouvez visitez notre catalogue <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank">pour voir nos modéles</a>, vous trouverez aussi
                                    <a rel="sponsored" class="text-success" href="https://unsplash.com/" target="_blank">des mixeurs</a> et
                                    <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank"> des hachoirs</a>.',
         'image2title' => 'Des prix trés logique.',
         'image2stitle'=> 'En plus livraison gratuite 58 wilaya.',
         'image2desc'  => 'tout nos produits sont de bonne qualité venu de plusieurs endroit de monde telle que la france ,allemagne , la chine ...etc , garantie entre 12 et 18 mois , echange gratuit en cas ou le produit ne fonctionne pas.',
         'image3title' => 'Des produits trés utiles.',
         'image3stitle'=> 'et efficace a long durée.',
         'image3desc'=> 'Vous aimez la cuisine ? vous avez plusieurs recette et vous etes en manque de materielle , on vous propose des grandes marques qui vous facilite vous preparation des plats des gateaux et des cocktail de jus.',

         //start catégorie of the mount
         'titlecat'  => 'Meilleurs catégories de mois.',
         'stitlecat' => 'First Shop vous suggére les catégories les plus populaire pour parcourir les produit que vous aimez facilement.',
         'visitez'  => 'parcourir',
         //end catégorie of the mont

         //Start Featured Product
         'titlepro'  => 'Produits les plus populaire',
         'stitlepro' => 'First Shop vous suggére les produits les plus populaire pour parcourir les produit que vous aimez facilement.',
         //end Featured Product
         //////////////shop page//////////////////
         //Start shop page
         'sidebar1'  => 'Categories',
         'sidebar2'  => 'Marques',
         'cardpro'   => 'Détails',
         //end shop page

         /////////////checkout//////////////
         'info'      => 'informations sur le client',
         'nom'       => 'nom',
         'prenom'	 => 'prénom',
         'wilaya'    => 'wilaya',
         'commune'  => 'commune',
         'num'		 => 'numero de téléphone',
         'submit'    => 'valider votre commande',
         'panier'	 => 'votre panier',
         'nombre'    => 'nombre de produit',
         'supprime'  => 'supprimé',
         'produit'   => 'produit',
         'qtt'       => 'quantité',
         'prix'      => 'prix',
         'total'     => 'prix total',
         'actualise' => 'actualiser votre panier',
         'continue'  => "faire d'autre achat",
         'submit2'	 => 'valider votre commande',
         'annonce'   => 'pour supprimé un tableau veuillez le selection a gauche de tableau de panier et cliquez sur actualiser votre panier',

         ////////////contact page //////////////////////
         'contactus'  => 'concatez nous',
         'text_contact'  => 'remplissez le formulaire en bas ,et cliquez sur envoyer , on vous repondera par email dans le plus bref délai',
         'label_name' => 'nom',
         'placeholder_name' => 'exemple: yacine hamiane',
         'label_email'      => 'email',
         'placeholder_email'          => 'exemple : yacinehamiane94@gmail.com',
         'label_sujet'       => 'sujet',
         'placeholder_sujet'        => 'exemple : achat non recu',
         'msg'        => 'message',
         'btn_concact' => 'envoyer'

         

	);

	return $lang[$phrase];

}

 ?>
