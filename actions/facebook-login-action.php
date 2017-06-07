
<?php 

session_start();
require '../config.php';

// ---------------- Facebook API load ----------------
$fb = new Facebook\Facebook([
    'app_id' => '1642348145983562',
    'app_secret' => 'b57f78f290716cf68e6a25afb11f661e',
    'default_graph_version' => 'v2.4',
        ]);
$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error (1): ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error (1): ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    //If logged in
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    try {
        //gets the logged user
        $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $_SESSION['facebook_access_token']);
        $userNode = $response->getGraphUser();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error (2): ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error (2): ' . $e->getMessage();
        exit;
    }
    //checks if the user already exists
    $userCtr = new UserCtr();
    $activeUser = $userCtr->findByEmail($userNode['email']);
    
    if ($activeUser != null) {
        //if the user already exists
        $_SESSION['id'] = $activeUser->getId();
        $_SESSION['name'] = $activeUser->getName();
        $_SESSION['surname'] = $activeUser->getSurname();
        $_SESSION['password'] = $activeUser->getPassword();
        $_SESSION['email'] = $activeUser->getEmail();
        $_SESSION['pic_profile'] = $activeUser->getProfilePic();
        $_SESSION['pic_cover'] = $activeUser->getCoverPic();
        $_SESSION['private'] = $activeUser->getPrivate();
        //Set cookie to last 1 year
        setcookie('id', $_SESSION['id'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('name', $_SESSION['name'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('surname', $_SESSION['surname'], time() + 60 * 60 * 24 * 365, '/');        
        setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('email', $_SESSION['email'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('pic_profile', $_SESSION['pic_profile'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('pic_cover', $_SESSION['pic_cover'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('private', $_SESSION['private'], time() + 60 * 60 * 24 * 365, '/');
        header('Location: http://www.samaritan.com.br/home');
    } else {
        //if it's a new user
        $fbId = $userNode->getId();
        $name = $userNode->getFirstName();
        $surname = $userNode->getLastName();
        $password = '';
        $email = $userNode['email'];
        
        //persist user                
        $userCtr->save($name, $surname, $password, $email);
        //gets the user from the DB and sets the session
        $activeUser = $userCtr->findByEmail($email);
        $_SESSION['id'] = $activeUser->getId();
        $_SESSION['name'] = $activeUser->getName();
        $_SESSION['surname'] = $activeUser->getSurname();
        $_SESSION['password'] = $activeUser->getPassword();
        $_SESSION['email'] = $activeUser->getEmail();
        $_SESSION['pic_cover'] = $activeUser->getCoverPic();
        $_SESSION['private'] = $activeUser->getPrivate();
        
        //sets the profile pic                        
        $url = 'https://graph.facebook.com/' . $fbId . '/picture?width=500&height=500';
        $img = '../images/pics_profile/' . $activeUser->getId() . '.jpg';
        file_put_contents($img, file_get_contents($url));
        $pic_profile = $activeUser->getId() . '.jpg';
        $userCtr->updateProfilePic($activeUser->getId(), $pic_profile);
        $_SESSION['pic_profile'] = $pic_profile;
        
        //Set cookie to last 1 year
        setcookie('id', $_SESSION['id'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('name', $_SESSION['name'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('surname', $_SESSION['surname'], time() + 60 * 60 * 24 * 365, '/');        
        setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('email', $_SESSION['email'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('pic_profile', $_SESSION['pic_profile'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('pic_cover', $_SESSION['pic_cover'], time() + 60 * 60 * 24 * 365, '/');
        setcookie('private', $_SESSION['private'], time() + 60 * 60 * 24 * 365, '/');
        
        header('Location: http://www.samaritan.com.br/home');
    }
}