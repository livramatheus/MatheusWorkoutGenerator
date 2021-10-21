<?php

namespace Mwg\Core;

/**
 * Template class
 * @since 20/10/2021
 * @author Matheus do Livramento
 */
class Template {

    public static function getTemplate() {
        return file_get_contents('./src/template/tpl.txt');
    }

}
