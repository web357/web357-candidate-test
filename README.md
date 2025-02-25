# 🚀 Web357 Test Component - Developer Skills Assessment

Welcome to the informational file of your updated component. Hereafter you will find the following sections:
    -  1. ✨ Installation instructions
    -  2. 📋 Changelog of modifications
    -  3. 🖼️ Screenshots of new features
    -  4. 🔍 How to test changes
    -  5. 💡 Any assumptions or decisions made
	
### 1. ✨ Installation instructions

	Follow the numbered steps to install the component, which you obtained.

	# 1.1 
	Download the main component folder. Inside you will find all the related folder and files, as below:
		- forms
		- src
		- tmpl
		- ReadMe.md
	# 1.2
	Create a .zip file.  
		Keep all files maintaining the directory structure, do not ommit or alter anything.
	
	# 1.3
	Log in to your Joomla Administrator Panel - Upload and Install

		- Go to Joomla Admin Panel (https://yourdomain/administrator/)
		- Locate the LH side menu, expand, if necessary.
		- Navigate to System 
		- Locate the Update section. Click on the Extensions 
		- Click on the Manage Extensions button
		- Click on Install Extensions
		- Click Upload Package File and press on the green button "browse for file"
		- Browse and locate the correct component, select your component and open the component's .zip
		- Click Install
		- At the LH side of the main Dashboard-menu, select the "All Menus Items" option to visualize, on the front-end menu, your new componet
		- Press on the Select blue button, to add the component's url, check for the correct name
				
	
#  2. 📋 Changelog of modifications
		
		#  2.1 Added serving size parameter with configuration and display
		
			- Added field name="serving_size" to recipeform.xml
		
		#  2.2 DB Queries
		
			- Run the following SQL query to find the component’s entry name (=com_web357test):
				SELECT * FROM `j532_extensions` WHERE type = 'component' AND element LIKE '%357%';
				
		#  2.3 Database modification
		
			// Created new database column for storing serving sizes
				- ALTER TABLE `j532_web357test_recipes` ADD `serving_size` VARCHAR(100) NOT NULL DEFAULT '2-4 servings';
			// Verification of the ALTER TABLE query
				- SHOW COLUMNS FROM `j532_web357test_recipes` WHERE Field = 'serving_size'; 
		    // Created new params, for the default value
				- UPDATE j532_extensions SET params = '{"save_history":"0", "serving_size":"2-4 servings"}' WHERE element = 'com_web357test' AND type = 'component';
			
		#  2.4 Implementation of display logic
		
			// Implemented display logic
			
				- Frontend Files (Site Components)
					yourjoomlasite\components\com_web357test\tmpl\recipeform\default.php
					yourjoomlasite\components\com_web357test\tmpl\recipes\default.php
					yourjoomlasite\components\com_web357test\tmpl\recipe\default.php
				- Views
					yourjoomlasite\components\com_web357test\src\View\Recipes\HtmlView.php

				- Administrator Files (Backend Components)
					Model
						yourjoomlasite\administrator\components\com_web357test\src\Model\RecipesModel.php
					Forms
						yourjoomlasite\administrator\components\com_web357test\forms\filter_recipes.xml
						yourjoomlasite\administrator\components\com_web357test\forms\recipe.xml
					Admin Views and Templates
						yourjoomlasite\administrator\components\com_web357test\tmpl\recipes\default.php
						yourjoomlasite\administrator\components\com_web357test\tmpl\recipe\default.php
						yourjoomlasite\administrator\components\com_web357test\tmpl\recipe\edit.php

				
		#  2.5 Language Updates	
		
			// Updated language files with new strings: yourjoomlasite\language\el-GR\com_web357test.ini					
			// Updated language files with new strings: yourjoomlasite\language\en-GB\com_web357test.ini			
			// Updated language files with new strings: yourjoomlasite\administrator\language\en-GB\com_web357test.ini						
			// Updated language files with new strings: yourjoomlasite\administrator\language\el-GR\com_web357test.ini
			
			
		#  2.6 Fixed the following issue/es
			
				// Modification of yourjoomlasite\components\com_web357test\src\Model\RecipeformModel.php
				
					- Warning: Attempt to read property "difficulty" on array in yourjoomlasite\components\com_web357test\src\Model\RecipeformModel.php, line 297
					- modified : protected function loadFormData()
		
		#  2.7 Backend functionality for difficulty filter	
				
			// Adjusted Backend functionality
			
				- Modified the relative td element at yourjoomlasite\administrator\components\com_web357test\tmpl\recipes\default.php
				- Modified the relative form element at yourjoomlasite\administrator\components\com_web357test\forms\recipe.xml
				- Replaced text-based difficulty with Font Awesome icons
				- Added aria-labels for screen readers
				- Included hidden text for accessibility
				- Updated CSS for icon spacing and alignment yourjoomlasite\components\com_web357test\media\css\component.css

			// Modified files:	
				yourjoomlasite\components\com_web357test\tmpl\recipes\default.php
				yourjoomlasite\components\com_web357test\tmpl\recipe\default.php
				yourjoomlasite\administrator\components\com_web357test\tmpl\recipes\default.php
				yourjoomlasite\administrator\components\com_web357test\forms\recipe.xml
				yourjoomlasite\components\com_web357test\forms\recipeform.xml
				
		#  2.8 Random Recipe Module 

			#  2.8.1 Random Recipe Module Architecture
			// Creation of the correct folder/files under yourjoomlasite/modules, like the structure schema hereafter:
			
				joomla_root/
				├── components/
				│   └── com_web357test/          # custom component
				└── modules/
				    └── mod_web357_random_recipe/ # custom module
				        ├── mod_web357_random_recipe.php
				        ├── helper.php
				        ├── tmpl/
						│ 	 └─default.php
						│											
				        ├── language/
						│ 		├──en-GB
						│ 		└──el-GR					
				        └── mod_web357_random_recipe.xml
				
			//	Adjustment of the language files, under each language folder, with the correct translations
			
			#  2.8.2 Install the Module in Joomla

				// Log in to Joomla Admin:
					- Access your Joomla admin panel (e.g., http://yourjoomlasite.com/administrator).
					- Go to the Extension Manager:
					- In the Joomla admin panel, navigate to System > Install > Extensions > Manage Extensions > Install.

				// Upload the Module Zip File:

					- Click the Upload Package File tab.
					- Click Choose File and select the mod_web357_random_recipe.zip file from your computer.
					- Click Upload & Install.

				// Verify Installation:

					If the installation is successful, you’ll see a message like "Installation of the module was successful."

			#  2.8.3 Enable and Configure the Module

				// Go to the Module Manager:
					- Navigate to System > Manage Extensions > Modules.

				// Find the Module, (LH Menu) Content -> Site modules -> New (button):
					- Look for the "RANDOM_RECIPE" module in the masonry-style list.

				// Enable the Module:
					- If the module is not already enabled, click the red circle under the "Status" column to enable it.

				// Configure the Module:
					- Click on the module name to open its settings.
					- Set the Module Position (e.g., sidebar).
					- Configure the Menu Assignment to determine where the module should appear (e.g., on all pages, only on the home page, etc.).
					- Save the changes.
					
				//  Adjustment of the module title
				    - Navigate through the LH Dashboard Menu -> Go Content -> Site Modules and press on the relevant Module.
					- Adjust the front view title of the module by typing in the title element, then save.

			#  2.8.3.4  Test the Module

				// Visit the Frontend:
					- Go to your Joomla site’s frontend (e.g., http://yourjoomlasite.com).

				// Check the Module:
					- Verify that the module appears in the assigned position (e.g., "sidebar").
					- Reload the page to see a new random recipe.

				// Click the Link:
					- Click the "View Full Recipe" link to ensure it redirects to the correct recipe page.

			#  2.8.3.5 Optional - Add Sample Data

				// If your com_web357test component is not installed or doesn’t have any recipes, you’ll need to:

					- Install the Component:
						- Ensure the com_web357test component is installed and working.
						- If not, install it using the same process as the module.

					- Add Recipes:
						- Go to the backend of your Joomla site.
						- Navigate to Components > Web357test.
						- Add a few recipes with titles, difficulty levels, and serving sizes.

			#  2.8.3.6 Final Notes

				// Database Table: Ensure the #__web357test_recipes table exists and contains data. If not, the module won’t have any recipes to display.

				// Language Files: If you’re using a language other than English or Greek, make sure to add the corresponding language files.
    
			#  3. 🖼️ Screenshots of new features
			
				// screenshots are include seperately, in the uploaded folder named "test-screenshots"