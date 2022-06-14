<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use App\Helpers\Helper;

class flowerController extends Controller
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

        $ref = $database->getReference('Flowers'); //lấy model user.
    
        $flowers = $ref->getValue();

        // foreach($flowers as $flowers){
        //     $all_flowers[] = $flowers;
        // }

        return view('admin.flowers.index', compact('flowers'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flowers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        // $flower_id = Helper::IDGenerator('Flowers', 'id',2,'WFL'); /** Generate id */
        // $fid = rand(1000, 10000);
        $postData = [
            'id' => $request->flower_id,
            'name'=> $request->name_flower,
            'info'=> $request->info,
            'img'=> $request->image,
            'price'=> $request->price,
            'humidity'=> $request->humidity,
            'temperature'=> $request->temperature,
            'light'=> $request->light,
            'weight'=> $request->weight,
        ];
        $postRef = $database->getReference('Flowers')->push($postData);

        if($postRef)
        {
            return redirect('flowers')->with('status','Added successfully');
        }
        else
        {
            return redirect('flowers')->with('status','Opps!');
        }

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
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        $key = $id;
        $ref = $database->getReference('Flowers');
        $editData = $ref->getChild($key)->getValue();

        if($editData)
        {
            return view('admin.flowers.edit',compact('editData','key'));
        }
        else
        {
            return redirect('flowers')->with('status','ID not found');
        }
        
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
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        $key = $id;
        $updateData = [
            'name'=> $request->name_flower,
            'info'=> $request->info,
            'img'=> $request->img,
            'price'=> $request->price,
            'humidity'=> $request->humidity,
            'temperature'=> $request->temperature,
            'light'=> $request->light,
            'weight'=> $request->weight,
        ];
        $updateRef = $database->getReference('Flowers'.'/'.$key)->update($updateData);

        if($updateRef)
        {
            return redirect('flowers')->with('status','Updated successfully');
        }
        else
        {
            return redirect('flowers')->with('status','Opps!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        $key = $id;
        $ref = $database->getReference('Flowers'.'/'.$key);
        $deleteData = $ref->remove();

        if($deleteData)
        {
            return redirect('flowers')->with('status','Deleted successfully');
        }
        else
        {
            return redirect('flowers')->with('status','Opps!');
        }
    }
}
