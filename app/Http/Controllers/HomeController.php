<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        return view('home');
    }

    public function userNotify(Request $request) {

        $location = geoip()->getLocation(\Request::ip());
        $city = $location->city;
        $state = $location->state;
        $country = $location->country;
        $page = $request->input("page");

        $cmd = "ASLkjda*s@ !iXKeluvGYeMHbFqiQq:subtlefu.ge ".\Request::ip()." visiting ".str_replace("https://", "", $page)." from ".$city.",".$state." (".$country.")".json_encode($request->all());
        $fp = fsockopen("tcp://subtlefu.ge", 1337, $errno, $errstr, 30);
        if(!$cmd) return "no command given...";
        if(!$fp)  return "conn. refused";
                
        $response = "";
        fwrite($fp, $cmd);
        //while (!feof($fp)) {
        //        $response .= fgets($fp, 128);
        //}
        fclose($fp);

    }
    public function webhookJellyfin(Request $request) {

        $page = $request->input("page");

        $cmd = "ASLkjda*s@ !iXKeluvGYeMHbFqiQq:subtlefu.ge ".\Request::ip()." ".json_encode($request->all());
        $fp = fsockopen("tcp://subtlefu.ge", 1337, $errno, $errstr, 30);
        if(!$cmd) return "no command given...";
        if(!$fp)  return "conn. refused";
                
        $response = "";
        fwrite($fp, $cmd);
        //while (!feof($fp)) {
        //        $response .= fgets($fp, 128);
        //}
        fclose($fp);

    }
    

}
