<?php

namespace Spatie\Honeypot\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Illuminate\Support\Facades\View;
use Livewire\LivewireServiceProvider;
use Spatie\Honeypot\HoneypotServiceProvider;
use Spatie\Honeypot\Tests\TestClasses\FakeEncrypter;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use InteractsWithContainer;

    protected $testNow = true;

    public function setUp(): void
    {
        parent::setUp();

        View::addLocation(__DIR__.'/views');

        $this->swap('encrypter', new FakeEncrypter());
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            HoneypotServiceProvider::class,
        ];
    }
}
