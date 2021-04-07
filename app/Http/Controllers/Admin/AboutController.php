<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PageDefaultBlocks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.pages.about');
    }

    public function mainView()
    {
        return view('about', [
            'default_blocks' => $this->getDefaultBlocks()
        ]);
    }

    public function getDefaultBlocks()
    {
        return PageDefaultBlocks::select('*')->where('page', '=', 'about')->get();
    }

    public function updateAbout(Request $request)
    {
        if ($request->hasFile('file')) {
            $this->destroyImage($request->get('previous_file_name'));
            $file = $request->file('file');
            $path = $this->uploadImage($file);
            PageDefaultBlocks::where('id', $request->get('id'))->update([
                'image' => $path
            ]);
        }
        PageDefaultBlocks::where('id', $request->get('id'))->update([
            'title'     => $request->get('title'),
            'sub_title' => $request->get('sub_title') == 'null' ? NULL : $request->get('sub_title'),
            'text'      => $request->get('text'),
            'page'      => 'about',
            'color'     => $request->get('color'),
            'position'  => $request->get('position')
        ]);

    }

    public function destroyImage($filename): void
    {
        Storage::disk('pages')->delete($filename);
    }

    public function uploadImage($file)
    {
        if ($file) {
            return $file->store('', 'pages');
        } else {
            return 500;
        }
    }
}
