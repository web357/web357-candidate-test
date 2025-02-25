<?php

namespace Webtest\Component\Web357test\Site\View\Recipes;

defined('_JEXEC') or die;

use \Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

class HtmlView extends BaseHtmlView
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $params;
    protected $filterDifficulty;  // Add this to store filter state

    public function display($tpl = null)
    {
        $app = Factory::getApplication();
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->params = $app->getParams('com_web357test');

        // Get the current filter state for difficulty
        $this->filterDifficulty = $this->getState('filter.difficulty'); 

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            throw new \Exception(implode("\n", $errors));
        }

        $this->_prepareDocument();
        parent::display($tpl);
    }

    protected function _prepareDocument()
    {
        $app = Factory::getApplication();
        $menus = $app->getMenu();
        $title = null;

        $menu = $menus->getActive();
        if ($menu)
        {
            $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        }
        else
        {
            $this->params->def('page_heading', Text::_('COM_WEB357TEST_DEFAULT_PAGE_TITLE'));
        }

        $title = $this->params->get('page_title', '');
        if (empty($title))
        {
            $title = $app->get('sitename');
        }
        elseif ($app->get('sitename_pagetitles', 0) == 1)
        {
            $title = Text::sprintf('JPAGETITLE', $app->get('sitename'), $title);
        }
        elseif ($app->get('sitename_pagetitles', 0) == 2)
        {
            $title = Text::sprintf('JPAGETITLE', $title, $app->get('sitename'));
        }

        $this->document->setTitle($title);

        if ($this->params->get('menu-meta_description'))
        {
            $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->params->get('menu-meta_keywords'))
        {
            $this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
        }

        if ($this->params->get('robots'))
        {
            $this->document->setMetadata('robots', $this->params->get('robots'));
        }

        // Add Breadcrumbs
        $pathway = $app->getPathway();
        $breadcrumbTitle = $menu ? $menu->title : Text::_('COM_WEB357TEST_TITLE_RECIPES');

        if (!in_array($breadcrumbTitle, $pathway->getPathwayNames())) {
            $pathway->addItem($breadcrumbTitle);
        }
    }

    public function getState($state)
    {
        return isset($this->state->{$state}) ? $this->state->{$state} : false;
    }

    // Optionally, create a method to get the difficulty filter options for the dropdown.
    public function getDifficultyOptions()
    {
        return [
            '1-easy' => Text::_('COM_WEB357TEST_DIFFICULTY_EASY'),
            '2-medium' => Text::_('COM_WEB357TEST_DIFFICULTY_MEDIUM'),
            '3-hard' => Text::_('COM_WEB357TEST_DIFFICULTY_HARD')
        ];
    }
}
