<?php
//	$addMsg = $query;																								// ### DEBUG ###
	if ($song == NULL || $artist == NULL){ $addMsg = "You gotta enter something..."; }
	else { $addMsg = "Success!</br> $song - $artist</br> Sucessfully Added!"; }
?>
<p><?php $addMsg ?></p>
<a class="big" href="/diy-mvc/songs/viewall"><< Go Back</a>