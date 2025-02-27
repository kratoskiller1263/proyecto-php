<?php

namespace ContainerH0naMli;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_CacheClearService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.cache_clear' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 5).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 5).'/vendor/symfony/framework-bundle/Command/CacheClearCommand.php';
        include_once \dirname(__DIR__, 5).'/vendor/symfony/http-kernel/CacheClearer/CacheClearerInterface.php';
        include_once \dirname(__DIR__, 5).'/vendor/symfony/http-kernel/CacheClearer/ChainCacheClearer.php';
        include_once \dirname(__DIR__, 5).'/vendor/symfony/filesystem/Filesystem.php';

        $container->privates['console.command.cache_clear'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand(new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(new RewindableGenerator(fn () => new \EmptyIterator(), 0)), ($container->privates['filesystem'] ??= new \Symfony\Component\Filesystem\Filesystem()));

        $instance->setName('cache:clear');
        $instance->setDescription('Clear the cache');

        return $instance;
    }
}
