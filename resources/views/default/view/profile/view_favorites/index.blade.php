<x-layout.user>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Information Panel</title>
        <style>
            .panel {
                border: 1px solid #ddd;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 900px;
                margin: 20px auto;
            }

            .panel h2 {
                margin-bottom: 15px;
                text-align: center;
                color: #333;
            }

            .form-row {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 10px;
            }

            .form-group {
                flex: 1; /* Make each input field take up equal space */
            }
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
                color: #555;
            }
            .form-group input, .form-group select {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
            }
            .form-group textarea {
        width: 100%; /* Adjust this to 100% or any desired percentage */
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f7f7f7;
        height: 100px;
    }
    .form-group {
                flex: 1;
                text-align: center;
            }
            .form-group input[type="file"] {
                display: block;
                margin: 0 auto;
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f7f7f7;
            }
            .form-group label {
                margin-bottom: 5px;
                display: block;
                font-weight: bold;
                color: #555;
            }

            /* Initially hide drinking and smoking habit fields */
            .hidden {
                display: none;
            }
            .sidebar {
    width: 300px; /* Fixed width for the sidebar */
    position: sticky;
    top: 0; /* Make the sidebar sticky at the top when scrolling */
    height: 100vh; /* Full height of the viewport */
    background-color: #f5f5f5; /* Optional background color for sidebar */
    padding: 15px;
    border-left: 1px solid #ddd; /* Optional border for separation */
}
        </style>
    </head>
    <body>
      <div class="container-fluid">
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mx-3 "> <!-- This will make 3 cards per row on medium and larger screens -->
                <div class="card my-2" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$user->first_name. ' '. $user->middle_name. ' '. $user->last_name}}</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <p>{{$user->email}}</p>
                      <p>{{$user->mobile}}</p>
                      <form action="{{ route('profiles.remove_favorite') }}" method="POST">
                        @csrf
                        <input type="hidden" name="favorite_id" value="{{$user->id}}">

                        <button class="btn text-white btn-primary" type="submit">Remove from Favorites</button>
                    </form>
                      {{-- <a href="#" class="btn text-white btn-primary">Remove from favorites</a> --}}
                    </div>
                  </div>
=            </div>
        @endforeach
    </div>
</div>

    <div class="sidebar">
        <x-common.usersidebar />
    </div>

    

    </body>
    </html>

{{-- end --}}
</x-layout.user>
