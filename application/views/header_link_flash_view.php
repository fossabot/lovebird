<div class="container" id="content_container">
		<div class="header medium-12 columns" id="announcement_center">
			<h1><? 	if (isset($brand))
					{
						echo "$brand";
					}
					else
					{
						echo "<a href='" . SITE_URL . "' rel='home'>" . SITE_NAME . "</a>";
					}
			?></h1>
			<p id="announcement" class="flashdata_info"><? $announcement = $this->session->flashdata('info');
					echo $announcement; ?>
			</p>
		</div>
