<div class="row">
<div class="d-flex aligns-items-center justify-content-center">
<div class="col-6">
    <div class="card ">
        <div class="card-header">
            <h5 class="card-title">Invoice</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <form wire:submit.prevent="store" method="POST">
         
            @csrf
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Pelanggan</label>
                    <select class="form-control" wire:model="pelanggan_id">
                        <option hidden>--Pilih Pelanggan--</option>
                        @foreach($data as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                   
                </div>
           
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-end">
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
