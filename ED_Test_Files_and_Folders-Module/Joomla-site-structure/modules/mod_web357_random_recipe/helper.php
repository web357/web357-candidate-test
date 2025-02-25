<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

class ModWeb357RandomRecipeHelper
{
    public static function getRandomRecipe()
    {
        // Get a database object
        $db = Factory::getDbo();
        $query = $db->getQuery(true);

        // Select fields from the component's table
        $query->select($db->quoteName(['id', 'title', 'difficulty', 'serving_size']))
              ->from($db->quoteName('#__web357test_recipes')) // Replace with your component's table name
              ->where($db->quoteName('state') . ' = 1') // Ensure the recipe is published
              ->order('RAND()')
              ->setLimit(1);

        $db->setQuery($query);
        $recipe = $db->loadAssoc();

        if ($recipe) {
            // Add a link to the full recipe (assuming your component uses a view called 'recipe')
            $recipe['link'] = 'index.php?option=com_web357test&view=recipe&id=' . $recipe['id'];
        }

        return $recipe;
    }
}