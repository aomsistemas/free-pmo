<?php

namespace Tests\Unit\Policies;

use App\Entities\Partners\Vendor;
use Tests\TestCase as TestCase;

/**
 * Vendor Policy Test.
 *
 * @author Nafies Luthfi <nafiesl@gmail.com>
 */
class VendorPolicyTest extends TestCase
{
    /** @test */
    public function only_admin_can_create_vendor()
    {
        $admin = $this->createUser('admin');
        $this->assertTrue($admin->can('create', new Vendor()));

        $worker = $this->createUser('worker');
        $this->assertFalse($worker->can('create', new Vendor()));
    }

    /** @test */
    public function only_admin_can_view_vendor()
    {
        $admin = $this->createUser('admin');
        $worker = $this->createUser('worker');
        $vendor = factory(Vendor::class)->create();

        $this->assertTrue($admin->can('view', $vendor));
        $this->assertFalse($worker->can('view', $vendor));
    }

    /** @test */
    public function only_admin_can_update_vendor()
    {
        $admin = $this->createUser('admin');
        $worker = $this->createUser('worker');
        $vendor = factory(Vendor::class)->create();

        $this->assertTrue($admin->can('update', $vendor));
        $this->assertFalse($worker->can('update', $vendor));
    }

    /** @test */
    public function only_admin_can_delete_vendor()
    {
        $admin = $this->createUser('admin');
        $worker = $this->createUser('worker');
        $vendor = factory(Vendor::class)->create();

        $this->assertTrue($admin->can('delete', $vendor));
        $this->assertFalse($worker->can('delete', $vendor));
    }
}
