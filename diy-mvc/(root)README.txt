###############
Directory Tree
###############
-	apps-mvc
	|__ controllers							// Function Logic; control loops (if/for/while)
	|__ models									// DB Logic; Query Constructor(?); "Abstraction"
	|__ views										// Markup Template; HTML/XML/JSON

-	config											// DB/server credentials

-	lib													// framework; "foo".class.php

-	pub													// app-specific front-end style + js-coolthings + imgs
	|__ css
	|__ img
	|__ js
	|__ swf


###################
Coding Conventions
###################
Basename = "foo"
Action = "bar" 								// for mvc/Views

Database
	- Tables "foos"
		- Basename: lowercase; plural
mvc (Apps)
	- Models: "Foo"
		- Basename: CamelCase; singular
	- Views: "foo/bar.html"
		- Basename: directory name; singular
		- Action: "View" filename; plural (only when necessary)
	- Controllers: "foo_ctrl"
		- Basename: append "_ctrl" at end of name; singular
lib
	- Classes "foo.class.php"
		- Basename" lowercase; singular