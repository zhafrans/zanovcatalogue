

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login ZANOV Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    .spinner-border {
        display: none;
    }
    .loading {
        cursor: not-allowed;
        pointer-events: none;
    }
</style>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                
                                <div class="card-body">
                                    @if(session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" placeholder="Username" name="username" required autofocus>
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required>
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" id="loginBtn">
                                                <span>Login</span>
                                                <span class="spinner-border spinner-border-sm ml-2" role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <!-- Add your footer content here -->
        </div>
    </div>
    <!-- Add your scripts here -->
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('loginBtn').addEventListener('click', function () {
            var button = this;
            button.querySelector('span').style.display = 'none';
            button.querySelector('.spinner-border').style.display = 'inline-block';
            button.classList.add('loading');

            // Tambahan: Contoh penggunaan setTimeout untuk mensimulasikan tindakan login
            setTimeout(function () {
                // Gantilah dengan aksi login yang sesungguhnya di sini
                // Misalnya: document.forms[0].submit();
                // Setelah login berhasil, Anda dapat menghapus indikator putar
                button.querySelector('span').style.display = 'inline-block';
                button.querySelector('.spinner-border').style.display = 'none';
                button.classList.remove('loading');
            }, 2000); // Contoh waktu simulasi: 2000 milidetik (2 detik)
        });
    });
</script>

</html>
