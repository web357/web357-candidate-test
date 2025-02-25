<?php

/**
 * @version    CVS: 1.0.0
 * @package    Joomla.Site/modules
 * @subpackage mod_web357_random_recipe
 * @author     Efthymios Drivas <https://seomywebsite.net>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

// Include the helper file
require_once __DIR__ . '/helper.php';

// Get a random recipe
$recipe = ModWeb357RandomRecipeHelper::getRandomRecipe();

// Include the template
require ModuleHelper::getLayoutPath('mod_web357_random_recipe', $params->get('layout', 'default'));
