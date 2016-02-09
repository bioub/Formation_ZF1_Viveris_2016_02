<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initZFDebug()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZFDebug');
        
        $resource = $this->getPluginResource('db');
        $db = $resource->getDbAdapter();

        $options = array(
            'plugins' => array('Variables',
                'Database' => array('adapter' => $db),
                //'File' => array('basePath' => '/path/to/project'),
                //'Cache' => array('backend' => $cache->getBackend()),
                'Exception')
        );
        $debug = new ZFDebug_Controller_Plugin_Debug($options);

        $this->bootstrap('frontController');
        $frontController = $this->getResource('frontController');
        $frontController->registerPlugin($debug);
    }

    protected function _initTranslator()
    {
        $translator = new Zend_Translate(
            array(
                'adapter' => 'array',
                'content' => APPLICATION_PATH . '/../resources/languages',
                'locale'  => 'fr',
                'scan' => Zend_Translate::LOCALE_DIRECTORY
            )
        );
        Zend_Validate_Abstract::setDefaultTranslator($translator);
    }
}
