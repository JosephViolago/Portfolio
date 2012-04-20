<form action="../songs/add" method="post">
	<input type="text" value="Title" onclick="this.value=''" name="song"/>
	<input type="text" value="Artist" onclick="this.value=''" name="artist"/>
	<input type="submit" value="ADD"/>
</form>

<h2>All Music</h2>
<?php foreach ($songs as $song):?>
	<a class="big" href="../songs/view/
		<?php echo $song['Song']['id']?>/
		<?php echo strtolower(str_replace(" ","-",$song['Song']['song_name']))?>">
		<span class="song">
			<?php echo $song['Song']['id']?>
			<?php echo $song['Song']['song_name']?> - 
			<?php echo $song['Song']['artist']?>
		</span>
	</a><br/>
<?php endforeach?>