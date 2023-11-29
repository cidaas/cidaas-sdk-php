<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/AbstractCidaasTestParent.php';

use Cidaas\OAuth2\Client\Provider\AbstractCidaasTestParent;
use GuzzleHttp\Psr7\Response;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;
use function PHPUnit\Framework\assertFalse;

final class GetMFAListTest extends AbstractCidaasTestParent {
    private $responsePromise;

    private static $mfaListSuccessfulResponse = '{
        "success": true,
        "status": 200,
        "data": {
            "configured_list": [
                {
                    "type": "BACKUPCODE"
                },
                {
                    "type": "EMAIL",
                    "mediums": [
                        {
                            "id": "99a5effd-584a-41ac-a0f8-849f9fc734b8",
                            "key_name": "t*****t@w***s.in"
                        }
                    ]
                },
                {
                    "type": "PASSWORD"
                },
                {
                    "type": "SMS",
                    "mediums": [
                        {
                            "id": "99a5effd-584a-41ac-a0f8-849f9fc734b8",
                            "key_name": "+91******237"
                        }
                    ]
                }
            ]
        }
    }';

    public static $invalidRequestIdResponsePayload = '{
        "success": false,
        "status": 400,
        "error": {
            "code": 10001,
            "type": "WebhooksException",
            "status": 400,
            "referenceNumber": "5fe6355da4312d8b:23f16ded3d7de8f8:5fe6355da4312d8b:0",
            "error": "Invalid request id"
        }
    }';

    public static $emailMobileUsernameEmptyResponsePayload = '{
        "success": false,
        "status": 400,
        "error": {
            "code": 501,
            "type": "WebhooksException",
            "status": 400,
            "referenceNumber": "6594f0261c8cd531:7b9a83ed90e3c757:6594f0261c8cd531:0",
            "error": "given mobile_number or email or username is not matching with flow"
        }
    }';

    protected function setUp(): void {
        $this->setUpCidaas();
        $this->responsePromise = $this->provider->getRequestId();
    }

    public function testGetMfaListForSuccessful() {
        $this->mock->append(new Response(200, [], self::$mfaListSuccessfulResponse));
        $promise = $this->responsePromise->then(function ($requestId) {
            return $this->provider->getMfaList($requestId, 'user@widas.de');
        });
        $response = $promise->wait();
        assertTrue($response['success']);
        assertEquals(200, $response['status']);
    }

    public function testGetMfaListForInvalidRequestId() {
        $this->mock->append(new Response(200, [], self::$invalidRequestIdResponsePayload));
        $promise = $this->provider->getMfaList('12345', 'user@widas.de');
        $response = $promise->wait();
        assertFalse($response['success']);
        assertEquals(400, $response['status']);
    }

    public function testGetMfaListForEmptyMobileOrEmailOrUsername() {
        $this->mock->append(new Response(200, [], self::$emailMobileUsernameEmptyResponsePayload));
        $promise = $this->responsePromise->then(function ($requestId) {
            return $this->provider->getMfaList("",$requestId);
        });
        $response = $promise->wait();
        assertFalse($response['success']);
        assertEquals(400, $response['status']);
    }
  }

    