@if(count($data)>0)
<table class="table table-responsive table-striped table-hover">
    <thead>
      <tr>
        <th></th>
        <th>kW</th>
        <th>CV</th>
        <th>Nm</th>
        <th>file</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $result)
            <tr>
                <td>{{$result->description}}</td>
                <td>{{$result->kW}}</td>
                <td>{{$result->CV}}</td>
                <td>{{$result->Nm}}</td>
                <td>
                    <button type="button" class="btn btn-success" onclick="getfile({{$result->id}})">
                        <i class="glyphicon glyphicon-download-alt"></i>&nbspScarica il file
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert-warning">Pdf non trovato!</div>
@endif
