<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;
use App\User;
use Auth;
class PictureController extends Controller
{
    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'photo' => 'required',
        ]);

        $originalImage= $request->file('photo');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/image/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(50,50);
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());

        $user = Auth::user();
        $user->image = time().$originalImage->getClientOriginalName();
        $user->update();
        return redirect()->back();
    }
}
