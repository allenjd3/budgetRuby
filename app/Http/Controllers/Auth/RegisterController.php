<?php

namespace App\Http\Controllers\Auth;

use App\Bitem;
use App\Budget;
use App\BudgetSchema;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
	   $budgetschema1 = BudgetSchema::first();
	   $budgetschema = new BudgetSchema();	
       $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
		$budget = new Budget();
		$budget->month = Carbon::now()->month;
		$budget->year = Carbon::now()->year;
		$budget->user_id = $user->id;	
		$budget->save();
		$bitems = [];
		foreach($budgetschema1->bitems as $id){
			$bitem = Bitem::find($id);
			$newBitem = new Bitem();
			$newBitem->name = $bitem->name;
			$newBitem->budget = $bitem->budget;
			$newBitem->category = $bitem->category;
			$newBitem->user_id = $user->id;
			$newBitem->budget_id = $budget->id;	
			if($newBitem->save()){
				$bitems[] = $newBitem->id;
			//	$budgetschema->bitems[] = $newBitem->id;			
			}

		}
		$budgetschema->bitems = $bitems;

	   $budgetschema->user_id = $user->id;
	   if($budgetschema->save())
	   {
			return $user;
	   }
    }
}
