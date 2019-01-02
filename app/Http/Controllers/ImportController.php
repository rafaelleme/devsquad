<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductTag;


class ImportController extends Controller
{
    
    public function productCsv($path)
    {

    	$archive = fopen($path,'r');

    	$row = 0;

    	while (($data = fgetcsv($archive, 1000, ';')) !== FALSE) {

    		if (!$row) {
    			$row++;
    			continue;
    		}

    		try {

    			$product = new Product;

	    		$product->name = $data[0];
	    		$product->subName = $data[1];
	    		$product->price = $data[2];
	    		$product->description = $data[3];
	    		$product->save();

	    		$tags = explode(',',$data[4]);

	    		foreach ($tags as $tag) {
	    			ProductTag::create([
		    			'product_id' => $product->id,
		    			'tag_id' => $tag
		    		]);
	    		}

	    		echo "Line {$row} was successfully imported \n";
    		} catch (Exception $e) {
    			echo "Line {$row} could not be imported";
    			$row++;
    			continue;
    		}
    		
	        
	        $row++;
    	}

    }

}
