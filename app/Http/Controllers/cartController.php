<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use App\Helpers\Helper;
use Kreait\Firebase\Value\Uid;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        $ref = $database->getReference('FlowerCart'); //lấy model user.    
        $flowerUid = $ref->getValue();

        // foreach($flowerUid as $key){

        // }

        $reff = $database->getReference('FlowerCart')->getChild('');
        $flowercart = $reff->getValue();

        

        return view('admin.cart.index', compact('flowerUid','flowercart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
