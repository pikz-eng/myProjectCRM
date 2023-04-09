<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 */
class CustomersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor ',
                'zipcode' => 'Lorem ip',
                'birthdate' => '2023-04-09',
                'age' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-04-09 21:23:48',
                'modified' => '2023-04-09 21:23:48',
            ],
        ];
        parent::init();
    }
}
