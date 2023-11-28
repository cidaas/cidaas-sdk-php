<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/AbstractCidaasTestParent.php';

use Cidaas\OAuth2\Client\Provider\AbstractCidaasTestParent;
use GuzzleHttp\Psr7\Response;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

final class GetMFAListTest extends AbstractCidaasTestParent {
    private static $loginUnsuccessfulWithUnkownUserResponse = '{"success":false,"status":417,"error":{"error":"invalid_username_password","username":"user@widas.de","username_type":"email","error_description":"Given username or password is invalid","view_type":"login","requestId":"bb3b6908-64e4-4ccf-891e-908fc9dd1236","suggested_url":"https://nightlybuild.cidaas.de/user-ui/login?groupname=default&lang=&view_type=login&error=invalid_username_password&username=user%40widas.de&username_type=email&error_description=Given%20username%20or%20password%20is%20invalid&requestId=bb3b6908-64e4-4ccf-891e-908fc9dd1236"}}';

    private static function loginUnsuccessfulWithKnownUserResponse() {
        return '{"success":false,"status":417,"error":{"error":"invalid_username_password","username":"user@widas.de","username_type":"email","view_type":"login","sub":"' . self::$SUB . '","q":"dddb62b2-7e2a-4143-a492-d5818802cdac","requestId":"cfc1d841-4dab-4ffa-ab6f-fc2662a9b206","suggested_url":"https://nightlybuild.cidaas.de/user-ui/login?groupname=default&lang=&view_type=login&error=invalid_username_password&username=user%40widas.de&username_type=email&sub=dddb62b2-7e2a-4143-a492-d5818802cdac&q=dddb62b2-7e2a-4143-a492-d5818802cdac&requestId=cfc1d841-4dab-4ffa-ab6f-fc2662a9b206"}}';
    }

    private $responsePromise;

    protected function setUp(): void {
        $this->setUpCidaas();
        $this->responsePromise = $this->provider->getRequestId();
    }

    public function testGetMfaListForSuccessful() {
        $this->mock->append(new Response(200, [], self::getMfaListSuccessfulResponse()));

        $promise = $this->responsePromise->then(function ($requestId) {
            return $this->provider->loginWithCredentials($requestId, $_ENV['USERNAME']);
        });

        $response = $promise->wait();
        assertTrue($response['success']);
        assertEquals(200, $response['status']);
        assertEquals(self::$CODE, $response['data']['code']);
    }
  }

    