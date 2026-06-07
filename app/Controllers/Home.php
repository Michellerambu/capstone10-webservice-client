<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    protected $productModel;

    function __construct(){
        helper(['number', 'form']);
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $product = $this->productModel->findAll();
        $data['products'] = $product; 
        
        // PERBAIKAN: Menambahkan helper 'form' di sini bersama 'url'
        helper(['url', 'form']);
        
        return view('v_home', $data);
    }

    public function faq()
    {
        return view('v_faq');
    }

    public function profile()
    {
        return view('v_profile');
    }
}