<?php
$page = $_GET['page'];
if(!isset($_GET['page'])) $page = "index";
?>
<html>
	
	<head>
		
		<link
			rel="stylesheet"
			type="text/css"
			href="main.css"
			/>
			
		<script
			type="text/javascript"
			src="neighbourhoodselector.js"
			></script>
			
		<title>
			<?php
			echo "The Sims Database - " . $page;
			?>
		</title>
			
	</head>
	
	<body>
		<?php
		if($page == "index")
		{
		?>
		<ul id="neighbourhoods">
			
			<li class="neighbourhoodlinks" onclick="showSub('megahood')">
				Megahood
			</li>
			
				<ul id="megahood" class="subneighbourhoods">
					<li>
						Veronaville
					</li>
					<li>
						Strangetown
					</li>
				</ul>
			
			<li class="neighbourhoodlinks" onclick="showSub('barkby')">
				Barkby
			</li>
			
				<ul id="barkby" class="subneighbourhoods">
					<li onclick="showHousehold('littleport')">
						Littleport
					</li>
					
						<ul id="littleport" class="households">
							<li onclick="showSims('blue')">
								Blue
							</li>
							
								<ul id="blue" class="sims">
									<li>
										<a href="?page=sim&sim=bast%20blue">Bast</a>
									</li>
									<li>
										<a href="?page=sim&sim=mae%20blue">Mae</a>
									</li>
									<li>
										<a href="?page=sim&sim=mae%20blue">Clark</a>
									</li>
									<li>
										<a href="?page=sim&sim=gable%20blue">Gable</a>
									</li>
									<li>
										<a href="?page=sim&sim=audrey%20blue">Audrey</a>
									</li>
									<li>
										<a href="?page=sim&sim=greta%20blue">Greta</a>
									</li>
								</ul>	
						</ul>
					
					<li onclick="showHousehold('worldofarts')">
						World of Arts
					</li>
					
						<ul id="worldofarts" class="households">
							<li onclick="showSims('munch')">
								Munch
							</li>
							
								<ul id="munch" class="sims">
									<li>
										<a href="Barkby/World%20of%20Arts/Munch/EmilyP.html">Emily Pickle</a>
									</li>
								</ul>
						</ul>
				</ul>
		
		</ul>
		<?php
		}
		else
		{
			include_once("sim.class.php");
			$sim = new Sim($_GET['sim']);
			$sim->generateSimPage();
		}
		?>
		
	</body>

</html>

