<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXUO09Pz\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXUO09Pz/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXUO09Pz.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXUO09Pz\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerXUO09Pz\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'XUO09Pz',
    'container.build_id' => 'aa6402b3',
    'container.build_time' => 1587460720,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXUO09Pz');