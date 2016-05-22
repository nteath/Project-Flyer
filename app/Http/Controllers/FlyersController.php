<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Requests\FlyerRequest;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);

        parent::__construct();
    }

    public function index()
    {
        return 'index';
    }


    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }
    

    public function create()
    {

        return view('flyers.create');
    }


    public function store(FlyerRequest $request)
    {
        // Validation has passed here
        Flyer::create($request->all());

        flash()->success('Good job', 'Flyer created successfully.');

        return redirect()->back();
    }


    public function addPhoto($zip, $street, AddPhotoRequest $request)
    {
        $photo = $this->makePhoto($request->file('file'));

        Flyer::locatedAt($zip, $street)->associatePhoto($photo);
    }


    public function makePhoto(UploadedFile $file)
    {
        return Photo::newFromForm($file->getClientOriginalName())
                    ->upload($file);
    }
}
