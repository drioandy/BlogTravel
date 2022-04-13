<div class="col-lg-3">
    <!-- Search widget-->
    <!-- <div class="card mb-4 border border-success rounded">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />

                <button class="btn btn-primary mt-2" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div> -->
    <!-- Categories widget-->
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active font-weight-bold  disabled">
            Category
        </a>
        @foreach($categories as $category)
            <a href="{{route('post.category',$category->url_key)}}" class="list-group-item list-group-item-action">{{$category->name}}</a>


        @endforeach
    </div>

    <!-- Side widget-->
    <!-- <div class="card mb-4 border border-danger rounded">
        <div class="card-header">Featured Posts
            <a href="" class="float-right ">Read More</a>
        </div>
        <div class="card-body">
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://images.unsplash.com/photo-1632041398953-1ec058af29bb?ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDE5fDZzTVZqVExTa2VRfHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://images.unsplash.com/photo-1611465577672-8fc7be1dc826?ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDQ4fDZzTVZqVExTa2VRfHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>


        </div>
    </div> -->
</div>
