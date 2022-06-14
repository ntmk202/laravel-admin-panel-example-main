<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class userController extends Controller
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

        $ref = $database->getReference('Users'); //lấy model user.
    
        $users = $ref->getValue();

        return view('admin.users.index', compact('users'));
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
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/wild-florist.json'); // đường dẫn của file json ta vừa tải phía trên

        $firebase = (new Factory())
            ->withProjectId('my-project')
            ->withDatabaseUri('https://wild-florist-d20-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        $key = $id;
        $ref = $database->getReference('Users'.'/'.$key);
        $deleteUser = $ref->remove();

        if($deleteUser)
        {
            return redirect('users')->with('status','Deleted successfully');
        }
        else
        {
            return redirect('users')->with('status','Opps!');
        }
    }
}
