<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.cache_warmup' shared service.

$this->services['console.command.cache_warmup'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CacheWarmupCommand(${($_ = isset($this->services['cache_warmer']) ? $this->services['cache_warmer'] : $this->load('getCacheWarmerService.php')) && false ?: '_'});

$instance->setName('cache:warmup');

return $instance;
