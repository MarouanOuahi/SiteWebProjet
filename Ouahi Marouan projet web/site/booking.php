<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Réservation - Hotel Rabat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="Feel free to visit a Booking page of a Free Hotel Website Template from TemplateMonster.com."/>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<script src="maxheight.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="ie_png.js"></script>
   <script type="text/javascript">
	   ie_png.fix('.png, #header .row-2, #header .nav li a, #content, .gallery li');
   </script>
<![endif]-->
</head>
<body id="page5" onload="new ElementMaxHeight();">
<div id="main">
<!-- header -->
	<div id="header">
		<div class="row-1">
	 		<div class="wrapper">
				<div class="logo">
					<h1><a href="index.html" title="Hotel Marouan***">Hotel Marouan***</a></h1>
				</div>
				<div class="phones">
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="row-2">
	 		<div class="indent">
<!-- header-box begin -->
				<div class="header-box">
					<div class="inner">
						<ul class="nav">
					 		<li><a href="index.html">Acceuil</a></li>
							<li><a href="services.html">Services</a></li>
							<li><a href="gallery.html">Galerie</a></li>
							<li><a href="restaurant.html">Restaurant</a></li>
							<li><a href="testimonials.html">promotions</a></li>
							<li><a href="booking.php" class="current">reservation</a></li>
						</ul>
					</div>
				</div>
<!-- header-box end -->
			</div>
		</div>
	</div>
<!-- content -->
	<div id="content">
    <?php 
					  $db = mysql_connect('localhost', 'root', '');

// on sélectionne la base
mysql_select_db('marouan',$db); 
					  $ok = '';
					  if(isset($_POST["nom"]) && isset($_POST["adresse"]) && isset($_POST["tel"])
					  		&& isset($_POST["jour"]) && isset($_POST["date"]) && isset($_POST["duree"]) && isset($_POST["chambre"])){
								$req = "select * from client where nom='".$_POST["nom"]."'";
								  $client = mysql_query($req) or die("opération impossible");
								  $id = 0;
								while($data = mysql_fetch_assoc($client)){
									$id = $data["id"];
								}
								if (!$id){
									$req = "insert into client (nom,adresse,tel) values('".$_POST["nom"]."','".$_POST["adresse"]."','".$_POST["tel"]."')";
								  $client = mysql_query($req) or die("opération impossible");
								  $id = mysql_insert_id();
								}
								$req = "insert into reservation (date,chambre,client) values('".date("Y-m-d")."',".$_POST["chambre"].",".$id.")";
								  $reserv = mysql_query($req) or die("opération impossible");
								  
								  $req = "insert into sejour (reservation, date,duree) values(".mysql_insert_id().",'".$_POST["date"]."-".$_POST["jour"]."',".$_POST["duree"].")";
								  $reserv = mysql_query($req) or die("opération impossible");
								  $ok = 1;
							}
					  $req = "select * from chambre";
					  $chambre = mysql_query($req) or die("opération impossible");
					  
					  ?>
		<div class="wrapper">
			<div class="aside maxheight">
            	<div class="box maxheight">
					<div class="inner">
						<h3>Reservation:</h3>
						<form action="" id="reservation-form" method="post">
					 		<fieldset>
								<div class="field">
								  <label>Nom complet:<input type="text" value="" name="nom"/></label>
                                </div>
                                <div class="field">
								  <label>Adresse:<textarea name="adresse"></textarea></label>
                                </div>
                                <br />
                                <div class="field">
								  <label>Tel:<input type="text" value="" name="tel"/></label>
                                </div>
                                <div class="field">
								  <label>Date:</label><select class="select1" name="jour"><option>..</option><option>30</option><option>29</option><option>28</option><option>27</option><option>26</option><option>25</option>
							<option>24</option><option>23</option><option>22</option><option>21</option><option>20</option><option>19</option><option>18</option><option>17</option><option>16</option><option>15</option>
							<option>14</option><option>13</option><option>12</option><option>11</option><option>10</option><option>09</option><option>08</option><option>07</option><option>06</option><option>05</option>
							<option>04</option><option>03</option><option>02</option><option>01</option></select><select class="select2" name="date"><option>...</option><option value="2012-01">Janvier 2012</option><option value="2012-02">Février 2012</option><option value="2012-03">Mars 2012</option><option value="2012-04">Avril 2012</option><option value="2012-05">Mai 2012</option><option value="2012-06">Juin 2012</option>
							<option value="2012-07">Juillet 2012</option><option value="2012-08">Août 2012</option><option value="2012-09">Septembre 2012</option><option value="2012-10">Octobre 2012</option><option value="2012-11">Novembre 2012</option><option value="2012-12">Décembre 2012</option></select>
                            </div>
								<div class="field">
								  <label>Durée:<input type="text" value="1" name="duree"/></label>
                                </div>
								<div class="field"><label>Chambre:<select class="select2" name="chambre">
                                <?php 
								while($data = mysql_fetch_assoc($chambre)){
									echo "<option value='".$data["id"]."'>".$data["titre"]."</option>";
								}
								?>
								</select></label>
                                </div>
								<div class="button">
								  <p>&nbsp;</p>
								  <p>&nbsp;</p>
								  <p><span><span><a href="#" onclick="document.getElementById('reservation-form').submit()">réserver</a></span></span></p>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
            </div>
