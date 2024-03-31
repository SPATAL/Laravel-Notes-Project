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
    public $deleteId = '';

    public function saveNote(){
        if($this->body===''){
            $this->message = 'Note is empty!!';
        }
            Note::create([
            'body'=>$this->body
            
        ]);
        $this->clearForm();
        $this->message = 'Note added successfully!!';
        
        
        
        
    }
    public function editNote(Note $note){
        $this->updating = true;
        $this->ToUpdate = $note;
        $this->body = $note->body;
    }

    public function updateNote(){
        $this->ToUpdate->update([
           'body' => $this->body
        ]);
        $this->clearForm();
    }

    public function noteDone(){
        $this->ToUpdate->update([
           'done' => 1
        ]);
        $this->clearForm();
    }
    public function deleteNote(Note $note){
        $note->delete();
        $this->message = 'Note deleted successfully!!';
        $this->clearForm();
    }

    public function clearForm(){
        $this->body = '';
        if ($this->updating){
            $this->updating = false;
        };
        
        
    }

    public function render()
    {
        return view('livewire.note-index', [
            'notes' => Note::latest()->get()
        ]);
    }
}
