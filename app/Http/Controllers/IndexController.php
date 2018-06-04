<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexController extends Controller
{
	public function index()
	{
		return view('index', ['products' => Product::all()]);
	}

	public function save(Request $request)
	{
		$v = Validator::make($request->all(), [
			'name' => 'required|unique:product|max:255',
			'price' => 'required|numeric',
			'quantity' => 'required|numeric'
		]);
		if ($v->fails()) {
			return response()->json($v->errors()->getMessages(), Response::HTTP_BAD_REQUEST);
		}
		$product = Product::create($request->all());
		return response()->json($product->toArray(), Response::HTTP_CREATED);
	}
}