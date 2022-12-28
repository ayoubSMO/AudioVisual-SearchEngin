<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAW Search</title>
    <link rel="icon" href={{ asset('image/favicon.jpg') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b0f29e9bfe.js" crossorigin="anonymous"></script>

    <script defer src={{ asset('js/main.js') }}></script>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <ul>
                <li>
                    <a class="link" href="">Gmail</a>
                </li>
                <li>
                    <a class="link" href="">Images</a>
                </li>
                <li>
                    <div class="circle-shadow">
                        <a class="menu-icon" href=""><i class="fas fa-bars"></i></a>
                    </div>
                </li>
                <li>
                    <div class="circle-shadow">
                        <a class="user-icon" href=""><span>J</span></a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <section class="content-section">
        <div class="content-wrapper">
            <img class="logo-img" src="{{ asset('image/logo.png') }}" alt="Google Logo Image">
            <div class="search-bar">
                <i class="fas fa-search"></i>

                <input id="search-input" class="search-input" type="text">
                <a href="/upload"><img src="{{asset('image/favicon.jpg')}}" height="20px" width="20px"></a>
                <a href="/upload"><img src="{{asset('image/voice.png')}}" height="20px" width="20px"></a>
                
            </div>
            <div class="search-btns">
                <button class="lucky-search-btn"><a href="/upload" class="btn-get-started scrollto" data-toggle="modal" data-target="#ModalVoice">Jaw search</a></button>
                <button class="lucky-search-btn"><a href="/upload" class="btn-get-started scrollto" data-toggle="modal" data-target="#ModalCreate">Search with image</a></button>
            </div>
            <div class="language">
                <p>Google Offered in: <a href="">Arabic</a></p>
            </div>
        </div>
        @include('SearchEngin.modal.imageSearchModel')
        @include('SearchEngin.modal.voiceSearchModal')
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content upper-footer">
            <p>Morocco-MEKNES SAFI 06</p>
        </div>
        <div class="footer-content lower-footer">
            <ul class="lower-left-footer">
                <li>
                    <a href="/AI">MAgiiiiic !!</a>
                </li>
                <li>
                    <a href="">Advertising</a>
                </li>
                <li>
                    <a href="">Business</a>
                </li>
                <li>
                    <a href="">How Search Works</a>
                </li>
            </ul>
            <ul class="lower-right-footer">
                <li>
                    <a href="">Privacy</a>
                </li>
                <li>
                    <a href="">Terms</a>
                </li>
                <li>
                    <a href="">Settings</a>
                </li>
            </ul>
        </div>

    </footer>

</body>
</html>