<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-2">
                <h6>Program Kerja</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <form>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Judul Proker</label>
                        <input wire:model="title" class="form-control" type="text" id="example-text-input" style="padding-left: 10px !important">
                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="padding-left: 10px !important"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Icon</label>
                        <br>
                        @if ($oldIcon)
                            <small>Old Icon:</small>
                            <img class="m-2 mt-0" src="{{ Storage::url($oldIcon) }}" />
                        @endif
                        @if ($icon)
                            <small>New Icon:</small>
                            <img class="m-2 mt-0" src="{{ $icon->temporaryUrl() }}" />
                        @endif
                        <input wire:model="icon" class="form-control" type="file" id="formFile" style="padding-left: 10px !important">
                        @error('icon') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        @if ($isEditMode)
                        <button wire:click.prevent="resetInputFields()" type="submit" class="btn bg-gradient-light btn-md mt-2 mb-4 mx-2">{{ 'Cancel' }}</button>
                        @endif
                        <button wire:click.prevent="store()" type="submit" class="btn bg-gradient-dark btn-md mt-2 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>