<!-- box begin -->
				<div class="indent">
                <div id="tz-mainbody2">
					    <div id="tz-main2">
					      <div id="tz-contentwrap2">
					          <div id="tz-content2">
					            <div id="tz-current-content2">
					              <div>
					                <div id="k2Container2">
					                  <div>
					<h2>Chambres et Appartements</h2>
					<div class="extra-wrap">
					  Chaque chambre est conçue pour vous offrir un maximum de confort et de bien-être.</br>
                      Profitez du confort des 30 chambres en bord de méditerranée ou junior suites et appartements spacieux et élégamment décorés.</br>
                        Chaque   chambre dispose d&rsquo;une vue magique sur la méditerranée et les montagnes   entourant la plage ainsi que l&rsquo;horizon méditerranéen</br>
                        Les chambres de l&rsquo;Hôtel, le Restaurant et la cafétéria possèdent toutes une terrasse privée et le même confort.</br>
                        Toutes les chambres de l'hôtel d'Amir   Plage disposent d&rsquo;une salle de bain avec douche ou baignoire, WC, sèche   cheveux, balcon ou terrasse, téléphone direct, TV satellite écran plat,   Minibar, WIFI et climatisation.</br>
                      Consultez les tarifs   de nos chambres sur mer et découvrez notre formule demi-pension qui   vous permettra de goûter à la cuisine méditerranéenne et Marocaine dans   notre restaurant avec vue panoramique sur la Méditerranée.                      
                      
                      
                      <ul class="star">
<?php $req = "select * from chambre";
					  $chambre = mysql_query($req) or die("opération impossible");
while($data = mysql_fetch_assoc($chambre)){ ?>
<li class="lii">
  <strong><em><?php echo $data["titre"]?></em></strong><br />

<?php echo $data["description"]?><br /><strong>Prix:&nbsp;</strong><i><?php echo $data["prix"]?>&nbsp; Dhs</i>
</li>
<?php } ?>
				</ul>
                </div>
			</div>
		</div>
	</div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
<!-- footer -->
	<div id="footer">
  		<ul class="nav">
	 		<li><a href="index.html">Accueil</a>|</li>
			<li><a href="services.html">Services</a>|</li>
			<li><a href="gallery.html">Galerie</a>|</li>
			<li><a href="restaurant.html">Restaurant</a>|</li>
			<li><a href="testimonials.html">Promotions</a>|</li>
			<li><a href="booking.php">Reservation</a></li>
		</ul>
		<center>
			Copyright  2012  © Hotel Marouan - developed by Marouan OUAHI<br />
<div class="fright">.</div>
			
		</center>
	</div>
</div>

</body>
</html>