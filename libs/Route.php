<?php

class Route{

	public function getUrlParams($route, $method='GET'){

		$controllers = CONTROLLERS;

		foreach($controllers as $controller){

			if($method != $controller['method']){
				continue;
			}

			$params = $this->compareRouteStringWithController($route, $controller);

			if($params){
				$params['method'] = $method;
				return $params;
			}

		}

		return false;
	}


	public function getCurrentRoute(){

		$route = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'NULL';

		return $this->getUrlParams($route, $method);

	}

	private function compareRouteStringWithController($route, $controller){
		// get url controller
		$url = explode('/',$controller['url']);
		$url = array_filter($url,function($param){
			return $param != '';
		});
		$url = array_values($url);

		// get uri from route
		$uri = explode('?',$route)[0];
		$uri = explode('/',$uri);
		unset($uri[0]);unset($uri[1]);unset($uri[2]);
		$uri = array_filter($uri,function($param){
			return $param != '';
		});
		$uri = array_values($uri);


		// compare url and uri
		if(count($url) != count($uri)){
			return false;
		}

		$paramsURL = [];
		foreach($uri as $index => $uriParam){
			if($uriParam == $url[$index]){
				continue;
			}

			if(containAllString($url[$index], ["{","}"])){
				$key = str_replace("{", "",$url[$index]);
    			$key = str_replace("}", "",$key);
    			$paramsURL[$key] = $uri[$index];
    			continue;
			}

			return false;
		}

		
		$paramsGET = $this->getParametersMethodGET($route);
		
		$controller['parameters'] = array_merge($paramsURL,$paramsGET);

		return $controller;
	}

	private function getParametersMethodGET($route){

		$params = explode('?',$route);

		if(!isset($params[1])){
			return [];
		}


		$keyValues = explode('&',$params[1]);

		foreach($keyValues as $keyValue){
			$keyValue = explode('=',$keyValue);
			if(isset($keyValue[0], $keyValue[1])){
				$listParams[$keyValue[0]] = $keyValue[1];
			}
		}

		return $listParams;
	}
	public static function name($routeName, $params=[]){
        $controllers = CONTROLLERS;

        foreach($controllers as $controller){
            if($controller['name'] == $routeName){
                return asset($controller['url']);
            }
        }

        return asset('/');
    }

}