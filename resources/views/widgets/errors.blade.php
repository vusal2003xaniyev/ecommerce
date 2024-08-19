@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Uğurlu!</strong> Əməliyyat uğurla həyata keçirildi !
    </div>
@endif
@if(session('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Uğurlu!</strong> Data uğurla silindi !
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Xəta!</strong> Xəta baş verdi, yenidən cəhd edin.
    </div>
@endif
@if(session('passwordError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Xəta!</strong> Şifrə səhvdir!
    </div>
@endif
@if(session('emailError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Xəta!</strong> E-poçt səhvdir!
    </div>
@endif

