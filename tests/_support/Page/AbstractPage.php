<?php

namespace Page;

use AcceptanceTester;

/**
 * Class AbstractPage
 * @package Page
 */
abstract class AbstractPage
{
    /**
     * @var AcceptanceTester
     */
    protected $tester;

    /**
     * LoginPage constructor.
     *
     * @param AcceptanceTester $tester
     */
    public function __construct(AcceptanceTester $tester)
    {
        $this->tester = $tester;
    }

    /**
     * @param $pageClass
     *
     * @return AbstractPage
     */
    public function resolvePage($pageClass): AbstractPage
    {
        return new $pageClass($this->tester);
    }
}
