<?php

/** Клас представлення */
class View{

	/** @var object Дані, передані від контролера */
	protected $data;
	/** @var string Шлях до файлу представлення */
	protected $path;

	public function __construct($data = array(), $path = null){
		if(!$path){
			$path = self::getDefaultViewPath();
		}
		if(!file_exists($path)){
			throw new Exception("Темплейт не існує за шляхом " . $path);
		}
		$this->path = $path;
		$this->data = $data;
	}

	/**
	 * Рендеринг шаблону, повернення html-коду
	 * @return string
	 */
	public function render(){
		$data = $this->data;

		ob_start();
		include($this->path);
		$content = ob_get_clean();

		return $content;
	}

	/**
	 * Повернення шляху до шаблону
	 * @return string
	 */
	protected static function getDefaultViewPath(){
		$router = App::getRouter();
		if(!$router){
			return false;
		}
		$controller_dir = $router->getController();
		$template_name = $router->getMethodPrefix().$router->getAction().'.html';

		return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
	}
}

?>
