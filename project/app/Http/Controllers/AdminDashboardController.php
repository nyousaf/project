<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Work;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function update_profile(Request $request)
    {
        $auth = Auth::user();

        $request->validate([
           'current_password' => 'required'
        ]);

        if (Hash::check($request->current_password, $auth->password))
        {

          if ($request->new_email !== null)
          {
              $request->validate([
                 'new_email' => 'required|email'
              ]);
              $auth->update([
                  'email' => $request->new_email
              ]);
              return back()->with('updated', 'Email has been updated');
          }
          if ($request->new_password !== null)
          {
            $request->validate([
                'new_password' => 'required|min:6'
            ]);
            $auth->update([
               'password' => bcrypt($request->new_password)
            ]);
            return back()->with('updated', 'Password has been updated');
          }

        } else {
          return back()->with("deleted", "Your password doesn't match");
        }
        return back();
    }

    public function dashboard_show()
    {

      $cat_count = Category::count();
      $prod_count = Work::count();       
      $featured_count = Work::where('is_featured','1')->count();
      $pub_count = Work::where('status','p')->count();
      // $booking_count = Booking::where('status','b')->count();      
      // // $book_sale_count = Booking::where('status','b')->SUM('total_amt');
      // $wallet_count = DB::table('wallets')                
      //           ->where('is_active','1')
      //           ->SUM('total_points');
      // $bonus_count = Bonus::sum('b_points');        
      // $sale_count = DB::table('member_plans')
      //           ->where('status','s')
      //           ->SUM('paid_amount');

      // $book_sale_count = DB::table('bookings')
      //           ->where('status','b')
      //           ->SUM('total_amt');

      return view('admin.dashboard', compact('cat_count','prod_count', 'featured_count','pub_count'));
    }
}
