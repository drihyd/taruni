<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Page;
use App\Models\Products;
class SitemapController extends Controller
{
	
	public function load_xml_data() {		
		$categories = Categories::all()->first();		
		return response()->view('sitemap.index', [	
		'category' => $categories
		])->header('Content-Type', 'text/xml');
	}

	public function load_xml_category_data() {
		$category = Categories::all();  
		$department = Department::all();
		$pages = Page::all();
		$products = Products::all();		
		return response()->view('sitemap.category', [
		'category' => $category,
		'department' => $department,
		'pages' => $pages,
		'products' => $products,
		])->header('Content-Type', 'text/xml');
	}
}
?>