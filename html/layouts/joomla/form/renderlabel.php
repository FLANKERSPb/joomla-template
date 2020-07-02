<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

extract($displayData);

/**
 * Layout variables
 * ---------------------
 * 	$text         : (string)  The label text
 * 	$description  : (string)  An optional description to use in a tooltip
 * 	$for          : (string)  The id of the input this label is for
 * 	$required     : (boolean) True if a required field
 * 	$classes      : (array)   A list of classes
 * 	$position     : (string)  The tooltip position. Bottom for alias
 */

$classes = array_filter((array)$classes);

$id = $for . '-lbl';
$title = '';

// if (!empty($description))
// {
	// if ($text && $text !== $description)
	// {
		// JHtml::_('bootstrap.popover');
		// $classes[] = 'hasPopover';
		// $title     = ' title="' . htmlspecialchars(trim($text, ':')) . '"'
			// . ' data-content="'. htmlspecialchars($description) . '"';

		// if (!$position && JFactory::getLanguage()->isRtl())
		// {
			// $position = ' data-placement="left" ';
		// }
	// }
	// else
	// {
		// JHtml::_('bootstrap.tooltip');
		// $classes[] = 'hasTooltip';
		// $title     = ' title="' . JHtml::_('tooltipText', trim($text, ':'), $description, 0) . '"';
	// }
// }

// $classes[] = 'uk-form-label';

if ($required)
{
	$classes[] = 'required';
}

$class = '';
if(!empty($classes))
{
	$class = ' class="' . implode(' ', $classes) . '"';
}

echo '<label id="' . $id . '" for="' . $for . '"' . $class . $title . $position . '>' . $text . '</label>';
