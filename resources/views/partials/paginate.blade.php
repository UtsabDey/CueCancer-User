@if(!empty($data) && !$data->isEmpty())
<label class="pull-left">Showing {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} entries</label>
<label class="pull-right">{{ $data->onEachSide(1)->links() }}</label>
@endif