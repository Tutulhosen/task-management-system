<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    {{-- toster link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Header -->
    @include('layouts.header')

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    @section('main-content')
        
    @show

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (necessary for Toastr) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        // Function to show a Toastr alert
        function showToast(message, type) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                showMethod: 'slideDown',
                timeOut: 3000 // 3 seconds
            };
      
            // Type can be 'success', 'info', 'warning', or 'error'
            toastr[type](message);
        }
      </script>
       <script>
        // alert();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
      </script>
    <script>
        // Ensure sidebar toggle works on mobile
        const sidebar = document.getElementById('sidebar');
        const mobileToggle = document.getElementById('mobileToggle');
        const desktopToggle = document.getElementById('desktopToggle');
        const mobileToggleSidebar = document.getElementById('mobileToggleSidebar');

        mobileToggle.addEventListener('click', function () {
            console.log('Mobile toggle clicked'); // Debugging line
            sidebar.classList.toggle('visible');
        });

        desktopToggle.addEventListener('click', function () {
            console.log('Desktop toggle clicked'); // Debugging line
            sidebar.classList.toggle('collapsed');
        });

        mobileToggleSidebar.addEventListener('click', function () {
            console.log('Mobile sidebar toggle clicked'); // Debugging line
            sidebar.classList.toggle('visible');
        });
    </script>

    <script>
        // Initialize CKEditor with custom height
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(editor => {
                console.log('Editor was initialized', editor);

                // Optional: Add dynamic styles if needed
                editor.ui.view.editable.element.style.height = '250px';
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    </script>

    @yield('scripts');
</body>

</html>
