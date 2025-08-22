<?php

namespace SimpleSharing\Tests\Functional;

use SimpleSharing\Tests\FunctionalTester;

class SimpleSharingControllerCest
{
    public function _before(FunctionalTester $I): void
    {
        // Setup test environment
    }

    public function testControllerActionWithValidEntry(FunctionalTester $I): void
    {
        // Test the controller action with valid parameters
        $I->sendGet('/actions/simple-sharing/default/url', [
            'id' => 1,
            'sectionId' => 1
        ]);
        
        // Should return 200 if entry exists and has URL
        $I->seeResponseCodeIsSuccessful();
    }

    public function testControllerActionWithInvalidEntry(FunctionalTester $I): void
    {
        // Test with non-existent entry
        $I->sendGet('/actions/simple-sharing/default/url', [
            'id' => 99999,
            'sectionId' => 1
        ]);
        
        // Should return 404 for non-existent entry
        $I->seeResponseCodeIs(404);
    }

    public function testControllerActionWithMissingParameters(FunctionalTester $I): void
    {
        // Test without required parameters
        $I->sendGet('/actions/simple-sharing/default/url');
        
        // Should handle missing parameters gracefully
        $I->seeResponseCodeIs(404);
    }

    public function testControllerReturnsHtmlLinks(FunctionalTester $I): void
    {
        // Test that response contains expected HTML structure
        $I->sendGet('/actions/simple-sharing/default/url', [
            'id' => 1,
            'sectionId' => 1
        ]);
        
        if ($I->grabResponse() !== '') {
            // If we get a response, check it contains sharing links
            $I->seeInResponse('target="_blank"');
            $I->seeInResponse('href="https://');
        }
    }
}