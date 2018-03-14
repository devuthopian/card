<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twitter;
use File;

use App\Services\TwitterService;

class TwitterController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function twitterUserTimeLine()
    {

        //$token='191372522-hiMFxBCf0XQuK11vsxRa6JDp5LtAG87g1ByBPdCW';
       // $secret='8876aSpjrKTbw9IZobhKbqJrA9xXX1484TSnFtfhkmXQB';

        $token='971692587072524291-xLP8KKrp0XjpqEv5pdtmsbdM7j42E94';
        $secret='QJS9ZFPBqdK9q669aahcP4tUEB6osVovyD7AO3cxxu9Af';

        $twitterServiceObj = new TwitterService;
      //  $twitterServiceObj->setToken($token, $secret);

        $data = Twitter::getHomeTimeline(['count' => 10, 'format' => 'array']);
       // dd($data);
        return view('users.twitter.twitterUserTimeLine',compact('data'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweet(Request $request)
    {
        $this->validate($request, [
            'tweet' => 'required'
        ]);


        $newTwitte = ['status' => $request->tweet];

    
        if(!empty($request->images)){
            foreach ($request->images as $key => $value) {
                $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
                if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
            }
        }

        $twitter = Twitter::postTweet($newTwitte);

        return back();
    }
}