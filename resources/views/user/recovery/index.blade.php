@extends('layouts.user')
<style>
    .sidenav {
        height: 100%;
        width: 0px;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 8px 8px 8px 16px;
        text-decoration: none;
        font-weight: bold;
        font-size: 15px;
        color: #111010;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #015697;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 15px;
        margin-left: 20px;
    }

    .wallettext {
        font-size: 18px;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1605px) {
        .wallet-area {
            margin: auto;
            width: 60%;
        }

        .tranx-area {
            margin: auto;
            width: 80%;
        }
    }

    @media screen and (max-height: 480px) {
        .sidenav {
            padding-top: 9px;
        }

        .sidenav a {
            font-size: 13px;
        }

        .wallet-area {
            width: 100%;
        }

        .tranx-area {
            width: 100%;
        }

        .wallettext {
            font-size: 12px;
        }
    }
</style>
@section('contents')
    <div class="container-fluid">


        <div class="row content">


            <div class="col-sm-12">
                <div class="card my-4" style="background-color:#fff; color:#111010">
                    <!--<h5 class="card-header bg-primary text-white">Dashboard</h5>-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-3" style="padding-left: 20px; display:none;">
                                <h2>
                                    <font color="#111010" size="4"><b>Hello,
                                            {{ user()->name }}</b><br />({{ user()->email }})</font>
                                </h2>
                                <br />
                                <select id="chooserate" class="form-control form-control-lg"
                                    style="background: #fff;width:50%;">
                                    <option value="40">TBC</option>
                                    <option value="41">Kringle</option>
                                    <option value="42">USD</option>
                                </select>


                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6 py-4">
                                <button
                                    style="font-size:15px;cursor:pointer;right:0;float:right;font-weight:bold;background-color:#3d5acb;margin-left:20px;padding:4px 12px;border-width:0;border-radius:15px;color:#fff;"
                                    onclick="openNav()">&#9776; MENU</button>

                                <div id="mySidenav" class="sidenav text-center">
                                    <a href="javascript:void(0)" class="closebtn"
                                        style="background-color:#3d5acb; border-radius:15px; border-width:0;padding:4px 8px; color:#fff;"
                                        onclick="closeNav()">&times; CLOSE</a>
                                    <h2 class="mt-4" style="color: #111010; font-size: 30px;">Menu</h2>
                                    <p>{{ user()->email }}</p>
                                    <a href="{{ route('user.dashboard') }}" class="mt-4"><i class="fa fa-home"
                                            aria-hidden="true"></i> HOME</a>
                                    <hr
                                        style="width: 80%; background-color:#dbdbdb; height:0.2px;  border-width:0; margin: auto; text-align:center;" />
                                    <a href="{{ route('user.updates.index') }}" class="mt-2"><i class="fa fa-bell"
                                                aria-hidden="true"></i> UPDATES</a>
                                        <hr
                                            style="width: 80%; background-color:#dbdbdb; height:0.2px;  border-width:0; margin: auto; text-align:center;" />
                                    <a href="{{ route('user.explorer.index') }}" class="mt-2"><i class="fa fa-search"></i>
                                        EXPLORER</a>
                                    <hr
                                        style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0; margin: auto; text-align:center;" />
                                    <a href="{{ route('user.recovery.index') }}" class="mt-2"><i class="fa fa-paper-plane"
                                            aria-hidden="true"></i> SUBMIT BALANCE RECOVERY REQUEST</a>
                                    <hr
                                        style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0; margin: auto; text-align:center;" />
                                    <a class="mt-2 logout"><i class="fa fa-sign-out"></i> LOGOUT</a>
                                    <hr
                                        style="width: 80%; background-color:#dbdbdb; height:0.2px; border-width:0;margin: auto; text-align:center;" />
                                </div>
                            </div>

                        </div>
                        <div class="row mt-12">
                            <div class="col-md-12">
                                @if ($recoveries !== 'none')
                                    @if ($recoveries->status == 0)
                                        <div class="wallet-area">
                                            <h1 style="color:#333333;font-size:30px;">You have successfully submited you TBC
                                                recovery request, reviewing by admin. This might take upto 24 hours</h1>
                                        </div>
                                    @elseif ($recoveries->status == 1)
                                        <div class="wallet-area">
                                            <h1 style="color:#333333;font-size:30px;">We have reveiwed your request, check
                                                your balance. If you have questions contact the online support.</h1>
                                        </div>
                                    @endif
                                @elseif ($recoveries == 'none')
                                    <div class="wallet-area ">
                                        <div class="" style="background-color:#ebecc0; padding: 4px;">
                                            <p>
                                                <b> Attention! </b><br />
                                                <br />

                                                You may only request a balance update once and upon approval your balance
                                                correction will be final. Please ensure that you have entered factual
                                                information to the best of your knowledge. This system in NOT automated and
                                                will be reviewed, dishonest requests will be denied immediately with no
                                                further recourse. You may select the currency of your choice and enter that
                                                amount, you will be shown the TBC and kringle values of that currency.
                                            </p>
                                            <br />
                                            <p>
                                                You must fill in your currency, balance request and notes. The notes section
                                                should be used to details where your TBC or Kirngles were acquired from. For
                                                large request, we will base approval on the notes provided. Please provide
                                                as much information as possible.
                                            </p>

                                        </div>
                                        <div id="pageContent">
                                            <form action="{{ route('user.recovery.new') }}" method="post" class="mt-4"
                                                id="recoveryForm">
                                                {{ csrf_field() }}

                                                <div class="input-group input-group-lg input-group-round mb-4">
                                                    <div class="input-group-inner center" style="width: 80%; margin:auto;">
                                                        <label>Name</label>
                                                        <input type="text" name="name" id="name" value=""
                                                            class="form-control form-control-lg" placeholder="Name"
                                                            required>
                                                        <span>
                                                            @error('name')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                        <div class="input-focus-bg"></div>
                                                    </div>
                                                </div>

                                                <div class="input-group input-group-lg input-group-round mb-4">
                                                    <div class="input-group-inner center" style="width: 80%; margin:auto;">
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email" value=""
                                                            class="form-control form-control-lg" placeholder="Email"
                                                            required>
                                                        <span>
                                                            @error('email')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                        <div class="input-focus-bg"></div>
                                                    </div>
                                                </div>

                                                <div class="input-group input-group-lg input-group-round mb-4">
                                                    <div class="input-group-inner center" style="width: 80%; margin:auto;">
                                                        <label>Currency</label>
                                                        <input type="text" name="selectedcurrency" id="selectedcurrency"
                                                            value="" class="form-control form-control-lg"
                                                            placeholder="Selected Currency" required>
                                                        <span>
                                                            @error('selectedcurrency')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                        <div class="input-focus-bg"></div>
                                                    </div>
                                                </div>

                                                <div class="input-group input-group-lg input-group-round mb-4">
                                                    <div class="input-group-inner center" style="width: 80%; margin:auto;">
                                                        <label>Proposed Balance</label>
                                                        <input type="text" name="proposedbal" id="proposedbal"
                                                            value="" class="form-control form-control-lg"
                                                            placeholder="Proposed Balance" required>
                                                        <span>
                                                            @error('proposedbal')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                        <div class="input-focus-bg"></div>
                                                    </div>
                                                </div>

                                                <div class="input-group input-group-lg input-group-round mb-4">
                                                    <div class="input-group-inner center"
                                                        style="width: 80%; margin:auto;">
                                                        <label>Supporting information</label>
                                                        <textarea name="supportinfo" id="supportinfo" value="" class="form-control form-control-lg"
                                                            placeholder="Supporting Information" required></textarea>
                                                        <span>
                                                            @error('supportinfo')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>

                                                    </div>
                                                </div>


                                                <button type="submit" style="width: 40%; border-radius: 10px;"
                                                    class="btn btn-primary bg-green-500">SUBMIT</button>

                                            </form>
                                        </div>

                                    </div>
                                @endif



                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "350px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>


    <script>
        $(document).on('submit', '#recoveryForm', function(e) {
            e.preventDefault();
            var name = $('#name').val() * 1;
            var email = $('#email').val();
            var selectedcurrency = $('#selectedcurrency').val();
            var proposedbal = $('#proposedbal').val() * 1;
            var supportinfo = $('#supportinfo').val();

            //check the currency code
            var error = null;
            //check min and max transfer

            if (error === null) {
                var form = $(this);
                var formData = new FormData(this);

                var submitButton = $(this).find('button[type="submit"]');
                submitButton.addClass('relative disabled');
                submitButton.append('<span class="button-spinner"></span>');
                submitButton.prop('disabled', true);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,

                    success: function(response) {

                        window.location.reload();

                        loadPage(form.attr('action'), submitButton, '#pageContent');

                        $('html, body').animate({
                            scrollTop: 0 + 100
                        }, 800);
                        toastNotify('success', response.message);




                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;

                        if (errors) {
                            $.each(errors, function(field, messages) {
                                var fieldErrors = '';
                                $.each(messages, function(index, message) {
                                    fieldErrors += message + '<br>';
                                });
                                toastNotify('error', fieldErrors);
                            });
                        } else {
                            toastNotify('error', 'An Error occured, try again later');
                        }


                    },
                    complete: function() {
                        submitButton.removeClass('disabled');
                        submitButton.find('.button-spinner').remove();
                        submitButton.prop('disabled', false);

                    }
                });
            } else {

                toastNotify('error', error);

            }

        });
    </script>
@endsection
