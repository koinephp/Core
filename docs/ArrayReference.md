# ArrayReference

This is a simple way of treating arrays as if they were objects, meaning when
you manipulate the object you also manipulate the array that you used in the
constructor

```php
use Koine\ArrayReference;

session_start();

$session = new ArrayReference($_SESSION);

$login = function ($session) {
    $user = findByEmailAndPasswrod($_POST['email'], $_POST['password']);

    if ($user) {
        $session['user_id'] = $user->getId();
    }
};


$login($session);

echo $_SESSION['user_id']; // 1

```
