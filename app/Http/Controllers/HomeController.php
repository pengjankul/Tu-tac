<?php

namespace App\Http\Controllers;

use App\Notifications\MyFirstNotification;
use App\User;
use Notification;
use App\Models\Userpriv;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(1);
        // dd($user->unreadNotifications->markAsRead());
        foreach ($user->unreadNotifications as $notification) {
            // echo "<pre>";
            // print_r($notification->data);
            $notification->markAsRead();
        }
        
        //BK add 03-06-19 
        $user_name   = Auth::user()->username;
        $result_menu = $this->create_menu($user_name);
        session(['menu' => $result_menu]);
        // $arr_result = array(
        //     'menu'=>$result_menu
        //    );
        //End BK */
                           
        return view('home');
    }

    //BK add 03-06-19
    public function check_all($data)
    {
        if ($data == 'ALL') {
            return true;
        } else {
            return false;
        }
    }

    public function create_menu($username)
    {
        $result_userpriv = Userpriv::ofUsername($username)->get()->first(); //สิทธิการใช้งาน

        $obj_privmas = Userpriv::find($result_userpriv['userprivid']); //obj table privmas
        $privmas_id  = $obj_privmas->privmas()->get()->first()->privmid; //รายการสิทธิ id
        
        $result_privlist = $obj_privmas->privmas()->find($privmas_id)
                            ->privlist()
                            ->join('ref_menu', 'ref_privlist.menuid', '=', 'ref_menu.menuid')
                            ->select('ref_privlist.*', 'ref_menu.*')
                            ->orderby('ref_menu.menuorder', 'asc')
                            ->where('ref_privlist.sts', 1)
                            ->get();
  
        // $menulv1 = DB::select('select * from MENUS where STS = ? order by MENUORDER asc', [1]);
        $arr_menu = array();

        // dd($menulv1);

        foreach ($result_privlist as $keypriv):
        $menulv1 = DB::select('select * from ref_menu where menuid = ? and sts = ? order by menuorder asc', [$keypriv->menuid, 1]);

                foreach ($menulv1 as $key):
                    if ($this->check_all($keypriv->sub_flg)) {
                        $menulv2 = DB::select('select * from ref_submenu where menuid = ? and sts = ? order by suborder asc', [$key->menuid, 1]);
                    } else {
                        $arr_level2 = explode(',', $keypriv->sub_flg);
                // $menulv2 = DB::select('select * from SUBMENUS where submenuid IN(\'?\') and MENUID = ? and STS = ? and order by SUBORDER asc', [$keypriv->sub_flg, $key->menu_id, 1]);
                            $menulv2 = DB::table('ref_submenu')
                                    ->whereIn('submenuid', $arr_level2)
                                    ->where('menuid', '=', $key->menuid)
                                    ->orderBy('suborder', 'asc')
                                    ->get();
                    }

                $class_toggle = 'menu-toggle';
                if (count($menulv2) == 0) {
                    $class_toggle = '';
                }

                $class_togglelv2 = 'menu-toggle';
                $arr_lv2 = [];
                            foreach ($menulv2 as $keylv2):
                            
                            if ($this->check_all($keypriv->third_flg)) {
                                $menulv3 = DB::select('select * from ref_thirdsubmenu where menuid = ? and submenuid = ? and STS = ? order by submenuid asc', [$key->menuid, $keylv2->submenuid, 1]);
                            } else {
                                // $menulv3 = DB::select('select * from THIRDSUBMENUS where THIED_ID IN("?") and MENUID = ? and submenuid = ? and STS = ? order by submenuid asc', [$keypriv->third_flg, $key->menu_id, $keylv2->submenuid, 1]);
                                $arr_level3 = explode(',', $keypriv->third_flg);
                                $menulv3 = DB::table('ref_thirdsubmenu')
                                ->whereIn('thirdid', $arr_level3)
                                ->where('menuid', '=', $key->menu_id)
                                ->where('submenuid', '=', $keylv2->submenuid)
                                ->orderBy('submenuid', 'asc')
                                ->get();
                            }

                            if (count($menulv3) == 0) {
                                $class_togglelv2 = '';
                            }
                            $arr_lv3 = [];
                                        foreach ($menulv3 as $keylv3):
                                                                        $arr_lv3[] = array(
                                                                                            'third_name' => $keylv3->third_name,
                                                                                            'third_path' => $keylv3->third_path,
                                                                                            'portalFlg' => $keylv3->portalflg,
                                                                                            'new_tab' => $keylv3->new_tab,
                                                                                    );
                                        endforeach; //end $menulv3
                            $arr_lv2[] = array(
                                                'submenu_name' => $keylv2->submenu_name,
                                                'submenu_path' => $keylv2->submenu_path,
                                                'portalFlg' => $keylv2->portalFlg,
                                                'new_tab' => $keylv2->new_tab,
                                                'class_toggle' => $class_togglelv2,
                                                'level3' => $arr_lv3,
                                            );
                                endforeach; //end $menulv2

                        $arr_menu_list[] = array('level1' => array(
                                                                    'menu_name' => $key->menu_name,
                                                                    'menu_path' => $key->menu_path,
                                                                    'menu_class_icon' => $key->menu_class_icon,
                                                                    'class_toggle' => $class_toggle,
                                                                ),
                                                 'level2' => $arr_lv2,
                                                );
                        endforeach;
        endforeach;

        return $arr_menu_list;
    }
    // End BK */

    public function sendNotification()
    {

        $user = User::first();

        $details = [

            'greeting' => 'Hi Artisan',

            'body' => 'This is my first notification from ItSolutionStuff.com',

            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',

            'actionText' => 'View My Site',

            'actionURL' => url('/'),

            'order_id' => 101,

        ];

        Notification::send($user, new MyFirstNotification($details));

        dd('done');

    }
}
