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

(function($){
    $.fn.slide =function(presetValue, easingValue, durationValue, paginationValue, slideshowValue)
    {
        this.each(function() 
        {
            if(presetValue == null) presetValue = 'diagonalFade';
            if(easingValue == null) easingValue = 'easeOutQuad';
            if(durationValue == null) durationValue = 800;
            if(paginationValue == null) paginationValue = true;
            if(slideshowValue == null) slideshowValue = 6000;
            
            $(this)._TMS({
                preset: presetValue,
                easing: easingValue,
                duration: durationValue,
                pagination: paginationValue,
                slideshow: slideshowValue
            });
        });
    }
})($);