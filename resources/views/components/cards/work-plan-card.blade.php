<div class="row">
    @foreach ($data as $workplan)
    <div class="col-sm-6">
        <div class="card card-frame mb-4">
            <div class="card-body d-flex justify-content-between align-items-center cursor-pointer" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$workplan->id}}" aria-expanded="false" aria-controls="collapseExample{{$workplan->id}}">
                <div>
                    <img src="{{ Storage::url($workplan->icon) }}" alt="icon" style="border-radius: 50px; width: 30px;" />
                    <span class="px-3">{{$workplan->plan}}</span>
                </div>
                <div>
                    {{-- <button wire:click="edit({{ $workplan->id }})" class="btn btn-primary btn-sm"><i class="fas fa-user-edit text-secondary"></i></button> --}}
                    <span wire:click="edit({{ $workplan->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Proker">
                        <i class="fas fa-user-edit text-secondary"></i>
                    </span>
                    <span wire:click="delete({{ $workplan->id }})" data-bs-toggle="tooltip" data-bs-original-title="Hapus Proker">
                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                    </span>
                </div>
            </div>
            <div class="collapse" id="collapseExample{{$workplan->id}}">
                <div class="card card-body pt-0">
                    {{$workplan->description}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>