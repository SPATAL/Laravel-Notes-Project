<div class="container">
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="row my-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($notes as $note)
                                    <li 
                                        wire:key='{{$note->id}}'
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                        <p>
                                            {{$note->body}}
                                        </p>
                                        <div class="dropdown ms-auto">
                                            <i class="fa-solid fa-ellipsis-vertical"
                                            data-bs-toggle='dropdown'></i>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <span class="dropdown-item"
                                                    wire:click='editNote({{$note->id}})' style="cursor:pointer">
                                                    <i class="fas fa-edit text-warning"></i>
                                                    </span>
                                                    <span class="dropdown-item" style="cursor:pointer">
                                                    <i class="fas fa-trash text-danger"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    {{$message}}
                    <div class="card">
                        <div class="card-body">
                            <textarea name="body" class="form-control" id="" 
                            cols="30" rows="10" wire:model='body'
                            placeholder="Start typing..."></textarea>
                        </div>
                        <div class="card-footer bg-white d-flex justify-content-between">
                            <button class="btn btn-sm btn-dark"
                                wire:click='saveNote'>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>