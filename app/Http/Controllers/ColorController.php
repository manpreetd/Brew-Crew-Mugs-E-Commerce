<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    // Displays all colors
    public function index() {
        $colors = Color::all();
        return view('admin.pages.colors.index', ['colors' => $colors]);
    }

    // Stores a new color   
    public function store(Request $request) {
        
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:colors|max:255',
            'code' => 'required|max:255'
        ]);

        // Store the new color
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();

        //Return response to front end
        return back()->with('success', 'Color Saved');
    }
    // Deletes a color
    public function destroy($id) {
        Color::findOrFail($id)->delete();
        return back()->with('success', "Color Deleted");
    }
}
