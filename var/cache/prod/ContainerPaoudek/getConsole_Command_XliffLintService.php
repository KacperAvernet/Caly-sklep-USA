<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.xliff_lint' shared service.

$this->services['console.command.xliff_lint'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\XliffLintCommand();

$instance->setName('lint:xliff');

return $instance;
