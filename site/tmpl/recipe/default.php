<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Web357test
 * @author     Web357 Dev <careers@web357.com>
 * @copyright  2025 Web357.com
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Session\Session;
use Joomla\Utilities\ArrayHelper;

$canEdit = Factory::getApplication()->getIdentity()->authorise('core.edit', 'com_web357test');

if (!$canEdit && Factory::getApplication()->getIdentity()->authorise('core.edit.own', 'com_web357test'))
{
	$canEdit = Factory::getApplication()->getIdentity()->id == $this->item->created_by;
}
?>

<div class="item_fields">
<?php if ($this->params->get('show_page_heading')) : ?>
    <div class="page-header">
        <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
    </div>
    <?php endif;?>
	<table class="table">
		

		<tr>
			<th><?php echo Text::_('COM_WEB357TEST_FORM_LBL_RECIPE_TITLE'); ?></th>
			<td><?php echo $this->item->title; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_WEB357TEST_FORM_LBL_RECIPE_DESCRIPTION'); ?></th>
			<td><?php echo nl2br($this->item->description); ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_WEB357TEST_FORM_LBL_RECIPE_INGREDIENTS'); ?></th>
			<td><?php echo $this->item->ingredients; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_WEB357TEST_FORM_LBL_RECIPE_COOKING_TIME'); ?></th>
			<td><?php echo $this->item->cooking_time; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_WEB357TEST_FORM_LBL_RECIPE_DIFFICULTY'); ?></th>
			<td>
			<?php

			if (!empty($this->item->difficulty) || $this->item->difficulty === 0)
			{
				//echo Text::_('COM_WEB357TEST_RECIPES_DIFFICULTY_OPTION_' . preg_replace('/[^A-Za-z0-9\_-]/', '',strtoupper(str_replace(' ', '_',$this->item->difficulty))));
				  $difficultyLevels = ["easy" => 1, "medium" => 2, "hard" => 3];
				    $stars = isset($difficultyLevels[$this->item->difficulty]) ? $difficultyLevels[$this->item->difficulty] : 0;

				    echo '<span class="hidden">' . htmlspecialchars($this->item->difficulty) . '</span>';

				    for ($i = 0; $i < $stars; $i++) {
				        echo '<i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>';
				    }
						
						
			}
			?></td>
         <tr>
			<th><?php echo Text::_('COM_WEB357TEST_FORM_LBL_SERVING_SIZE'); ?></th>
			<td><?php echo $this->params->get('serving_size'); ?></td>
		</tr>

		</div>
		</tr>

	</table>

</div>

<?php $canCheckin = Factory::getApplication()->getIdentity()->authorise('core.manage', 'com_web357test.' . $this->item->id) || $this->item->checked_out == Factory::getApplication()->getIdentity()->id; ?>
	<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_web357test&task=recipe.edit&id='.$this->item->id); ?>"><?php echo Text::_("COM_WEB357TEST_EDIT_ITEM"); ?></a>
	<?php elseif($canCheckin && $this->item->checked_out > 0) : ?>
	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_web357test&task=recipe.checkin&id=' . $this->item->id .'&'. Session::getFormToken() .'=1'); ?>"><?php echo Text::_("JLIB_HTML_CHECKIN"); ?></a>

<?php endif; ?>

<?php if (Factory::getApplication()->getIdentity()->authorise('core.delete','com_web357test.recipe.'.$this->item->id)) : ?>

	<a class="btn btn-danger" rel="noopener noreferrer" href="#deleteModal" role="button" data-bs-toggle="modal">
		<?php echo Text::_("COM_WEB357TEST_DELETE_ITEM"); ?>
	</a>

	<?php echo HTMLHelper::_(
                                    'bootstrap.renderModal',
                                    'deleteModal',
                                    array(
                                        'title'  => Text::_('COM_WEB357TEST_DELETE_ITEM'),
                                        'height' => '50%',
                                        'width'  => '20%',
                                        
                                        'modalWidth'  => '50',
                                        'bodyHeight'  => '100',
                                        'footer' => '<button class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button><a href="' . Route::_('index.php?option=com_web357test&task=recipe.remove&id=' . $this->item->id, false, 2) .'" class="btn btn-danger">' . Text::_('COM_WEB357TEST_DELETE_ITEM') .'</a>'
                                    ),
                                    Text::sprintf('COM_WEB357TEST_DELETE_CONFIRM', $this->item->id)
                                ); ?>

<?php endif; ?>
