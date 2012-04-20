bootstrap.php (As of now, can just be schlepped into index.php...)
	Purpose:
		- "require_once..."
		- Load stuff.
		- "Process" the URL through ./lib/shared.php

shared.php
	Purpose:
		- Developer Mode
			"function devMode()"
			- Checks to see if the environment is "Under Development"
				- If so, Display Errors

		- Anti-Injection Cleanup
			"function tidyMagicQuotes()"
				"function stripSlashesDeep($value)"
			"function tidyRegGlobals()"

		- URL Processing
			"function callHook()"

			- Explodes URL --> (foobar.com/$controller/$action(view)/$queryString.php
			- if exists "method" (where?) for "$controller/$action"
				- Call callback($controller, $action) + URL extra stuff ($queryString)
			-	else "Error"

		- Load necessary classes
			"function __autoload($className)"

			- if exists ./lib/"foo".class.php
				- elseif exists ./apps-mvc/controllers/"foo".php
				- elseif exists ./apps-mvc/models/"foo".php
			- else "Error"

	Names:
			devMode 				<-- setReporting
			tidyMagicQuotes	<--	removeMagicQuotes
			tidyRegGlobals	<--	unregisterGlobals
			callHook	(SAME)
			__autoload (SAME)
				$lwrClass		<-- consolidate "strtolower($className)"
				$dirClass		<-- consolidate "./class/foo.class.php"
				$dirApps		<--	consolidate "./apps-mvc/"

	Debug:
		_autoload
			x4 Class Loads

			songsctrl; song
			X		/lib/song.class.php
			O		/apps-mvc/controllers/songsctrl.php
			O		/apps-mvc/models/song.php

			controller; controller
			O		/lib/controller.class.php							// String Error? [Fix'td]
			X		/apps-mvc/controllers/controller.php
			X		/apps-mvc/models/controller.php

			model; model
			O		/lib/model.class.php
			X		/apps-mvc/controllers/model.php
			X		/apps-mvc/models/model.php

			sqlquery; sqlquery
			O		/lib/sqlquery.class.php
			X		/apps-mvc/controllers/sqlquery.php
			X		/apps-mvc/models/sqlquery.php

controller.class.php
	Purpose:
		- Base Class for ALL controllers
		- Communication liason between the controller, model, & view.
		- Creates an object for the Model Class & Template Class
	Notes: 
		- You may need to put an "unset($model/Template);" in if dupe-looping
		http://www.php.net/manual/en/language.references.php#93292
model.class.php
	Purpose:
		- Setup MySQL Connect stuff (Abstracted)

sqlquery.class.php
	Purpose:
		- Query constructor
		- Query $result --> model multidimensional array($var['modelName']['fieldName'])

template.class.php
	Purpose:
		- Grab proper app-mvc controllers for requested $controller/$action