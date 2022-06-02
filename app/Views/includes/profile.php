<div class="card">
    <div class="card-header">
        <img src="https://images.unsplash.com/photo-1653256221426-67e0b6660056?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=60&raw_url=true&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=400"
            style="width:100%;height:40vh;object-fit:cover;" alt="">
    </div>
    <div class="card-body">
        <h4><?= session()->get('username') ?></h4>
    </div>
    <div class="card-foot mx-3">
        <a href="/users/carts" class="w-100">
            <button class="btn btn-success  my-2">My Cart</button>
        </a>
        <a href="/users/edit/profile" class="w-100">
            <button class="btn btn-success  my-2">Update Profile</button>
        </a>
        <a href="/users/my-order">
            <button class="btn btn-success w-100 my-2">My Order</button>
        </a>
    </div>
</div>
