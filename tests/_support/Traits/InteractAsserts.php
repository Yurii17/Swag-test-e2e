<?php

namespace Traits;

use Exception;

trait InteractAsserts
{
    /**
     * @param $text
     * @param $el
     * @throws Exception
     */
    public function asserts($text, $el)
    {
        $this->tester->waitForText($text, 5, $el);
        $this->tester->see($text, $el);
    }

    /**
     * @throws Exception
     */
    public function waitClick($btn)
    {
        $this->tester->wait(1);
        $this->tester->click($btn);
    }

    /**
     * @param $btn
     */
    public function clickWait($btn)
    {
        $this->tester->click($btn);
        $this->tester->wait(1);
    }

    /**
     * @param $btn
     */
    public function waitClickWait($btn)
    {
        $this->tester->wait(0.5);
        $this->tester->click($btn);
        $this->tester->wait(0.5);
    }

    /**
     * @param $text
     * @param $elTitle
     * @param $url
     * @throws Exception
     */
    public function assertsPage($text, $elTitle, $url)
    {
        $this->tester->waitForText($text, 15, $elTitle);
        $this->tester->see($text, $elTitle);
        $this->tester->seeInCurrentUrl($url);
    }

    /**
     * @param $el
     * @param $dropEL
     * @param $selectEl
     * @throws Exception
     */
    public function customSelectProperty($el, $dropEL, $selectEl)
    {
        $this->tester->click($el);
        $this->tester->waitForElement($dropEL, 2);
        $this->tester->click($dropEL);
        $this->tester->waitForElementVisible($selectEl, 2);
        $this->tester->click($selectEl);
        $this->tester->wait(1);
    }

    /**
     * @return void
     * @param $el
     * @throws Exception
     */
    public function waitForEl($el)
    {
        $this->tester->waitForElementVisible($el, 5);
        $this->tester->wait(0.5);
        $this->tester->click($el);
    }

     /**
     * @return void
     * @throws Exception
     */
    public function selectDateInCalendar($el, $btn)
    {
        $this->waitForEl($el);
        $this->waitClick($btn);
        $this->tester->wait(1);
    }

    /**
     * @param $el
     */
    public function unitForm($el)
    {
        $grabProperty = $this->tester->grabTextFrom($el);
        try {
            $this->tester->assertSame($grabProperty, 'Apartment');
            $this->tester->fillField($this->elements->leasePropertyUnit, 'Unit' . rand(9, 89999));
        } catch (Exception $e) {
            $this->tester->wait(0.2);
        }
    }

    /**
     * @param $el
     * @param $drop
     * @param $btn
     * @throws Exception
     */
    public function selectForm($el, $drop, $btn)
    {
        $this->tester->waitForElementVisible($el, 3);
        $this->tester->fillField($el, rand(2, 99));
        $this->tester->click($drop);
        $this->tester->click($btn[array_rand($btn)]);
    }

    /**
     * @param $el
     * @param $field
     * @throws Exception
     */
    public function sameValueForm($el, $field)
    {
        $this->tester->waitForElement($el, 3);
        $grab = $this->tester->grabValueFrom($el);
        $this->tester->assertSame($field, $grab);
    }

    /**
     * @param $el
     * @param $before
     * @throws Exception
     */
    public function sameTextForm($el, $before)
    {
        $this->tester->waitForElement($el, 3);
        $grab = $this->tester->grabTextFrom($el);
        $this->tester->assertSame($before, $grab);
    }

     /**
     * @param $el
     * @param $before
     * @throws Exception
     */
    public function assertNotSameTextForm($el, $before)
    {
        $this->tester->waitForElement($el, 3);
        $grab = $this->tester->grabTextFrom($el);
        $this->tester->assertNotSame($before, $grab);
    }

    /**
     * @param $el
     * @param $url
     * @throws Exception
     */
    public function waitForElAndUrl($el, $url)
    {
        $this->tester->waitForElementVisible($el, 5);
        $this->tester->seeInCurrentUrl($url);
    }

    /**
     * @return void
     * @param $givenByEl
     * @throws Exception
     */
    public function testByCart($givenByEl)
    {
        $btn = $givenByEl;
        $this->waitClick($btn);
        $this->tester->waitForElementVisible($this->elements->test[0], 3);
        $noticeGivenBy = $this->elements->test;
        $noticeGivenBySec = $this->elements->test1;
        try {
            $this->tester->click($noticeGivenBy[array_rand($noticeGivenBy)]);
        } catch (Exception $e) {
            $this->tester->click($noticeGivenBySec[array_rand($noticeGivenBySec)]);
        }
    }

    /**
     * @param $value1
     * @param $value2
     * @param $btn
     */
    public function fillAndClick($value1, $value2, $btn)
    {
        $this->tester->fillField($this->elements->username, $value1);
        $this->tester->fillField($this->elements->password, $value2);
        $this->tester->click($btn);
    }

    /**
     * @param $el
     * @param $value
     * @param $file
     */
    public function saveData($el, $value, $file)
    {
        $grab = $this->tester->grabValueFrom($el);
        $data = [
            $value => $grab
        ];
        $this->saveUser([
            $data[$value], ''
        ], $file);
    }


}
