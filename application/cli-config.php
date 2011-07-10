<?php
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSqlLogger;
 
define('BASEPATH', __DIR__ . '/../system/');
 
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/libraries/Doctrine/Common/ClassLoader.php';
 
$doctrineClassLoader = new ClassLoader('Doctrine',  __DIR__.'libraries');
$doctrineClassLoader->register();
$entitiesClassLoader = new ClassLoader('models', __DIR__);
$entitiesClassLoader->register();
$proxiesClassLoader = new ClassLoader('Proxies', __DIR__.'models/proxies');
$proxiesClassLoader->register();
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
 
$cache = new ArrayCache;
// Set up driver
$Doctrine_AnnotationReader = new \Doctrine\Common\Annotations\AnnotationReader($cache);
$Doctrine_AnnotationReader->setDefaultAnnotationNamespace('Doctrine\ORM\Mapping\\');
$driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($Doctrine_AnnotationReader, realpath('../models'));
$config->setMetadataDriverImpl($driver);
 
// Database connection information
$connectionOptions = array(
    'driver' => 'pdo_mysql',
    'user' =>     $db['default']['username'],
    'password' => $db['default']['password'],
    'host' =>     $db['default']['hostname'],
    'dbname' =>   $db['default']['database']
);
 
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
 
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));