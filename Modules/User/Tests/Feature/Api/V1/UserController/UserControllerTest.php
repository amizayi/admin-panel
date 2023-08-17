<?php

namespace Modules\User\Tests\Feature\Api\V1\UserController;

use Modules\Kernel\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Entities\V1\User\UserFields;

class UserControllerTest extends BaseTestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        user()->factory()->count(5)->create();

        $response = $this->getJson(route('api.v1.user.index'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'message',
            'result' => [
                'data' => [
                    '*' => [
                        UserFields::ID,
                        UserFields::USERNAME,
                        UserFields::FULL_NAME,
                        UserFields::EMAIL,
                        UserFields::MOBILE,
                        UserFields::CREATED_AT,
                    ],
                ],
                'pagination' => [],
            ]
        ]);
    }
}
