<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .err {
            font-size: 12px;
            color: #979797
        }

        .err span {
            display: inline-block;
            width: 6px;
            height: 6px;
            background: #979797;
            border-radius: 50%
        }

        .check span {
            background: #1ac15d
        }

        .passwrapper {
            position: relative;
        }

        .passwrapper i {
            position: absolute;
            right: 10px;
            top: 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Basic Form</h1>

        {{-- @dump($errors)
        @dump($errors->any()) --}}

        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form method="post" action="{{ route('form2_data') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control name-field @error('name') is-invalid @enderror" name="name">
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="passwrapper">
                    <input type="password" placeholder="Password" class="form-control password-field @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                    @error('password')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <i class="fas fa-eye"></i>
                </div>





                {{-- <div class="err small"><span></span> Small Letter</div>
                <div class="err capital"><span></span> Capital Letter</div>
                <div class="err special"><span></span> Special Charachter</div>
                <div class="err eight"><span></span> 8 Charachter</div> --}}
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" placeholder="Password" class="form-control password-field" name="password_confirmation">
            </div>

            {{-- <div class="mb-3">
                <label>Email</label>
                <input type="email" placeholder="Email" class="form-control" name="email">
            </div> --}}

            <button class="btn btn-success btn-send">Send</button>
        </form>
    </div>


    <script>
        let icon = document.querySelector('.passwrapper i')
        let password = document.querySelector('.password-field')

        icon.onclick = () => {
            if(password.type == 'password') {
                password.type = 'text'
                icon.classList.remove('fa-eye')
                icon.classList.add('fa-eye-slash')
            }else {
                password.type = 'password'
                icon.classList.add('fa-eye')
                icon.classList.remove('fa-eye-slash')
            }
        }
    </script>


    <script>

        let field = document.querySelector('.name-field')
        let pass = document.querySelector('.password-field')
        let btn = document.querySelector('.btn-send')

        field.onkeyup = function() {
            if(field.value.length > 3 && field.value.length < 20) {
                btn.removeAttribute('disabled')
                field.classList.add('is-valid')
                field.classList.remove('is-invalid')
            }else {
                btn.setAttribute('disabled', true)
                field.classList.add('is-invalid')
                field.classList.remove('is-valid')
            }
        }

        pass.onkeyup = () => {
            if(/[A-Z]/.test(pass.value)) {
                document.querySelector('.capital').classList.add('check')
            }else {
                document.querySelector('.capital').classList.remove('check')
            }
        }

    </script>
</body>
</html>
