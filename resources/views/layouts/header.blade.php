<header>
<div class="header">
    <div class="img-header">
    <a href="{{ url('/home')}}"><img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3.png" alt=""></a>
    </div>
    <div class="search-header">
    <input type="search" name="search-post" id="search-post" placeholder="Search">
    </div>
    <div class="section-header">
        <a href="{{ url('/profile')}}"><img src="{{asset('image/'. Auth::user()->profile_photo_path)}}" alt=""></a>
        <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#search-post').change(function(e){
            var inputValue = $(this).val()
            console.log(inputValue)
            axios.post('/showpost',{'Searchvalue': inputValue},{headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"}}).then(function(res){
                console.log(res.data)


            })
        })
    })
</script>

</header>
