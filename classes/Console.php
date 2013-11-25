<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mindfullsilence
 * Date: 11/23/13
 * Time: 7:18 PM
 * To change this template use File | Settings | File Templates.
 */

class Console {
    public $message;
    public $log;

    function __construct($file, $msg) {
        if(!is_file($file)) {
            $handle = fopen($file, 'w') or die('Cant create log file. Check your permissions.');
            fclose($handle);
        }
        $this->log = $file;
        $this->message = $msg;
    }

    public function clear() {
        file_put_contents($this->log, '');
    }

    public function printMessage($msg) {
        $cur = file_get_contents($this->log);
        $cur .= $msg . '/n';
        file_put_contents($this->log, $cur);
    }

    public function log($msg) {
        $this->printMessage($msg);

    }

}