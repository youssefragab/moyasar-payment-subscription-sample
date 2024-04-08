    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/plan" class="logo d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <h3>Moyasar</h3>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/plan" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
    
                </ul>

                <div class="text-end">
                    <div class="user-guest" {!!auth()->user() ? "style='display:none'" : "" !!}>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-outline-light me-2">Login</button>
                    </div>
                    <div class="user-auth" {!!auth()->user() ? "style='display:flex'" : "" !!}>
                        <span class="user-name">{{auth()->user() ? auth()->user()->name : ""}}</span>
                        <a href="/user/logout" class="btn btn-outline-light me-2">Logout</a>
                    </div>

                </div>
            </div>
        </div>
    </header>