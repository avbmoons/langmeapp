@extends('layouts.admin')

@section('title', 'Admin.Notifications')

@section('content')
<div class="admin-content">
  <section class="head-block">
    <div class="title-block">
      <div class="title-box">
        <p class="title">Notifications to users</p>
      </div>
    </div>
    <div class="services-block">
      <div class="services-box">
        <div class="search-block">
          <div class="search-box">
            <input type="text" class="input-search" placeholder="Search"/>
            <a href="">
              <button class="btn-search">
                <img src="{{ Vite::asset('resources/images/icons/icon-Search.svg') }}" alt="search">
              </button>
            </a>
          </div>
        </div>
        <div class="add-block" >
          <div class="add-box">            
              <button class="btn-add">
                <a href="{{ route('admin.notifications.create')}}">
                <svg class="img-add" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M16.875 16.875V5.25H19.125V16.875H30.75V19.125H19.125V30.75H16.875V19.125H5.25V16.875H16.875Z" fill="#1B1357"/>
                </svg>
                </a>
              </button>            
            <p class="lable-add">Add notification</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="table-block">
    <table>
      <thead>
        <tr>
          <th class="th-id">User ID</th>   
          <th>User</th>       
          <th>Type</th>
          <th>Message</th>
          <th>Date</th>
          <th>Read At</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($notifications as $notification)
        <tr class="{{ $notification->read_at ? '' : 'table-info' }}">
          <td>{{ $notification->notifiable_id}}</td>
          <td>{{ $notification->notifiable->name}}</td>
          <td>{{ class_basename($notification->type) }}</td>
          <td>{{ $notification->data['message'] ?? 'No data' }}</td>
          {{-- <td>{{ $notification->created_at->diffForHumans() }}</td> --}}
          <td>{{ $notification->created_at->format('d.m.Y H:i') }}</td>
          <td>{{ $notification->read_at }}</td>
        </tr>
        @empty
          <tr>
            <td colspan="?">No notifications</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="custom-pagination">
      {{ $notifications->links() }}
    </div>

  </section>
</div>
    
@endsection

{{-- @push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/mails/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Удаление отменено");
                }
            });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush --}}
