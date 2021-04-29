<?php

    function setReporting() {
        if(DEVELOPMENT_ENVIROMENT == true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'logs'.DS.'error.log');
            
        }
    }

    function stripSlashesDeep($value) {
        $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
        return $value;
    }

    function removeMagicQuoctes() {
        if(get_magic_quotes_gpc()) {
            $_GET = stripSlashesDeep($_GET);
            $_POST = stripSlashesDeep($_POST);
            $_COOKIE = stripSlashesDeep($_COOKIE);
        }
    }

    function unregisterGlobals() {
        if(ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset ($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    function callHook() {
        global $url;

        $urlArray = array();
        $urlArray = explode("/", $url);

        $controller = $urlArray[0];
        array_shift($urlArray);
        $action = $urlArray[0];
        array_shift($urlArray);
        $queryString = $urlArray;

        $controllerName = $controller;
        $controller = ucworks($controller);
        $model = rtrim($controller, 's');
        $controller .= 'Controller';
        $dispatch = new $controller($model, $controllerName, $action);

        if ((int)method_exists($controller, $action)) {
            call_user_func_array(array($dispatch, $action), $queryString);
        } else {
            /* Error Generation Code Here */
        }
    }

    function __autoload($className) {
        if (file_exits(ROOT.DS.'library'.DS.strtolower($className).'.class.php')) {
            require_once(ROOT.DS.'library'.DS.strtolower($className).'.class.php');
        } else if (file_exists(ROOT.DS.'application'.DS.'controllers'.DS.strtolower($className).'.php')) {
            require_once(ROOT.DS.'application'.DS.'application'.DS.'controler'.DS.strtolower($className).'.php');
        } else if (file_exists(ROOT.DS.'application'.DS.'models'.DS.strtolower($className).'.php')) {
            require_once(ROOT.DS.'application'.DS.'models'.DS.'models'.DS.strtolower($className).'.php');
        } else {
            /* Error Generation Code Here */
        }
    }
    setReporting();
    removeMagicQuoctes();
    unregisterGlobals();
    callHook();

?>