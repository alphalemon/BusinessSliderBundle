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

namespace AlphaLemon\Block\BusinessSliderBundle\Tests\Unit\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\Content\Block\Base\AlBlockManagerContainerBase;
use AlphaLemon\Block\BusinessSliderBundle\Core\Block\AlBlockManagerBusinessSlider;

/**
 * AlBlockManagerBusinessSliderTest
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
class AlBlockManagerBusinessSliderTest extends AlBlockManagerContainerBase
{
    public function testDefaultValue()
    {
        $this->initContainer();
                
        $value =
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
        $expectedValue = array(
            'Content' => $value,
            'InternalJavascript' => '$(".slider").startSlider();',            
        );
        
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $this->assertEquals($expectedValue, $blockManager->getDefaultValue());
    }

    public function testAnEmptyStringIsReturnedWhenTheBlockHasNotBeenSet()
    {
        $this->initContainer();
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $this->assertEquals('', $blockManager->getHtml());
    }

    public function testTheSliderIsRendered()
    {
        $this->initContainer();
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $block = $this->setUpBlock();
        $blockManager->set($block);
        $content = $blockManager->getHtml();
        
        $expectedResult = '<div class="slider"><ul class="items"><li><img src="/bundles/businessslider/images/img1.jpg" alt=""></li>' . "\n";
        $expectedResult .= '<li><img src="/bundles/businessslider/images/img2.jpg" alt=""></li>' . "\n";
        $expectedResult .= '<li><img src="/bundles/businessslider/images/img3.jpg" alt=""></li>' . "\n";
        $expectedResult .= '<li><img src="/bundles/businessslider/images/img4.jpg" alt=""></li></ul></div>';
        
        $this->assertEquals($expectedResult, $content);
    }
    
    public function testAnEmptyStringIsReturnedWhenTheBlockHasNotBeenSetForContentEditor()
    {
        $this->initContainer();
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $this->assertEquals('', $blockManager->getContentForEditor());
    }
    
    public function testFetchContentsForEditor()
    {
        $this->initContainer();
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $block = $this->setUpBlock();
        $blockManager->set($block);
        $content = $blockManager->getContentForEditor();
        
        $expectedResult = array(
            '/bundles/businessslider/images/img1.jpg',
            '/bundles/businessslider/images/img2.jpg',
            '/bundles/businessslider/images/img3.jpg',
            '/bundles/businessslider/images/img4.jpg',
        );
        
        $this->assertEquals($expectedResult, $content);
    }
    
    public function testHideInEditModeIsTrue()
    {
        $this->initContainer();
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $this->assertTrue($blockManager->getHideInEditMode());
    }
    
    public function testReloadSuggestedIsTrue()
    {
        $this->initContainer();
        $blockManager = new AlBlockManagerBusinessSlider($this->container, $this->validator);
        $this->assertTrue($blockManager->getReloadSuggested());
    }

    private function setUpBlock()
    {
        $value =
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

        $block = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
        $block->expects($this->once())
            ->method('getContent')
            ->will($this->returnValue($value));

        return $block;
    }
}