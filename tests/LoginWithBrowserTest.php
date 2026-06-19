<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/AbstractCidaasTestParent.php';

use Cidaas\OAuth2\Client\Provider\AbstractCidaasTestParent;
use Cidaas\OAuth2\Client\Provider\Cidaas;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use function PHPUnit\Framework\assertStringContainsString;

final class LoginWithBrowserTest extends AbstractCidaasTestParent {
    private static $LOGIN_URL = 'http://localhost:1111';

    protected function setUp(): void {
        $this->setUpCidaas(false, false);
    }

    public function test_loginWithBrowser_withRequestId_redirectsToLoginPage() {
        $this->mock->append(new Response(302, ['location' => self::$LOGIN_URL]));

        $this->provider->loginWithBrowser();

        $location = parent::$headers[0];
        assertStringContainsString('Location: https://nightlybuild.cidaas.de/authz-srv/authz?', $location);
        assertStringContainsString(
            http_build_query([
                'client_id' => $_ENV['CIDAAS_CLIENT_ID'],
                'response_type' => 'code',
                'scope' => 'openid profile offline_access',
                'redirect_uri' => $_ENV['CIDAAS_REDIRECT_URI'],
            ]),
            $location
        );
        assertStringContainsString('view_type=login', $location);
        assertStringContainsString('nonce=', $location);
    }

    public function test_loginWithBrowser_encodesRedirectUriAndQueryParameters(): void
    {
        $redirectUri = 'http://localhost:8000/callback?foo=bar&x=y';
        $mock = new MockHandler([
            new Response(200, [], '{"issuer":"https://nightlybuild.cidaas.de","authorization_endpoint":"https://nightlybuild.cidaas.de/authz-srv/authz"}'),
        ]);
        $provider = new Cidaas(
            $_ENV['CIDAAS_BASE_URL'],
            $_ENV['CIDAAS_CLIENT_ID'],
            $_ENV['CIDAAS_CLIENT_SECRET'],
            $redirectUri,
            HandlerStack::create($mock),
            false
        );

        $provider->loginWithBrowser('openid', ['locale' => 'de-DE', 'x' => 'a b']);

        $location = parent::$headers[0];
        assertStringContainsString('Location: https://nightlybuild.cidaas.de/authz-srv/authz?', $location);
        assertStringContainsString('redirect_uri=' . urlencode($redirectUri), $location);
        assertStringContainsString(http_build_query(['locale' => 'de-DE', 'x' => 'a b']), $location);
        assertStringContainsString('view_type=login', $location);
        assertStringContainsString('nonce=', $location);
    }

    public function test_registerWithBrowser_encodesRedirectUriAndQueryParameters(): void
    {
        $redirectUri = 'http://localhost:8000/callback?foo=bar&x=y';
        $mock = new MockHandler([
            new Response(200, [], '{"issuer":"https://nightlybuild.cidaas.de","authorization_endpoint":"https://nightlybuild.cidaas.de/authz-srv/authz"}'),
        ]);
        $provider = new Cidaas(
            $_ENV['CIDAAS_BASE_URL'],
            $_ENV['CIDAAS_CLIENT_ID'],
            $_ENV['CIDAAS_CLIENT_SECRET'],
            $redirectUri,
            HandlerStack::create($mock),
            false
        );

        $provider->registerWithBrowser('openid', ['locale' => 'en-US']);

        $location = parent::$headers[0];
        assertStringContainsString('Location: https://nightlybuild.cidaas.de/authz-srv/authz?', $location);
        assertStringContainsString('redirect_uri=' . urlencode($redirectUri), $location);
        assertStringContainsString(http_build_query(['locale' => 'en-US']), $location);
        assertStringContainsString('view_type=register', $location);
        assertStringContainsString('nonce=', $location);
    }
}
