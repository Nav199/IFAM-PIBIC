<?php
namespace App\Controller;
use App\Models\FirebaseModel;

class SocioController
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function store()
    {
        
    }
}
