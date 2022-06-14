<?php
namespace App\Helpers;
use Kreait\Firebase\Factory;

class Helper
{

    public static function firebase($factory, $database){
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();
    }
  
}
?>