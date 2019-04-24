@if(session()->has('message'))<!--has message-->
    <div id="modal" style="
    position: fixed;
    left: 0;
    top: 0; 
    width:100%; 
    height:100%; 
    background:rgba(0,0,0,0.5); 
    display:flex; 
    justify-content:center;
    align-items:center;">
      <div class="card" style="padding:50px;">
        <div class="card-body">
        <div class="row d-flex justify-content-center">
            <i class="far fa-check-circle" style="font-size:80px; color:#51AFE1;"></i>
        </div>
        <div class="row">
        {{ session()->get('message') }}
        </div>
        </div>
      </div>
    </div>
@endif<!--has message-->