<?php

namespace Magento\TestFramework\HTTP;

use Laminas\Http\Request;
use Magento\Framework\HTTP\LaminasClient;

class LaminasClientMock extends LaminasClient
{
    private bool $mock = false;

    public function send(?Request $request = null)
    {
        if ($this->mock) {
            // @phpstan-ignore return.empty
            return;
        }
        return parent::send($request);
    }

    public function setMock(bool $mock): self
    {
        $this->mock = $mock;
        return $this;
    }
}
