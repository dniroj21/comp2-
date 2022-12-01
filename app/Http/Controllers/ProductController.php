<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){

    $path = file_get_contents('products.json');              
    $jsonData = json_decode($path ,true);                      
    $products=collect($jsonData);

    return view('index',compact('products'));
    }

     public function store()
    {

        $data=request()->all();

       

        $path =file_get_contents('products.json'); 
        
        $productsJson = json_decode($path, true);
        
        
        $ids = [];
        foreach ($productsJson as $product) {
            
             $ids[] = $product['id'];
        }
        rsort($ids);
        $newId = $ids[0] + 1;

        $products = [];
        foreach ($productsJson as $product) {
            $products[] = $product;
        }

        $newProduct = [];
        $newProduct['id'] = $newId;
        $newProduct['type'] = $data['producttype'];
    
        $newProduct['title'] = $data['title'];
        $newProduct['firstname'] = $data['fname'];
        $newProduct['mainname'] = $data['sname'];
        $newProduct['price'] = $data['price'];

        if($data['producttype']=='cd') $newProduct['playlength'] = $data['pages'];
        if($data['producttype']=='book') $newProduct['numpages'] = $data['pages'];

        $products[] = $newProduct;

        $json = json_encode($products);
        if(file_put_contents('products.json', $json))
            return redirect('/');
        else
            return false;


    }

    public function edit($id){

        $data = file_get_contents('products.json');

        $productsJson = json_decode($data, true);

        $products = [];
        foreach ($productsJson as $product) {
            if($product['id']==$id) {
                $products[] = $product;
                break;
            }
        }
        
        return view('edit',compact('products')); 
    }

    public function update($id){
         $data=request()->all();


        $filepath = file_get_contents('products.json');
        $products= [];
        $productsJson = json_decode($filepath, true);

        foreach ($productsJson as $product) {
            if($product['id']==$id) {
                $product['title'] = $data['title'];
                $product['firstname'] = $data['fname'];
                $product['mainname'] = $data['sname'];
                $product['price'] = $data['price'];
                if($product['type']=='cd') $product['playlength'] = $data['pages'];
                if($product['type']=='book') $product['numpages'] = $data['pages'];
            }
            $products[] = $product;
        }

        $json = json_encode($products);
        $data = json_decode($filepath, true);
        if(file_put_contents('products.json', $json))
        return redirect('/');
        else
        return false;
    }

    public function destroy($id){
        $data = file_get_contents('products.json');

        $productsJson = json_decode($data, true);

        $products = [];
        foreach ($productsJson as $product) {
            if($product['id'] != $id) {
                $products[] = $product;
            }
        }
        $json = json_encode($products);
        if(file_put_contents('products.json', $json))
            return redirect('/');
        else
        return false;
    }


}