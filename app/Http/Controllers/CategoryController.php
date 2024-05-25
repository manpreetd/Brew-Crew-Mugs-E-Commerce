<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Retrieves all categories and displays them in the view
    public function index() {
        $categories = Category::all();
        return view('admin.pages.categories.index', ['categories' => $categories]);
    }

    // Stores a new category in the database
    public function store(Request $request) {
        
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        // Create a new Category instance and save it to the database
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        //Return response to front end
        return back()->with('success', 'Category Saved');
    }

    // Deletes a category from the database
    public function destroy($id) {
        // Find the category by its ID and delete it
        Category::findOrFail($id)->delete();
        // Return a response to the front end with a success message
        return back()->with('success', "Category Deleted");
    }
}
