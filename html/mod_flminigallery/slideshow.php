<?php

defined( '_JEXEC' ) or die();

JHtml::_('script', 'uikit/slideshow.js', array('version' => 'auto', 'relative' => true));

// 'animation:\'fade|scroll|scale|swipe\'',
// 'duration:500',
// 'height:\'auto\'',
// 'start:0',
// 'autoplay:false|true',
// 'pauseOnHover:true|false',
// 'autoplayInterval:7000',
// 'videoautoplay:true|false',
// 'videomute:true|false',

$data = array(
		'animation:\'scroll\'',
		'autoplay:true',
		'pauseOnHover:false',
);

$images = $params->get('images');
$i = 0;
$dotnav = '';

$html = '<div class="uk-panel">'
			.'<div class="uk-slidenav-position" data-uk-slideshow="{'.implode(',', $data).'}">'
			.'<ul class="uk-slideshow">';

foreach ($images as $image)
{
	if(file_exists($image->src))
	{
		$alt = $image->alt;
		$attribs = array();
		// $attribs['width'] = '600';
		// $attribs['height'] = '400';
		
		if ($image->title)
		{
			$attribs['title'] = $image->title;
		}
		else
		{
			$attribs['title'] = $image->alt;
		}
		
		if ($isPrefix)
		{
			switch ($addPrefix)
			{
				case 'alt':
					$alt = $prefix . ' ' . $alt;
					break;
				case 'title':
					$attribs['title'] = $prefix . ' ' . $attribs['title'];
					break;
				default:
					break;
			}
		}
		
		$html .= '<li class="uk-overlay">' . JHtml::image($image->src, $alt, $attribs);
		
		if($image->content)
		{
			$html .= $image->content;
		}
		
		if($image->link)
		{
			$html .= JHtml::link($image->link, '', ['class' => 'uk-position-cover']);
		}
		
		$html .= '</li>';
		
		$dotnav .= '<li data-uk-slideshow-item="'.$i++.'"><a href=""></a></li>';
	}
}

$html .= '</ul>';

if($slidenav = true)
{
	$html .= '<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>'
				.'<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>';
}

if($dotnav)
{
	$html .= '<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">'
				.$dotnav
				.'</ul>';
}

$html .= '</div>'
			.'</div>';



echo $html;
