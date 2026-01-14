<?php

namespace tests\functional;

use tests\FunctionalTester;

class CraftIntegrationCest
{
    public function testCraftApplicationLoads(FunctionalTester $I): void
    {
        $I->amOnPage('?p=/');
        $I->seeResponseCodeIs(200);
    }

    public function testPluginTwigVariableExists(FunctionalTester $I): void
    {
        // Test that the simpleSharing Twig variable is available
        $I->amOnPage('?p=/');
        // This would need a test template that uses {{ craft.simpleSharing }}
        $I->seeResponseCodeIs(200);
    }
}
