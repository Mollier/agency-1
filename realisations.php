<?php
$titlePage = "Baï-Bao - Nos réalisations";
include('./inc/header.php') ?>
		<div class="header_secondary header_secondary--team">
			<h1>nos réalisations</h1>
			<div class="round_middle"></div>
			<div class="round__turquoise">
			</div>
        </div>
	</header>
	<section>
		<div class="realisations_top" id="realisations">
			<p class="paragraph">
				Des banques, des fonds, des associations, des entreprises, grandes et moins grandes… de la holding à la TPE, il règne une joyeuse diversité dans notre éventail de références. Autant de problématiques de communication qui renouvellent les sensations et réchauffent nos méninges pour cogiter ZE solution of ZE solution.
			</p>
			<div class="realisations_filter">
                <a href="realisations.php?filter=Artistes&#realisations">
				<div id="Artistes" class="filter_item">

                    <span>Artistes</span>
				</div>
                </a>
                <a href="realisations.php?filter=Institutions&#realisations">
				<div id="Institutions" class="filter_item">
                    <span>Institutions</span>
				</div>
                </a>
                <a href="realisations.php?filter=Education&#realisations">
				<div id="Artistes" class="filter_item">
                    <span>Éducation</span>
				</div>
                </a>
                <a href="realisations.php?filter=IT&#realisations">
				<div id="IT" class="filter_item">
                   <span>IT</span>
				</div>
                </a>
                <a href="realisations.php?filter=Associations&#realisations">
				<div id="Associations" class="filter_item">
                    <span>Associations</span>
				</div>
                </a>
                <a href="realisations.php?filter=Cabinets&#realisations">
				<div id="Cabinets" class="filter_item">
                    <span>Cabinets</span>
				</div>
                </a>
			</div>
		</div>

		<div class="realisations">
			<div class="round__beige"></div>
			<div class="round__beige--right"></div>
			<div class="realisations__list">
			<?php
           if(isset($_GET['filter'])) {
               foreach ($realisations->filter($pdo, $_GET['filter']) as $realisation) {
                   if($realisation['color'] == '#040028') {?>
                       <a href="<?= $realisation['link'];?>" target="_blank">
                           <div class="realisations__items" style="background-color:<?= $realisation['color'];?>">
                               <p class="item_title"><?= $realisation['title'];?></p>
                               <p class="item_desc"><?= $realisation['abstract'];?></p>
                           </div>
                       </a>
                   <?php   } else {?>
                       <a href="<?= $realisation['link'];?>" target="_blank">
                           <div class="realisations__items" style="background-color:<?= $realisation['color'];?>">
                               <p class="item_title item_title--dark"><?= $realisation['title'];?></p>
                               <p class="item_desc item_desc--dark"><?= $realisation['abstract'];?></p>
                           </div>
                       </a>
                   <?php    }

               }
           } else {
               foreach ($realisations->getAll($pdo) as $realisation) {
                   if($realisation['color'] == '#040028') {?>
                       <a href="<?= $realisation['link'];?>" target="_blank">
                           <div class="realisations__items" style="background-color:<?= $realisation['color'];?>">
                               <p class="item_title"><?= $realisation['title'];?></p>
                               <p class="item_desc"><?= $realisation['abstract'];?></p>
                           </div>
                       </a>
                   <?php   } else {?>
                       <a href="<?= $realisation['link'];?>" target="_blank">
                           <div class="realisations__items" style="background-color:<?= $realisation['color'];?>">
                               <p class="item_title item_title--dark"><?= $realisation['title'];?></p>
                               <p class="item_desc item_desc--dark"><?= $realisation['abstract'];?></p>
                           </div>
                       </a>
                   <?php    }

               }
           }
            ?>


			</div>
		</div>

		<!-- references -->

		<div class="references">
			<h2>NOS RÉFÉRENCES</h2>
			<div class="round"></div>
			<div class="list_references">
				<div class="container__ref">
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
					<div class="two_items">
						<img src="./assets/diderot.svg" alt="diderot">
						<img src="./assets/sorbonne.svg" alt="sorbonne">
					</div>
					<div class="two_items">
						<img src="./assets/sfil.svg" alt="sfil">
						<img src="./assets/cafil.svg" alt="cafil">
					</div>
				</div>
			</div>
		</div>

		<div class="partenaires">
			<h2>NOS PARTENAIRES</h2>
			<div class="round"></div>
			<div class="partenaires_list">
				<?php include('./inc/partenaires_list.php'); ?>
				<!--  -->

			</div>
		</div>
		<!-- end partenaires -->

		<div class="coups_de_coeur">
			<h1>NOS COUPS DE COEUR</h1>
			<div class="coeur"> <img src="./assets/coeur.svg" alt="coeur"></div>
			<p class="paragraph paragraph--white">petit paragraphe sur les clients qui nous suivent depuis des années.</p>
			<div class="coups_de_coeur_list">
				<a href="" target="_blank">
					<div class="coups_de_coeur_item">
						<p class="item_title item_title--dark">CAFFIL</p>
						<p class="item_desc item_desc--dark">calalogue raisonné</p>
					</div>
				</a>

				<a href="" target="_blank">
					<div class="coups_de_coeur_item">
						<p class="item_title item_title--dark">CAFFIL</p>
						<p class="item_desc item_desc--dark">calalogue raisonné</p>
					</div>
				</a>

				<a href="" target="_blank">
					<div class="coups_de_coeur_item">
						<p class="item_title item_title--dark">CAFFIL</p>
						<p class="item_desc item_desc--dark">calalogue raisonné</p>
					</div>
				</a>
			</div>
			<div class="round__beige__coups"></div>
		</div>
	</section>
	<?php include('./inc/footer.php') ?>
