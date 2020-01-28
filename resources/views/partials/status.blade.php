<div class="card gedf-card status-{{ $status['id'] }}">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-between align-items-center">
        <div class="mr-2">
          <img
            class="rounded-circle"
            width="45"
            src="https://api.adorable.io/avatars/90/{{ $status['owner']['id']}}.png"
            alt=""
          />
        </div>
        <div class="ml-2">
          <div class="h5 m-0">{{$status['owner']['name']}}</div>
          <div class="h7 text-muted">
            {{date('d/m/Y H:i:s', strtotime($status['created_at']))}}
          </div>
        </div>
      </div>
      <div>
        <div class="dropdown">
          <button
            class="btn btn-link dropdown-toggle"
            type="button"
            id="gedf-drop1"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fa fa-ellipsis-h text-secondary"></i>
          </button>
          <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="gedf-drop1"
          >
            <a
              class="dropdown-item text-danger status-delete"
              data-id="{{ $status['id'] }}"
              href="#"
              >Delete</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <p class="card-text">{{$status['message']}}</p>
  </div>
  <div class="card-footer">
    @if($status['is_recommended'] === true)
    <a
      href="#"
      data-id="{{ $status['id'] }}"
      data-liked="true"
      class="card-link status-like text-danger"
      ><i class="fa fa-heart"></i
    ></a>
    @else
    <a
      href="#"
      data-id="{{ $status['id'] }}"
      data-liked="false"
      class="card-link status-like text-secondary"
      ><i class="fa fa-heart-o"></i
    ></a>
    @endif

    <!-- <a href="#" class="card-link text-secondary"
      ><i class="fa fa-comment"></i
    ></a> -->
  </div>
</div>
