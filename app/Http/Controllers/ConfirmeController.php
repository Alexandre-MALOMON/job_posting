<?php

namespace App\Http\Controllers;

use App\Exports\PostulerExport;
use App\Mail\AccepterMail;
use App\Mail\RefuserMail;
use App\Models\Emploie;
use App\Models\Postuler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Exports\PostulersExport;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;

class ConfirmeController extends Controller
{
    public function index(Request $request){
            $offre = Crypt::decrypt($request->get('id'));
            $title = Crypt::decrypt($request->get('title'));
           // dd($offre);
        $confirmes = User::leftjoin('emploies','users.id','=','emploies.user_id')
                         ->join('postulers','users.id','=','postulers.user_id')
                        //->join('chercheurs','users.id','=','chercheurs.user_id')
                        ->select('users.name','users.id','users.activite','users.pays','users.email','emploies.user_id','emploies.title','emploies.photo','emploies.responsabilities',
                         'emploies.salary','emploies.dure','postulers.emploie_id','postulers.user_id','postulers.status','postulers.created_at','postulers.cv','postulers.lettre','lettre')
                         ->where('postulers.emploie_id','=',$offre)
                        //->where('emploies.user_id','=',Auth::user()->id)
                        // ->orderBy('postulers.created_at','desc')->paginate(8);
                        ->orderBy('created_at', 'desc')->paginate(6);
       // dd($confirmes);
        return view('entreprise.confirme.confirme_offre',compact('confirmes','title','offre'));
    }

    public function update(Request $request, Postuler $confirme){

        $request->validate([
            'status' => 'required',
        ]);
        $confirme->update([
            'status' => $request->status,
        ]);
        $infos=[
            'id'=> $request->id,
            'title'=> $request->title,
            'name'=> $request->name,
            'email' => $request->email,
            'emploie_id'=> $request->emploie_id
        ];
        dd($infos);

        if($request->status == 'Accepter'){

            $conversation = Conversation::create([
                'from'=> Auth::user()->id,
                'to' => $infos['id'],
                'emploie_id'=>  $infos['emploie_id']
            ]);

            Message::create([
                'user_id' => Auth::user()->id,
                'conversation_id' => $conversation->id,
                'content' => 'J\'ai validé votre candidature'
            ]);
            Mail::to($infos['email'])->send(new AccepterMail($infos));
            return back()->with('success', 'Demande acceptée');
            }else{
                Mail::to($infos['email'])->send(new RefuserMail($infos));
                return back()->with('success', 'Demande rejetée');
            }
    }

    public function liredoc(Postuler $confirme){
            return view('entreprise.confirme.show',compact('confirme'));
    }

    public function exportPostulerListToExcel(Request $request) {
        $offre = $request->get('id');
        $title = $request->get('title');
       // dd($offre);
    $exports = User::leftjoin('postulers','users.id','=','postulers.user_id')
                    ->join('emploies','users.id','=','emploies.user_id')
                    ->select('users.name','users.activite','users.pays','users.email','postulers.emploie_id','postulers.user_id','postulers.id','postulers.status','postulers.created_at','postulers.cv','postulers.lettre')
                     ->where('postulers.emploie_id','=',$offre)
                    ->where('emploies.user_id','=',Auth::user()->id)->get();
                    // ->orderBy('postulers.created_at','desc')->paginate(8);
                   // dd($exports);

        return EXCEL::download(new PostulerExport($exports), 'postuler.xlsx');
    }
}
