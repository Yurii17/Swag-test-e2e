<?php

use Page\loginPage;
use Page\addToCartPage;
use Page\setCookiesPage;

class addToCartWithProblemUserCest
{
    /**
     * @var loginPage
     */
    protected $loginPage;

    /**
     * @var addToCartPage
     */
    protected $addToCartPage;

     /**
     * @var setCookiesPage
     */
    protected $setCookiesPage;


    public function _before(AcceptanceTester $I)
    {
        $this->loginPage = new loginPage($I);
        $this->setCookiesPage = new setCookiesPage($I);
        $this->addToCartPage = new addToCartPage($I);
    }

    /**
     * @test
     * @throws Exception
     */
    public function assertImOnLoginPage()
    {
        $this->loginPage->assertImOnLoginPage();
    }

     /**
     * @depends assertImOnLoginPage
     * @test
     * @throws Exception
     */
    public function loginWithProblemUserEmail()
    {
        $this->loginPage->loginByProblemUserEmail();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends loginWithProblemUserEmail
     * @test
     * @throws Exception
     */
    public function assertImOnInventoryPage()
    {
        $this->setCookiesPage->setCookies();
        $this->loginPage->assertImOnInventoryPage();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends assertImOnInventoryPage
     * @test
     * @throws Exception
     */
    public function addToCart()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->addToCart();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends addToCart
     * @test
     * @throws Exception
     */
    public function addAllToCart() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->addAllToCart();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends addAllToCart
     * @test
     * @throws Exception
     */
    public function assertAfterAddingAllToCart() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->assertAfterAddingAllToCartWithProblemUser();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends assertAfterAddingAllToCart
     * @test
     * @throws Exception
     */
    public function checkoutCartAction() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->checkoutAction();
        $this->setCookiesPage->grabCookies();
    }

     /**
     * @depends addAllToCart
     * @test
     * @throws Exception
     */
    public function finishActionAndAssertOrder() 
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->finishPage();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends finishActionAndAssertOrder
     * @test
     * @throws Exception
     */
    public function sortedByAZForm()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->sortedByAZValue();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends sortedByAZForm
     * @test
     * @throws Exception
     */
    public function assertInvalidDataSortedByZAValueWithProblemUser()
    {
        $this->setCookiesPage->setCookies();
        $this->addToCartPage->assertInvalidDataSortedByZAValueWithProblemUser();
        $this->setCookiesPage->grabCookies();
    }

    /**
     * @depends assertInvalidDataSortedByZAValueWithProblemUser
     * @test
     * @throws Exception
     */
    public function logout()
    {
        $this->setCookiesPage->setCookies();
        $this->loginPage->logout();
    }


}
