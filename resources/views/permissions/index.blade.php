@extends ('layouts.manage')
@section('content')
   <div class="flex-container">
       <div class="columns">
           <div class="column">
               <div class="title">
                   Manage Permissions
               </div>
           </div>

           <div class="column">
               <a href="{{ route('permissions.create') }}" class="button is-success is-outlined is-pulled-right "><span class="icon"><i class="fa fa-user-plus"></i></span>&nbsp; Create new permission</a>
           </div>
       </div>
       <hr>

        <table class="table is-fullwidth">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td><a href="{{route('permissions.show', $permission->id)}}">{{ $permission->display_name }}</a></td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="permissions/{{ $permission->id }}/edit" class="button is-warning is-outlined"><span class="icon"><i class="fa fa-cog"></i></span></a>
                        </td>                     
                    </tr>
                 @endforeach
            </tbody>
        </table>
   </div>
@endsection

{{-- @section('scripts')
    <script>
        var app  = new Vue({
            el: '#app',
            methods: {
                confirm(e) {
                    let userId = e.target.dataset.id;   
                    this.$dialog.confirm({
                        message: "This user will be deleted. Continue on ths task?",
                        onConfirm: () => {                              
                            axios.delete('/manage/users/'+ userId).then(() => {
                                this.$toast.open('User deleted');
                                location.reload();
                            }).catch(err => {
                                console.log(err);
                                this.$toast.open('There was a problem. Please Try again!');                                                               
                            })
                        }
                    })
                },
            }
        });
    </script>
@endsection --}}