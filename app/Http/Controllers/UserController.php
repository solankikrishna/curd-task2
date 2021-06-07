<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Boduch\Grid\Order;
use Boduch\Grid\Source\EloquentSource;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $grid = app('grid.builder')
        //     ->createBuilder()
        //     ->setDefaultOrder(new Order('id', 'desc'))
        //     ->addColumn('id', [
        //         'sortable' => true
        //     ])
        //     ->addColumn('first_name')
        //     ->addColumn('last_name')
        //     ->addColumn('email')
        //     ->addColumn('created_at')
        //     ->addColumn('action')
        //     ->setSource(new EloquentSource(new \App\Models\User()));
        
        $grid = User::all();
         //dd($grid);
        return view('user.grid')->with('grid', $grid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $newUser = $request->validated();
        User::create($newUser);
        return redirect()->route('admin');
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
        $user = User::find($id);
        return view('user.form')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserCreateRequest $request, $id)
    {
        $editUser = $request->validated();
        User::where('id',$id)->update($editUser);
        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        // $this->validate(request(),[
        //     'id'=>'required'
        // ]);

        // if(request('id') == $id && User::where('id')->delete()){
        //     echo "succ";
        //     exit;
        // }
    }
}
