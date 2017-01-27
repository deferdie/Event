<?php 

namespace deferdie\Events\Http\Controllers;
/**
 * 
 * @author Ferdie De Oliveira <deferdie@gmail.com>
 */

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use deferdie\Events\DeferdieEvent;

class EventController extends Controller
{   
    /**
     * The Tasf event class
     * @var Tasf event class
     */
    private $event;

    public function __construct()
    {
        $this->event = new DeferdieEvent(new \App\Event);
    }

    public function index()
    {
        return view('Events::events',[
            'events' => $this->event->all(0)
        ]);
    }

    public function indexBackend()
    {
        return view('backend.events.index',[
            'events' => $this->event->all(2)
        ]);
    }

    public function create()
    {
        return view('backend.events.create');
    }

    public function store(Request $event)
    {
        $this->event->create($event, Auth::id());

        return redirect('/backend/events/');
    }

    public function edit($id)
    {
        $event = $this->event->show($id, 2);
        
        return view('backend.events.edit', ['event' => $event]);
    }

    public function save($id, Request $request)
    {
        $event = $this->event->update($id, $request);

        return redirect('backend/event/edit/'.$id);
    }

    public function delete($id)
    {
        $this->event->delete($id);
    }

}
