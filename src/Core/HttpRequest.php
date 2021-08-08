<?php
namespace Mwg\Core;
/**
 * Ajax Request Helper Class
 * @since 24/02/2020
 * @author Matheus do Livramento
 */
class HttpRequest {
        
    private bool $state;
    private string $message;
    private string $content;
    
    public function __construct(bool $state = true, string $message = '', string $content = ''){
        $this->setState($state);
        $this->setMessage($message);
        $this->setContent($content);
    }
    
    public function setState(bool $state = true) {
        $this->state = $state;
    }

    public function setMessage(string $message) {
        $this->message = utf8_encode($message);
    }

    public function setContent(string $content) {
        $this->content = utf8_encode($content);
    }

    public function getHttpRequest() {
        echo json_encode(get_object_vars($this));
    }
    
    public static function issetAjaxPost() : bool {
        return filter_input(INPUT_POST, 'ajax', FILTER_SANITIZE_STRING) !== null;
    }
    
    public static function issetAjaxGet() : bool {
        return filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_STRING) !== null;
    }
    
    public static function isAjaxPost() : bool {
        return (boolean) filter_input(INPUT_POST, 'ajax', FILTER_SANITIZE_STRING);
    }
    
    public static function isAjaxGet() : bool {
        return (boolean) filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_STRING);
    }
    
    public static function isAjax() : bool {
        return HttpRequest::isAjaxGet() || HttpRequest::isAjaxPost();
    }
    
    public static function getRequestType() : int {
        return (self::isAjaxPost() ? INPUT_POST : INPUT_GET);
    }
}
