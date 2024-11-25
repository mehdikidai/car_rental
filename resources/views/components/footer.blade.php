<div>
    <div class="footer">
        <x-container>
            <div class="boxs">

                <div class="box">
                    <x-logo/>
                    <p>
                        @lang('t.footer.text_footer')
                    </p>
                </div>
                <div class="box">
                    <h2>@lang('t.footer.Links')</h2>
                    <ul>
                        <li><a href="{{ route('frontend.home') }}">@lang('t.home')</a></li>
                        <li><a href="{{ route('frontend.cars') }}">@lang('t.cars')</a></li>
                        <li><a href="#">@lang('t.contact')</a></li>
                        
                    </ul>
                </div>
                <div class="box">
                    <h2>@lang('t.footer.social media')</h2>
                    <ul>
                    
                        <li><a href="#"><i class="material-symbols-outlined">phone</i>0601010101</a></li>
                        <li><a href="#"><i class="material-symbols-outlined">mail</i>{{ config('app.email') }}</a></li>
                        
                       
                        
                    </ul>
                </div>
                <div class="box"></div>

            </div>
        </x-container>

    </div>

</div>
