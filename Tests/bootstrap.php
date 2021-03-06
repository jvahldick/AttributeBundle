<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$rootDir = __DIR__ . '/../Annotation';
$vendorDir = __DIR__ . '/../vendor';

if (!is_file($autoloadFile = $vendorDir . '/autoload.php')) {
    throw new \LogicException('Could not find autoload.php in vendor/. Did you run "composer install --dev"?');
}

require $autoloadFile;

AnnotationRegistry::registerAutoloadNamespaces(
    array(
        'Doctrine\ORM\Mapping' => $vendorDir . '/doctrine/orm/lib/',
        'Symfony\Component\Validator\Constraints' => $vendorDir . '/symfony/symfony/src',
        'JMS\DiExtraBundle\Annotation' => $vendorDir . '/jms/di-extra-bundle',
    )
);
AnnotationRegistry::registerFile($rootDir . '/Entity.php');
