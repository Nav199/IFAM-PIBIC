<?php

namespace App\Controller;
use App\Models\FirebaseModel;
class marketing_controller
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        require_once __DIR__.'/../view/marketing.php';
    }
}