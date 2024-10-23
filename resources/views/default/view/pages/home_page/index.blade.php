<x-layout.user>
    
    <link href="{{ asset('assets/user/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/slick.theme.css') }}" rel="stylesheet">

    <style>
        .slider { width: 80%; margin: auto; }
        .slide { text-align: center; }
        .slide img { width: 100px; height: 100px; }
    </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ asset('assets/user/js/slick.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.x.x/cdn.min.js" defer></script>


        <div class="body-tag"  x-data="userSlider()" x-init="init()">



            <div class="slider" x-ref="slider">
                @foreach($users as $user)
                    <div class="slide">
                        <h3>{{ $user->first_name }}</h3>
                    </div>
                @endforeach
            </div>
            
            
            <button @click="load_users()">Load More</button>
            
            <script>
            function userSlider() {
                return {
                    users: @json($users), // Initial users passed from the backend
                    offset: 4, // Initial offset
            
                    init() {
                        $(this.$refs.slider).slick({
                            infinite: false,
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        });
                    },
            
                    load_users() {
    console.log('Loading more users...'); // Debug log
    $.ajax({
        url: '/dashboard/load',
        type: 'GET',
        data: { offset: this.offset },
        success: (data) => {
            console.log('Data received:', data); // Debug log
            this.users.push(...data.users);
            this.offset += 4;

            this.$nextTick(() => {
                data.users.forEach(user => {
                    $(this.$refs.slider).slick('slickAdd', `
                        <div class="slide">
                            <h3>${user.first_name}</h3>
                        </div>
                    `);
                });
            });
        }
    });
}

                }
            }
            </script>

        </div>





</x-layout.user>
