<?php
include dirname(__FILE__).'/sessionlib/autoload.php';
include dirname(__FILE__).'/config.php';

class AppManager {
    //Session
    private static $session;
    private static $sessionFactory;
    private static $sessionInstance;
    
    //Db
    private static $dbManager;
    
    //Qr data
    public static $qrImages;
    public static $nakedResult;
    
    public static function init(){
        self::initSession();
        self::initDB();
    }
    
    public static function initSession(){
        //Check that if the user is aready login or not
        self::$sessionFactory = new \Aura\Session\SessionFactory;
        self::$sessionInstance = self::$sessionFactory->newInstance($_COOKIE);
        self::$sessionInstance->setCookieParams(array('lifetime' => constant("COOKIE_LIFETIME")));
        self::$session = self::$sessionInstance->getSegment('User');
    }
    
    public static function initDB(){
        $dir = constant("DISPARITYCORP_DB");
        self::$dbManager  = new PDO($dir) or die("cannot open the database");
        self::$dbManager->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    
    public static function isLoggedIn(){
        return (self::$session->get('username') !== null && self::$session->get('islogin') === true);
    }
    
    public static function tryToLogin(){
        if (isset($_POST['username']) && isset($_POST['password'])) {
            //get rid of prepare, use regular sql query
            //$query = self::$dbManager->prepare("SELECT users.*, access.accessright FROM users INNER JOIN access ON users.id = access.userid WHERE users.password = '" . md5($_POST['password'])."' AND ". "users.username = '" . $_POST['username'] . "' ");
            $query = self::$dbManager->prepare("SELECT users.*, access.accessright FROM users INNER JOIN access ON users.id = access.userid WHERE users.username = '".$_POST['username']."' AND users.password = '".md5($_POST['password'])."'");
			$query->execute();
            $rows = $query->fetchAll();
            if (count($rows) == 0) {
                return FALSE;
            } else {
                //Save to session
                self::$session->set('username', $rows[0]['username']);
                self::$session->set('uid', $rows[0]['id']);
                self::$session->set('islogin', true);
                self::$session->set('accessright', $rows[0]['accessright']);
                self::$session->set('access_qr', false);
                self::$sessionInstance->commit();
                
                //Save to db
                $dataLogin = array(
                    'name' => $rows[0]['username'],
                    'time' => time(),
                    'cookie' => json_encode($_COOKIE),
                );

                //Insert to database
                $statement = self::$dbManager->prepare("INSERT INTO logins (name, time, cookie)
                    VALUES(:name, :time, :cookie)");
                $statement->execute($dataLogin);
                
                return true;
            }
        } else {
            return FALSE;
        }
    }
    
    public static function createLoginMessage(){
        if (isset($_POST['qrcode_result'])) {
            self::$session->set('loginmessage', 'Sorry! Your solution to the QR Codes was incorrect');
            self::$sessionInstance->commit();
        }
    }
    
    public static function getLoginMessage(){
        $message = self::$session->get('loginmessage');
        self::$session->set('loginmessage', null);
        self::$sessionInstance->commit();
        return $message;
    }

    public static function doAccessQrPage(){
        self::$session->set('access_qr', true);
    }
    
    public static function didAccessQrPage(){
        return self::$session->get('access_qr');
    }
    
    public static function isSolvedQr(){
        
        return (is_array(self::$session->get('solveprcode')) && in_array(self::$session->get('username'), self::$session->get('solveprcode')));
    }
    
    public static function tryToSolveQr(){
        if (isset($_POST['qrcode_result']) && md5(str_replace(' ', '', $_POST['qrcode_result'])) == self::$session->get('qrcode_result')) {
            $arr = self::$session->get('solveprcode');
            if (!is_array($arr)) {
                $arr = array();
            }
            $arr[] = self::$session->get('username');
            self::$session->set('solveprcode', $arr);
            return true;
        } else {
            $qrcodeResult = array();
            self::$qrImages = array();
            $GAME_IMAGES = array();
            
            while (count($GAME_IMAGES) < 16) {
                $a = mt_rand(1,100);
                $b = mt_rand(1,100);
                $c = mt_rand(1,100);
                $x = mt_rand(1,100);
                $y = mt_rand(1,100);
                
                $eq = $a.'*'.$x.'+'.$b.'*'.$y.'+'.$c;
                $index = intval(eval('return '.$eq.';'));
                
                if (!isset($GAME_IMAGES[$index])) {
                    //$GAME_IMAGES[$index] = QRcode::png($eq);
					$GAME_IMAGES[$index] = "https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$eq."&choe=UTF-8";
                }
            }
            
            //ksort($GAME_IMAGES);
            $qrcodeResult = array_keys($GAME_IMAGES);
            $GAME_IMAGES = array_values($GAME_IMAGES);
            
            for ($i = 0; $i < count($GAME_IMAGES); $i++) {
                if ($i%4 == 0) {
                    self::$qrImages[] = array();
                }
                self::$qrImages[count(self::$qrImages)-1][] = $GAME_IMAGES[$i];
            }
            
			sort($qrcodeResult);
			
            self::$session->set('qrcode_result', md5(implode(',', $qrcodeResult)));
            self::$sessionInstance->commit();
            
            //This is for debug
            if (APP_CONFIG_DEBUG) {
                self::$nakedResult = implode(',', $qrcodeResult);
            }
            
            return false;
        }
    }
    
    public static function tryToRegister(){
        if (isset($_POST['save_data']) && $_POST['save_data'] == "yes") {
            if (!self::isLoggedIn() || !self::isSolvedQr() || self::$session->get('accessright') != 'administration' || self::$session->get('register') == TRUE) {
                echo json_encode(false);
                exit;
            }
            //Catch the data
            $dataRes = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'age' => intval($_POST['age']),
                'sex' => $_POST['sex'],
                'city' => $_POST['city'],
                'email' => $_POST['email'],
                'user_id' => self::$session->get('uid')
            );
            
            //Insert to database
            $statement = self::$dbManager->prepare("INSERT INTO registrations (first_name, last_name, age, sex, city, email, user_id)
                VALUES(:first_name, :last_name, :age, :sex, :city, :email, :user_id)");
            $statement->execute($dataRes);
            
            //Save to the session
            self::$session->set('register', true);
            self::$sessionInstance->commit();
            
            //Return data
            echo json_encode(true);
            exit;
        }
    }
    
    public static function isShowRegisterForm(){
        return (self::$session->get('accessright') === 'administration' && self::$session->get('register') !== true);
    }
    
    public static function forceLogout(){
        self::$session->set('username', null);
        self::$session->set('islogin', null);
        self::$session->set('uid', null);
        self::$session->set('access_qr', null);
        self::$session->set('accessright', null);
        self::$sessionInstance->commit();
    }
    
    public static function getValue($key) {
        return self::$session->get('username');
    }

    public static function getValue2($key) {
        // Saquip fix this please
        return self::$session->get($key);
    }
    
    public static function setValue($key, $value) {
        self::$session->set($key, $value);
    }
    
    public static function showPage($fileName) {
        if (!AppManager::isLoggedIn()) {
            header("Location: disparityloginpage.php");
            exit;
        }
        if (!AppManager::isSolvedQr()) {
            header("Location: qrcodeauth.php");
            exit;
        }
        $arr = explode("/", $fileName);
        $arr = explode('.', $arr[count($arr) - 1]);
        $headerPage = $arr[0];
        include_once dirname(__FILE__) . '/layouts/header.php';
        include_once dirname(__FILE__) . '/layouts/navigation.php';
        echo '<div class="col-md-10">';
        if (!in_array($headerPage, array('UnderMaintenance', 'reg')))
        echo '<h3 style="font-size: 30px; margin-bottom: 20px;">'.  htmlentities($headerPage).'</h3>';
        include_once dirname(__FILE__) . '/'.$fileName;
        echo '</div>';
        include_once dirname(__FILE__) . '/layouts/footer.php';
    }
    
    public static function generateTokenResult(){
        self::setValue('token1', 1111);
        self::setValue('token2', 2222);
        self::setValue('token3', 3333);
        self::setValue('token4', 4444);
    }
}

AppManager::init();
