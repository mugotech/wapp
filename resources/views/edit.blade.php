<!-- Edit Modal -->
<div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form enctype="multipart/form-data" method="POST" action="{{ route('admin.post', ['id'=>$user->id] )}}">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="modalTitle">Edit and Update user profile</h5>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          @csrf
          <div class="row">
            <div class="col-md-8">
              <input id="id" type="hidden" name="id" value="{{ $user->id }}">
              <div class="form-group">
                  <label for="company" class="form-control-sm mb-0">{{ __('COMPANY NAME') }}:</label>
                  <input id="company" type="text" class="form-control form-control-sm" name="company" value="{{ $user->company }}" autofocus>
              </div> 

              <div class="form-group">
                  <label for="name" class="form-control-sm mb-0">{{ __('FIRST NAME') }}:</label>
                  <input name="name" type="text" class="form-control form-control-sm" id="name" value="{{ $user->name }}" required>
              </div>

              <div class="form-group">
                  <label for="surname" class="form-control-sm mb-0">{{ __('LAST NAME') }}:</label>
                  <input name="surname" type="text" class="form-control form-control-sm" id="surname" value="{{ $user->surname }}">
              </div>

              <div class="form-group">
                  <label for="phone" class="form-control-sm mb-0">{{ __('MOBILE NUMBER') }}:</label>
                  <input name="phone" type="tel" class="form-control form-control-sm" id="phone" value="{{ $user->phone }}">
              </div>

              <div class="form-group">
                  <label for="email" class="form-control-sm mb-0">{{ __('EMAIL ADDRESS') }}:</label>
                  <input name="email" type="email" class="form-control form-control-sm" id="email" value="{{ $user->email }}" required>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>