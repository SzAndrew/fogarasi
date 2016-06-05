<div class="services">
	<div class="services_box">
		<div class="services_text">
			<h1><?php print $XML->services->title[0]; ?></h1>
			<p><?php print $XML->services->description[0]; ?></p>
		</div>
		<div class="services_text">
			<h2><?php print $XML->services->title[1]; ?></h2>
			<p><?php print $XML->services->description[1]; ?></p>
		</div>
	</div>
</div>
<div class="services_img">
	<hr class="top_line">
	<img src="images/auto.jpg">
	<hr class="bottom_line">
</div>
<div class="services">
	<div class="services_box box_two">
		<div class="services_text">
			<h2><?php print $XML->services->title[2]; ?></h2>
			<p><?php print $XML->services->description[2]->text0; ?></p>
			<p><?php print $XML->services->description[2]->text1; ?></p>
		</div>
		<div class="services_text">
			<h2><?php print $XML->services->title[3]; ?></h2>
			<p><?php print $XML->services->description[3]; ?></p>
		</div>
	</div>
</div>