<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteIndex extends Component
{
    public $body;
    public $message;
    public $updating = false;
    public $ToUpdate;

    public function saveNote(){
        if($this->body===''){
            $this->message = 'Note is empty!!';
        }else{
            Note::create([
            'body'=>$this->body
            
        ]);
        $this->body='';
        $this->message = 'Note added successfully!!';
        }
        
        
        
    }
    public function editNote(Note $note){
        $this->updating = true;
        $this->ToUpdate = $note;
        $this->body = $note->body;
    }
    public function render()
    {
        return view('livewire.note-index', [
            'notes' => Note::latest()->get()
        ]);
    }
}
