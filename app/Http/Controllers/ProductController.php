<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {
    public function index() {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }
    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $imagePath = $request->file('image')->store('products', 'public');
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $imagePath,
            'user_id' => Auth::id()
        ]);
        return redirect('/')->with('success', 'Producto publicado exitosamente');
    }
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }
}
