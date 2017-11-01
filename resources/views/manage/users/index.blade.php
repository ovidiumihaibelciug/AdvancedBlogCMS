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
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffforhumans() }}</td>
                    <td>
                        <a href="users/{{ $user->id }}/edit" class="button is-warning is-outlined"><span class="icon"><i class="fa fa-cog"></i></span></a>
                        <a class="button is-warning is-danger"><span class="icon"><i class="fa fa-trash"></i></span></a>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
   </div>
@endsection