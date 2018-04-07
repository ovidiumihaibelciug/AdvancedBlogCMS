@extends ('layouts.manage')
@section('content')
   <div class="flex-container">
       <div class="columns">
           <div class="column">
               <div class="title">
                   Manage Users
               </div>
           </div>

           <div class="column">
               <a href="{{ route('users.create') }}" class="button is-success is-outlined is-pulled-right "><span class="icon"><i class="fa fa-user-plus"></i></span>&nbsp; Create new user</a>
           </div>
       </div>
       <hr>

        <table class="table is-fullwidth">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffforhumans() }}</td>
                        <td>
                            <a href="users/{{ $user->id }}/edit" class="button is-warning is-outlined"><span class="icon"><i class="fa fa-cog"></i></span></a>
                            <a class="button is-warning is-danger" data-id="{{$user->id}}" @click="confirm"><span class="icon" data-id="{{$user->id}}"><i class="fa fa-trash" data-id="{{$user->id}}"></i></span></a>
                        </td>                     
                    </tr>
                 @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
   </div>
@endsection

@section('scripts')
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
@endsection