<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Detail;
use App\Menu;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class PizzaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pizza = Menu::all();
        return view('home',['pizza'=>$pizza]);
    }

    public function index1()
    {
        $user = User::all();
        return view('admins.au',['user'=>$user]);
    }

    public function index2()
    {
        $history = Transaction::where('user_id', '=', Auth::id())->get();
        return view('history',['history'=>$history]);
    }

    public function index3($menu)
    {
        $tdetail = Detail::where('transaction_id', '=', $menu)->get();
        return view('tdetail',['tdetail'=>$tdetail]);
    }

    public function index4()
    {
        $menu = Transaction::all();
        return view('admins.vaut',['menu'=>$menu]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.apizza');
    }

    public function create1()
    {
        return view('members.detailm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->photo;
        $fileName = $file->getClientOriginalName();

        $request->validate([
            'name' => 'required|max:20',
            'desc' => 'required|min:20',
            'price' => 'required|numeric|digits_between:4,99',
            'photo' => 'required',
        ]);

        $menu = new Menu;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->desc = $request->desc;
        $menu->photo = $fileName;
        
        $file->move(public_path().'/',$fileName);
        $menu->save();

        // Menu::create([
        //     'name' =>$request->name,
        //     'price' =>$request->price,
        //     'desc' =>$request->desc,
        //     'photo' =>$request->photo
        // ]);

        // return $request;

        // $request->validate([
        //     'name' => 'required|max:20',
        //     'desc' => 'required|min:20',
        //     'price' => 'required|numeric|digits_between:4,99',
        //     'photo' => 'required',
        // ]);

        // Menu::create($request->all());

        return redirect('/')->with('status','Data Berhasil di Add!');
    }

    public function store2(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);


        $cart = Cart::create([
            'user_id' => Auth::id(),
            'menu_id' => $id,
            'quantity' => $request['quantity']
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('guests.detail', ['menu' => $menu]);
    }

    public function show1(Menu $menu)
    {
        return view('admins.detaila', ['menu' => $menu]);
    }

    public function show2(Menu $menu)
    {
        return view('members.detailm', ['menu' => $menu]);
    }

    public function show3(Menu $menu)
    {
        return view('admins.delete', ['menu' => $menu]);
    }

    public function show4(Menu $menu)
    {
        return view('admins.epizza', ['menu' => $menu]);
    }

    public function show5(Cart $menu)
    {
        $menu = Cart::where('user_id', '=', Auth::id())->get();
        return view('cart', ['menu' => $menu]);
    }

    public function show6(Request $request)
    {
        $pizza = Menu::where('name', 'like', '%'.$request->search.'%')->paginate(6);
        return view('home',['pizza'=>$pizza]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admins.epizza', compact('menu'));
    }

    public function edit1(Menu $menu)
    {
        $menu = Cart::where('user_id', '=', Auth::id())->get();
        return view('cart', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $file = $request->photo;
        $fileName = $file->getClientOriginalName();

        $request->validate([
            'name' => 'required|max:20',
            'desc' => 'required|min:20',
            'price' => 'required|numeric|digits_between:4,99',
            'photo' => 'required'
        ]);
        
        $file->move(public_path().'/',$fileName);

        Menu::where('id', $menu->id)
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'desc' => $request->desc,
                'photo' => $fileName,
            ]);
        return redirect('/')->with('status','Data Berhasil di ubah!');
    }

    public function update1(Request $request, Cart $menu)
    {
        $request->validate([
            'quantity' => 'required'
        ]);

        Cart::where('id', $menu->id)
            ->update([
                'quantity' => $request->quantity
            ]);
        return redirect('cart')->with('status','Data Berhasil di ubah!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);

        return redirect('/')->with('status','Data Berhasil di hapus!');
    }

    public function destroy1(Menu $menu)
    {
        Cart::destroy($menu->id);

        return redirect('cart')->with('status','Data Berhasil di hapus!');
    }

    public function passingTransaction() {
        $menu = Cart::where('user_id', '=', Auth::id())->get();

        $transaction = Transaction::create([
            'user_id' => Auth::id()
        ]);

        foreach($menu as $men) {
            $detail = Detail::create([
                'transaction_id' => $transaction->id,
                'menu_id' => $men->menu_id,
                'quantity' => $men->quantity,
            ]);
            $cart = Cart::destroy($men->id);
        }

        return redirect('/');
    }
    
}
