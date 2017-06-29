<?php
if (!file_exists($file = __DIR__.'/../vendor/autoload.php')) {
      throw new RuntimeException('Install dependencies to run test suite.');
}
$loader = require $file;
$loader->add('Schoox\Tests', __DIR__ . '/../tests');
\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    dirname(__DIR__) . '/vendor/jms/serializer/src'
);
