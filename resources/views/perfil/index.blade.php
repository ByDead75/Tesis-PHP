@extends('template')

@section('title', 'Perfil de Usuario')

@push('css')

@endpush

@section('content')

<div id="main-content">
    <div>
        <h2 class="card-title text-center mb-4 pb-2">Mi Perfil</h2>
    </div>

    <section class="d-flex justify-content-center align-items-center flex-column">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if(session('nombre_usuario'))
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar avatar-2xl mt-3">
                                    <img src="./assets/compiled/jpg/2.jpg" alt="Avatar">
                                </div>

                                <h3 class="mt-3"> {{ session('nombre_usuario') }}</h3>
                                
                                 
                                <p class="text-small">Junior Software Engineer</p>
                            </div>
                        @endif
                        @if(session('cedula_usuario'))
                            A
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center align-items-center flex-column">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="get">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="john.doe@example.net">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" value="083xxxxxxxxx">
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Your Birthday">
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <section >
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if(session('nombre_usuario'))
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar avatar-2xl mt-3">
                                        <img src="./assets/compiled/jpg/2.jpg" alt="Avatar">
                                    </div>

                                    <h3 class="mt-3"> {{ session('nombre_usuario') }}</h3>
                                    <p class="text-small">Junior Software Engineer</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="john.doe@example.net">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" value="083xxxxxxxxx">
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Your Birthday">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection

@push('js')

@endpush