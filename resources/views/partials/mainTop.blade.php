<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="left-phone-box text-center text-sm-left">
                    <p>Call US :<a href="#"> +371 00000000</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="lang-link text-center text-sm-right">
                    <ul>
                        <li><a href="#">LV</a></li>
                        <li><a href="#">RU</a></li>
                        <li><a href="#">ENG</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session()->has('success'))
<div class="container">
    <div class="row">
        <div class="col-12 offset-md-3 col-md-6">
            <p class="bg-success text-center text-white py-2">{{session()->get('success')}}</p>
        </div>
    </div>
</div>    
@endif