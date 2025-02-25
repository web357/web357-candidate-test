<?php
defined('_JEXEC') or die;

// Define difficulty icons
$difficultyIcons = [
    '1-easy' => '⭐',
    '2-medium' => '⭐⭐',
    '3-hard' => '⭐⭐⭐'
];


// Display recipe details
if (!empty($recipe)) {
    echo '<div class="random-recipe">';
    echo '<h3>' . htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8') . '</h3>';
    echo '<p><strong>' . JText::_('MOD_WEB357_RANDOM_RECIPE_DIFFICULTY') . ':</strong> ' . $difficultyIcons[$recipe['difficulty']] . '</p>';
    echo '<p><strong>' . JText::_('MOD_WEB357_RANDOM_RECIPE_SERVING_SIZE') . ':</strong> ' . htmlspecialchars($recipe['serving_size'], ENT_QUOTES, 'UTF-8') . ' approximately.</p>';
    echo '<a href="' . JRoute::_($recipe['link']) . '" class="btn btn-primary">' . JText::_('MOD_WEB357_RANDOM_RECIPE_VIEW_FULL') . '</a>';
    echo '</div>';
} else {
    echo '<p>' . JText::_('MOD_WEB357_RANDOM_RECIPE_NO_RECIPE') . '</p>';
}