### Package Installation Guide
------------------------------
## ✨ Installation Instructions
To install the package containing both the component and module, follow these steps:

Download the Package:

Obtain the pkg_web357.zip file from the repostory.
Access Joomla! Administrator Panel:

Log in to your Joomla! administrator area.
Navigate to Extension Manager:

If you ahve already installed same component or module please uninstalled first.
From the top menu, select Extensions > Manage > Install.
Upload and Install the Package:

In the "Upload Package File" section, click Choose File and select the pkg_web357.zip file.
Click Upload & Install.
Upon successful installation, both the component and module will be installed and ready for configuration.
_____________________________________
## 📋 Changelog of Modifications
1) added Component Parameters in config.xml file as below:
	name ="serving_size" and type="list" with options:
	1-2 servings
	2-4 servings
	4-6 servings
	6-8 servings
	8+ servings

2) Updated Frontend Display for difficulty level ("easy", "medium", "hard") with  Font Awesome icons

3) Updated Backend Functionality - 
	a) Added a filter dropdown in the backend recipes list to filter by difficulty level (easy/medium/hard)
	b) completed function of filter so it's working accordingly.

4) Module Development - 
  a) Create a module(mod_web357_random_recipe) Admin Name ="Random Recipe Module"
  b) Display Random recipe with title, difficulty stars and Serving Size

----------------------------------
## 🖼️ Screenshots of New Features

Note: Replace the placeholder text with actual image links or embed the images directly.

Defualt Serving Size     :  screenshots/added-default-servings-size.png
Admin Filter in Recipes  :  screenshots/admin-Filter.png
Frontend Difficulty stars in Recipes:  screenshots/front-end-hard-level-star-and-module.png
Frontend Difficulty stars in Recipe:  screenshots/recipe-detail-page-with-star.png

## 🔍 How to Test Your Changes
-------------------------------
To ensure the package functions correctly:

## Verify Installation:

Confirm that both the component and module appear in the Extension Manager under Manage.
Test Component Functionality:

	a) Navigate to the component via the Joomla! administrator menu >> Web357 Test >> Click on Recipes.
	b) Click on Options button at the top right >> you can see new paramter added "Default Serving Size"
	c) When you click on Filter Option button in Recipes page ( Web357 Test >> Click on Recipes), You can see there is new filter added with difficulty level dropdown
	d) You can create a menu and assigned Recipes view, so you can check Recipes list and there you can see updated values for Difficulty evels and also you can see serving size.

	NOTE: After installed package you must set Serving Size value then you can see this value in front end.

 Perform standard operations to ensure all features work as expected.


## Test Module Display(mod_web357_random_recipe):

Go to Extensions > Modules.
Ensure the new module is listed and enabled.
Assign the module to a visible position in your template and check the frontend for proper display.
You can see there Title has lined with detail recipe page of component.
