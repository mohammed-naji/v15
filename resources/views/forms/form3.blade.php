<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        button i {
            margin-right: 10px
        }
        .move i {
            animation: move 1.5s ease;
        }
        @keyframes move {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(33px, -30px);
            }
        }

        textarea {
            resize: none
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Personal Form</h1>
        <form action="{{ route('form3_data') }}" method="post">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', 'Mohammed Naji') }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="date" placeholder="Age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" />
                @error('age')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Gender</label> <br>
                <input id="male" type="radio" @checked(old('gender') == 'Male') name="gender" value="Male" />
                <label for="male">Male</label>
                <br>
                <label><input type="radio" @checked(old('gender') == 'Female') name="gender" value="Female" /> Female</label>
                @error('age')
                    <br><small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Education</label>
                <select class="form-select @error('education') is-invalid @enderror" name="education">
                    {{-- <option disabled selected hidden> -- Select -- </option> --}}
                    <option value=""> -- Select -- </option>
                    <option value="Diploma">Diploma</option>
                    <option value="Bacholer">Bacholer</option>
                    <option value="Master">Master</option>
                </select>
                @error('education')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Interest </label> <br>

                <label><input @checked(old('interest') !== null && in_array('Football', old('interest'))) type="checkbox" value="Football" name="interest[]" /> Football</label> <br>
                <label><input @checked(old('interest') !== null && in_array('Basketball', old('interest')))  type="checkbox" value="Basketball" name="interest[]" /> Basketball</label> <br>
                <label><input @checked(old('interest') !== null && in_array('Vollyball', old('interest')))  type="checkbox" value="Vollyball" name="interest[]" /> Vollyball</label> <br>
                <label><input @checked(old('interest') !== null && in_array('Codding', old('interest')))  type="checkbox" value="Codding" name="interest[]" /> Codding</label> <br>
                @error('age')
                    <br><small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea rows="4" placeholder="Bio" class="form-control @error('bio') is-invalid @enderror" name="bio">{{ old('bio') }}</textarea>
                @error('bio')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-dark"><i class="fa-regular fa-paper-plane"></i> Send</button>

        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
          selector: 'textarea'
        });
    </script>
    <script>
        document.querySelector('.btn').onclick = (e) => {
            e.preventDefault();
            document.querySelector('.btn').classList.add('move')


            setTimeout(() => {
                document.querySelector('form').submit()
            }, 1300);

        }
    </script>
</body>
</html>
