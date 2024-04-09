<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\withPagination;

class NoteIndex extends Component
{

    use withPagination;

    #[Validate('required',message:'Please provide the content of the note')]
    public $body;
    public $message;
    public $updating = false;
    public $ToUpdate;
    public $deleteId = '';
    public $tst;

    public function saveNote(){
            $validated = $this->validate();
            Note::create($validated);
        $this->clearForm();
        $this->message = 'Note added successfully!!';
        $tst = $this->message;
        
        
        
        
    }
    public function editNote(Note $note){
        $this->resetValidation();
        $this->updating = true;
        $this->ToUpdate = $note;
        $this->body = $note->body;
    }

    public function updateNote(){
        $validated = $this->validate();
        $this->ToUpdate->update($validated);
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
            $this->ToUpdate = '';
        };
        $this->resetValidation();
        
        
    }

    public function render()
    {
        return view('livewire.note-index', [
            'notes' => Note::latest()->simplePaginate(3)
        ]);
    }
}
