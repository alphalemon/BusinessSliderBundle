<?php
/*
 * This file is part of the BusinessSliderBundle and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */

namespace AlphaLemon\Block\BusinessSliderBundle\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\ImagesBlock\AlBlockManagerImages;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\JsonBlock\AlBlockManagerJsonBlock;

/**
 * AlBlockManagerBusinessSlider
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
class AlBlockManagerBusinessSlider extends AlBlockManagerImages
{
    public function getDefaultValue()
    {
        $defaultValue =
        '{
            "0" : {
                "image" : "/bundles/businessslider/images/img1.jpg"
            },
            "1" : {
                "image" : "/bundles/businessslider/images/img2.jpg"
            },
            "2" : {
                "image" : "/bundles/businessslider/images/img3.jpg"
            },
            "3" : {
                "image" : "/bundles/businessslider/images/img4.jpg"
            }
        }';

        return array('Content' => $defaultValue,
                     'InternalJavascript' => '$(".slider").startSlider();');
    }

    public function getHtml()
    {
        if (null === $this->alBlock) return "";
        
        $images = AlBlockManagerJsonBlock::decodeJsonContent($this->alBlock);

        return sprintf('<div class="slider"><ul class="items">%s</ul></div>', implode("\n", array_map(function($el){ return sprintf('<li><img src="%s" alt=""></li>', $el['image']); }, $images)));
    }

    public function getContentForEditor()
    {
        if (null === $this->alBlock) return "";
        
        $images = AlBlockManagerJsonBlock::decodeJsonContent($this->alBlock);

        return array_map(function($el){ return $el['image']; }, $images);
    }

    public function getHideInEditMode()
    {
        return true;
    }
    
    public function getReloadSuggested()
    {
        return true;
    }
}