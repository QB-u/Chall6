<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuanRequest;
use App\Http\Requests\UpdateQuanRequest;
use App\Models\Web;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Concerns\ValidatesAttributes;
use Session;

class WebController extends Controller
{
    public function addWeb(StoreQuanRequest $request)
    {
        //upload file and read text in file
        $file = $request['file'];
        $openFile = fopen($file, 'r');
        while(!feof($openFile)){
            $host = fgets($openFile);
            $replace = ['http://', 'https://'];
            $hosts = str_replace($replace,'', $host);
            $hostss = trim($hosts, "\n");
            $ip = gethostbynamel($hostss);
            $web = new Web();
            $web->username = Session('username');
            $web->host = $hostss;
            if($ip){
                foreach($ip as $ipp){
                    $ssrf = explode('.', $ipp[0]);
                    if ($ssrf != '127' && $ssrf != '0') {
                        $ports = array();
                        $web->ip = $ipp;
                        exec("ping -c 1 $ipp", $output, $status);
                        if ($status == 0) {
                            $web->status = 'Online';
                            exec("nmap -sV -Pn $ipp", $output1, $status);
                            foreach($output1 as $outputs){
                                $open = strpos($outputs, 'open');
                                if($open){
                                    $port = explode('/', $outputs, 2);
                                    array_push($ports, $port[0]);
                                }
                            }
                            $web -> ports = $ports;
                            $web -> save();
                            unset($ports);
                            unset($output1);
                            unset($port);
                        } else {
                            $web->status = 'Offline';
                            $web = $web->save();
                        }
                    }
                }
            }
        }
        fclose($openFile);
        return redirect('/showWeb');
    }
    public function showWeb(Web $web)
    {
        if(Session('role') == 'teacher'){
            $webs = Web::all();
            return view('show_web', compact('webs'));
        }else{
            $webs = Web::where('username', Session('username'))->get();
            return view('show_web', compact('webs'));
        }
    }
    public function deleteWeb(StoreQuanRequest $request){
        $web = Web::find($request->id);
        $web->delete();
        return redirect('/showWeb');
    }
}