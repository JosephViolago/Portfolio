<h2>Now Playing:</h2>
<p>Song: <?php echo $songs['Song']['song_name']?></p>
<p>By: <?php echo $songs['Song']['artist']?></p>

	<a class="big" href="/diy-mvc/songs/delete/
		<?php echo $songs['Song']['id']?>">
		<span class="item">Delete this item</span>
	</a>