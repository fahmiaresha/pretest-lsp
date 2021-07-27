<table class="table table-hover table-striped table-bordered table-responsive">
    <thead class="thead-dark">
        <tr>
            <th>nama</th>
            <th>alamat</th>
            <th>kota</th>
            <th>email</th>
            <th>hp</th>
            <th>perusahaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customer as $c)
        <tr>
            <td>{{$c->nama_customer}}</td>
            <td>{{$c->alamat_customer}}</td>
            <td>{{$c->kota_customer}}</td>
            <td>{{$c->email_customer}}</td>
            <td>{{$c->hp_customer}}</td>
            <td>{{$c->perusahaan_customer}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
   
