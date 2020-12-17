<?php

namespace App\Http\Controllers\Admin;

use App\Category;


use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;




class AdminController extends Controller
{
    public function index()
    {

        $name=auth()->user()->name;
        $image=auth()->user()->images['thumb'];
        return view('admin.index', compact('name', 'image'));
    }
public function master()
{

    $path = base_path().'/public';
    return require_once($path . '/goSDL-master/www/sdl.php');
}

    protected  function clean($html)
    {

        require base_path('vendor/ezyang/htmlpurifier/library/') . 'HTMLPurifier.auto.php';
        $config = HTMLPurifier_Config::createDefault();
        $config->loadArray([
            'Core.Encoding' => 'UTF-8',
            'HTML.Doctype' => 'XHTML 1.0 Strict',
            'HTML.Allowed' => 'div,h1,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
            'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty' => true
        ]);
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($html);
    }

}























