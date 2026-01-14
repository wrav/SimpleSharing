<?php

namespace tests\unit;

use Codeception\Test\Unit;
use wrav\simplesharing\variables\SimpleSharingVariable;

class SimpleSharingVariableTest extends Unit
{
    protected SimpleSharingVariable $variable;

    protected function _before(): void
    {
        $this->variable = new SimpleSharingVariable();
    }

    public function testFacebookLink(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'facebook');
        
        $this->assertSame(
            'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
            $result
        );
    }

    public function testTwitterLink(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'twitter');
        
        $this->assertSame(
            'https://twitter.com/intent/tweet?text=' . urlencode($url),
            $result
        );
    }

    public function testLinkedInLink(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'linkedin');
        
        $this->assertSame(
            'https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url=' . urlencode($url),
            $result
        );
    }

    public function testMixLink(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'mix');
        
        $this->assertSame(
            'https://mix.com/add?url=' . urlencode($url),
            $result
        );
    }

    public function testTumblrLink(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'tumblr');
        
        $this->assertSame(
            'https://www.tumblr.com/share/link?url=' . urlencode($url),
            $result
        );
    }

    public function testRedditLink(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'reddit');
        
        $this->assertSame(
            'http://www.reddit.com/submit?url=' . urlencode($url),
            $result
        );
    }

    public function testUnsupportedService(): void
    {
        $url = 'https://example.com/test-page';
        $result = $this->variable->link($url, 'unsupported-service');
        
        $this->assertNull($result);
    }

    public function testEmptyUrl(): void
    {
        $result = $this->variable->link('', 'facebook');
        $this->assertNull($result);
        
        $result = $this->variable->link('   ', 'facebook');
        $this->assertNull($result);
    }

    public function testUrlEncoding(): void
    {
        $url = 'https://example.com/test page with spaces & symbols';
        $result = $this->variable->link($url, 'facebook');
        
        $this->assertStringContainsString(urlencode($url), $result);
        $this->assertStringNotContainsString(' ', $result);
        $this->assertStringNotContainsString('&', $result);
    }
}