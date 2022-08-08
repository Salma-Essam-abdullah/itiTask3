<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);

        // return view('users.index')->with(['users' => $users]);

        // User::create([
        //     'name' => 'ssss',
        //     'email' => 'saz@gmail.com',
        //     'password' => '123456',
        // ]);
        // dd(User::all());
        // $data = [
        //     ['name'=>'sssss', 'email'=>' ssss@mail.com','password' =>'122334'],
        //     ['name'=>'kkk', 'email'=>' kkk@mail.com','password'=>'334f4'],
            
        // ];
        // $users=User::all();
        // return view('users.index', [
        //     'users' => DB::table('users')->paginate(15)
        // ])->with(['users' => $users]);
        
        // // app > http > controllers > EmployeeController.php

   
      $users = User::paginate(8);
      return view('users.index', compact('users'));
        }

        // User::insert($data); // Eloquent approach
        // DB::table('users')->insert($data);
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();
        $user = new User([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'password'=> $request->get('password'),
        ]);
 
        $user->save();
        return redirect('users')->with('success', 'user has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);

      return view ('users.show')->with(['users' => $user, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $users = User::find($id); 

      return view ('users.edit')->with(['users' => $users, 'id' => $id]);
        
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
        $request->all();
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
   
 
        $user->update();
 
        return redirect('users')->with('success', 'Student updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'Student deleted successfully');
    
    }
}
