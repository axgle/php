<?php
// 2014.11.19 init
define('MINUTE_IN_SECONDS', 60);
define('HOUR_IN_SECONDS', 60 * MINUTE_IN_SECONDS);
define('DAY_IN_SECONDS', 24 * HOUR_IN_SECONDS);
define('WEEK_IN_SECONDS', 7 * DAY_IN_SECONDS);
define('YEAR_IN_SECONDS', 365 * DAY_IN_SECONDS);

class Nonce {

    //based on http://codex.wordpress.org.cn/Function_Reference/wp_nonce_tick
    static function tick() {
        $nonce_life = DAY_IN_SECONDS;
        return ceil(time() / ( $nonce_life / 2 ));
    }
    
    static function create($action = -1) {

        $i = self::tick();

        return substr(self::hash($i . $action, 'nonce'), -12, 10);
    }

    static function salt($scheme = 'auth') {
        $key = "2012.10.23";
        $salt = hash_hmac('md5', $scheme, $key);
        return $salt;
    }

    static function hash($data, $scheme = 'auth') {
        $salt = self::salt($scheme);
        return hash_hmac('md5', $data, $salt);
    }

    static function verify($action = -1,$nonce=null) {
        if($nonce===null){
            if(isset($_REQUEST['nonce'])){
                $nonce=trim($_REQUEST['nonce']);
            }
        }
        $i = self::tick();
        // Nonce generated 0-12 hours ago
        if (substr(self::hash($i . $action , 'nonce'), -12, 10) === $nonce)
            return 1;
        // Nonce generated 12-24 hours ago
        if (substr(self::hash(($i - 1) . $action , 'nonce'), -12, 10) === $nonce)
            return 2;
        // Invalid nonce
        return false;
    }

}
