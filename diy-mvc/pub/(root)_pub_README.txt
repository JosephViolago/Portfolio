.htaccess
	Purpose:
		- bootstrap.php
			- all calls go to index.php --> bootstrap.php (except imgs/js/css)
		- Clean URLs (SEO-friendly)
		- Single Point-of-Entry

index.php
	Purpose:
		- Main gateway
		- Grab URL
		- Load "bootstrap.php"