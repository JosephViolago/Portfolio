<?php

class SongsCtrl extends Controller {

	function view($id = null,$song_name = null,$artist = null) {
		$this->set('title','Now Playing... | Joe`s Playlist');
		$this->set('songs',$this->song->select($id));
	}

	function viewall() {
		$this->set('title','All Songs | Joe`s Playlist');
		$this->set('songs',$this->song->selectAll());
	}

	function add() {
		$song = $_POST['song'];
		$artist = $_POST['artist'];

		$this->set('title','Song Added | Joe`s Playlist');
		$this->set('song',$song);
		$this->set('artist',$artist);

/*			XXXX DEPRECATED: replaced by L29-L33 		XXXX		**
		$this->set('songs',$this->song->query('
			INSERT INTO songs (song_name, artist) 
			VALUES (\''.mysql_real_escape_string($song).'\',
							\''.mysql_real_escape_string($artist).'\')'));
**			XXXX DEPRECATED: replaced by L29-L33		XXXX		*/
		$insert = sprintf("INSERT INTO songs (song_name, artist) VALUES('%s', '%s')",
								mysql_real_escape_string($song),
								mysql_real_escape_string($artist));
//		$this->set('query',$insert);															// ### DEBUG ###
		$this->set('songs',$this->song->query($insert));
	}

	function delete($id = null) {
		$this->set('title','Song Removed | Joe`s Playlist');
/*			XXXX DEPRECATED: replaced by L41-L44		XXXX		**
		$this->set('songs',$this->song->query('DELETE FROM songs WHERE id = \''.mysql_real_escape_string($id).'\''));
**			XXXX DEPRECATED: replaced by L41-L44		XXXX		*/
		$delete = sprintf("DELETE FROM songs Where ID = '%d'",
								mysql_real_escape_string($id));
		$this->set('query',$delete);
		$this->song->query($delete);
	}

}