<?php
namespace Page;

use AcceptanceTester;
use Traits\InteractWithFaker;
use Traits\InteractAsserts;
use Page\Elements\loginElements;

class loginPage extends AbstractPage
{
    use InteractWithFaker, InteractAsserts;

    /**
     * @var loginElements
     */
    protected $elements;

    /**
     * LoginPage constructor.
     *
     * @param AcceptanceTester $tester
     */
    public function __construct(AcceptanceTester $tester)
    {
        parent::__construct($tester);
        $this->elements = new loginElements;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function assertImOnLoginPage()
    {
        $this->tester->amOnPage('/');
        $this->tester->waitForElement($this->elements->loginContainer, 2);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function assertImOnInventoryPage()
    {
        $this->tester->amOnPage('/inventory.html');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function login($value1, $value2)
    {
        $btn = $this->elements->button;
        $this->fillAndClick($value1, $value2, $btn);
        $this->tester->wait(1);
    }

    public function logout() 
    {
        $this->clickWait($this->elements->menu);
        $this->clickWait($this->elements->logout);
        $this->assertImOnLoginPage();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function loginByStandartUserEmail() {
        $value1 = getenv('USER_EMAIL');
        $value2 = getenv('USER_PASSWORD');
        $this->login($value1, $value2);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function loginByLockedUserEmail() {
        $value1 = getenv('USER_LOCKED_EMAIL');
        $value2 = getenv('USER_PASSWORD');
        $this->login($value1, $value2);
        $this->asserts($this->elements->errorMessage, $this->elements->h3);
    }

     /**
     * @return void
     * @throws Exception
     */
    public function loginByInvalidUserEmail() {
        $value1 = 'test';
        $this->login($value1, $value1);
        $this->asserts($this->elements->errorMessageUserDoNotMutch, $this->elements->h3);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function loginByProblemUserEmail() {
        $value1 = getenv('USER_PROBLEM_EMAIL');
        $value2 = getenv('USER_PASSWORD');
        $this->login($value1, $value2);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function loginByPefrormanceUserEmail() {
        $value1 = getenv('USER_PERFORMANCE_EMAIL');
        $value2 = getenv('USER_PASSWORD');
        $this->login($value1, $value2);
        $this->tester->wait(10);
    }


}
