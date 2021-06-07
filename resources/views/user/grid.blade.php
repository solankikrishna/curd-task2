@extends('theme.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('adduser')}}">Add User</a>
    </div>
    <div class="col-md-12">
       @if(isset($grid) && !empty($grid))
       <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Email</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($grid as $k=>$v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{$v->first_name.' '.$v->last_name}}</td>
                <td>{{$v->email}}</td>
                <td><a href="/admin/users/edit/{{ $v->id}}">Edit</a></td>
                <td><a href="javascript:deleteUser('{{ $v->id}}')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
       @endif
    </div>
</div>
<script>
function deleteUser(id){
    var resp = confirm('Are you sure you want to delete?');
    if(resp == true){
        $.ajax({
            url:'/admin/users/delete/'+id,
            type:'post',
            data:{ '_token':'{{ csrf_token() }}','id':id },
            success:function(resp){
                location.reload();
            }
        });
    }
}
</script>
@endsection