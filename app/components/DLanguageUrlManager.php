<?php

class DLanguageUrlManager extends CUrlManager
{

    public $secureRoutes = array();
 
    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        $url = parent::createUrl($route, $params, $ampersand);
 
        return DMultilangHelper::addLangToUrl($url);
    }
 
    public function parseUrl($request)
    {
        $route = parent::parseUrl($request);
 
        // Perform a 301 redirection if the current protocol 
        // does not match the expected protocol
        $secureRoute = $this->isSecureRoute($route);
        $sslRequest = $request->isSecureConnection;
        if ($secureRoute !== $sslRequest) {
            $hostInfo = $secureRoute ? $this->secureHostInfo : $this->hostInfo;
            if ((strpos($hostInfo, 'https') === 0) xor $sslRequest) {
                $request->redirect($hostInfo . $request->url, true, 301);
            }
        }
        return $route;
    }
 
    private $_secureMap;
 
    /**
     * @param string the URL route to be checked
     * @return boolean if the give route should be serviced in SSL mode
     */
    protected function isSecureRoute($route)
    {
        if ($this->_secureMap === null) {
            foreach ($this->secureRoutes as $r) {
                $this->_secureMap[strtolower($r)] = true;
            }
        }
        $route = strtolower($route);
        if (isset($this->_secureMap[$route])) {
            return true;
        } else {
            return ($pos = strpos($route, '/')) !== false 
                && isset($this->_secureMap[substr($route, 0, $pos)]);
        }
    }
}