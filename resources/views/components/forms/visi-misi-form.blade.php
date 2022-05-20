<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-2">
                <h6>Visi Misi</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <form>
                    <div class="form-group">
                        <label for="visi-input">Visi</label>
                        <textarea wire:keydown.enter="storeVisi()" wire:model="visi" class="form-control" id="visi-input" rows="3" style="padding-left: 10px !important">{{ $vision }}</textarea>
                        @error('visi') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    {{-- <button wire:click.prevent="storeVisi()" type="submit" class="btn bg-gradient-dark btn-md mt-2 mb-4">{{ 'Save Changes' }}</button> --}}
                </form>
                
                <form>
                    <label for="misi-input" class="form-control-label">Misi</label>
                    <button wire:click.prevent="addMisi()" type="submit" class="btn bg-gradient-success btn-sm mt-2 mb-4 mx-2">{{ 'Tambah Misi' }}</button>
                    @foreach ($misi as $m)
                    <div class="form-group" id="misi{{$loop->index}}">
                        <input wire:keydown.enter="storeMisi('{{$loop->index}}', {{$m['id']}})" wire:model="misi.{{$loop->index}}.description" class="form-control" type="text" id="misi-input" style="padding-left: 10px !important" value="{{ $m['description'] }}">
                        @error('misi.{{$loop->index}}.description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // function addMission(x) {
    //     let lastMission = document.getElementById(`misi${x-1}`)

    //     let div = document.createElement('div');
    //     div.textContent = 'Services';
    //     // console.log(lastMission);
    //     insertAfter(div, lastMission)
    // }
</script>