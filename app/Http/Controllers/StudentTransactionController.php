<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("registrar");
    }

    public function cashier()
    {
        return view("cashier");
    }

    public function display_monitor()
    {
        return view("display_monitor");
    }

    public function display_serving()
    {
        return view("display_serving");
    }

    public function display_table()
    {
        return view("display_table");
    }

    public function back()
    {
        return redirect('/');
    }

    public function getLatestUpdate(Request $request)
    {
        $firstItem = Queue::where('status', 1)->whereDate('created_at', $today)->orderBy('updated_at', 'asc')->first();
        return response()->json(['queue_no' => $firstItem->queue_no]);
    }

    public function servingQ(Request $request)
    {
        $servingTime = Carbon::now();
        $userID = Auth::id();

        $queue = Queue::find($request->input('id'));
        $queue->status = 1;
        $queue->employeeID = $userID;
        $queue->serving_time = $servingTime;
        $queue->save();

        // I-return ang response
        // return response()->json(['message' => 'Queue updated successfully']);
    }

    public function storequeue(Request $request)
    {
        // store
        $request->validate([
            'queue_no'=> 'required',
            'transaction'=> 'required',
        ]);

        $queue = new Queue;
            $queue -> queue_no = $request-> queue_no;
            $queue -> transaction = $request-> transaction;
            $queue -> status = 0;
            $queue->save();

            // return view('welcome')->with('success','Event created successfully.');
            return redirect('/')->with('success', 'Priority No. successfully created.');
    }

    public function updateQueue(Request $request)
    {
        // // store
        // $request->validate([
        //     'status' => 'nullable',
        // ]);
        
        // $queue -> queue_no = $request-> queue_no;
        // $queue -> transaction = $request-> transaction;
        // $queue -> status = 1;
        // $queue->save();

        // // return view('welcome')->with('success','Event created successfully.');
        // return redirect('/');

        // $servingTime = Carbon::now();
        $userID = Auth::id();

        $queue = Queue::find($request->input('id'));
        $queue->status = 2;
        $queue->employeeID = $userID;
        $queue->serving_time = $request->timerLabelInput;
        $queue->save();

        return redirect()->back()->with('success', 'Queue Updated.');
    }

    public function updateNoShow(Request $request)
    {

        $servingTime = Carbon::now();
        $userID = Auth::id();

        $queue = Queue::find($request->input('id'));
        $queue->status = 3;
        $queue->employeeID = $userID;
        $queue->serving_time = $request->timerLabelInput;
        $queue->save();

        return redirect()->back()->with('danger', 'Queue marked as no show.');
    }

    public function uploadVideo(Request $request)
    {
        // I-validate ang input
        $request->validate([
            'video' => 'required|mimes:mp4,avi,flv,mov,wmv|max:204800', // I-validate ang file type at laki
        ]);

        // Kunin ang uploaded file
        $video = $request->file('video');

        // I-save ang video sa public/storage/videos directory at ito ay "myvideo.mp4"
        $videoPath = $video->storeAs('public/videos', 'myvideo.mp4');

        // I-save ang path sa database o anumang kinakailangang record
        // Ito ay depende sa iyong application logic

        // Redirect o ibalik sa user matapos ang pag-upload
        return redirect()->back()->with('success', 'Video uploaded successfully.');
    }
    
    public function deleteVideo()
    {
        $videoFilename = "myvideo.mp4"; // Fixed na pangalan ng video

        // Itigil muna ang video playback kung ito ay naka-embed sa pahina
        // Kapag maaari, itago ang video para hindi na makuha muli
        Storage::delete('public/videos/' . $videoFilename);

        return redirect()->back()->with('success', 'Video successfully deleted.');
    }
}
