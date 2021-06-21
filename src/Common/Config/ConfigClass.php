<?php

declare(strict_types=1);

namespace App\Common\Config;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConfigClass extends AbstractController
{
    public function __construct()
    {
        require_once '../../../.idea/MainConfig.php';
        if (!isset($isApiEnabled))
        {
            throw new \Exception('api is not enabled');
        }
    }
}