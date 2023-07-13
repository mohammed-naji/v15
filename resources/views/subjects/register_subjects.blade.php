<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>

    <div class="container mt-5">
        <h1>Welcome : {{ $student->name }} Register Subject</h1>
        <form action="{{ route('register_subjects') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 3%"></th>
                        <th>Name</th>
                        <th>Hours</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                    <tr class="{{ $student->subjects->find($subject->id) ? 'table-success' : '' }}">
                        <td>
                            <input @checked($student->subjects->find($subject->id)) type="checkbox" name="sub_ids[]" value="{{ $subject->id }}">
                        </td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->hours }}</td>
                        <td><a href="{{ route('remove_subject', $subject->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a></td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            <button class="btn btn-dark">Register</button>
        </form>
    </div>

    <script>
        let form = document.querySelector('form')
        let inputs = document.querySelectorAll('input[type=checkbox]')
        form.onsubmit = (e) => {
            let prev = false
            inputs.forEach(el => {
                if(el.checked) {
                    prev = true
                }
            });

            if(!prev) {
                e.preventDefault()
                alert('Please select Subject')
            }
        }

        let tr = document.querySelectorAll('tbody tr')
        setTimeout(() => {
            tr.forEach(el => {

                // console.log(el.querySelector('input'));

                if(el.querySelector('input').checked) {
                    el.querySelector('a').classList.add('disabled')
                }
                // link.classList.add('disabled')
            })
        }, 5000);
    </script>
</body>
</html>
