<?php

namespace Jtarleton\MatrixUtility;
class JtSingleton {
        public $count = 0;
        public $counts = [], $counts_rows = [];
        private static $_instance = NULL;
        private function __construct() {
        }
        /**
         * @return object [JtSingleton]
         */
        public function getInstance() {
                if(!isset(self::$_instance)) {
                        self::$_instance = new self;
                }
                return self::$_instance;
        }

}

