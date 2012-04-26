(function($){
    $.fn.startSlider =function(presetValue, easingValue, durationValue, paginationValue, slideshowValue)
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