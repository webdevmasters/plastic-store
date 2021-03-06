@extends('webapp.layouts.main')
@section('title','Pitanja i odgovori')
@section('content')

    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb container  =======-->
                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}" >{{__('messages.home')}}</a></li>
                                <li >{{__('messages.faqs')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>

    <div class="page-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-wrapper">
                        <h2 style=" text-align: center;" >{{__('messages.faqs')}}</h2>
                        <br>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseOne" aria-expanded="true" class="btn btn-link" data-target="#collapseOne" data-toggle="collapse">
                                            {{__('messages.how.to.find')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>

                                <div aria-labelledby="headingOne" class="collapse show" data-parent="#accordion"
                                     id="collapseOne">
                                    <div class="card-body">
                                        <p>Do proizvoda koji tražite možete doći na dva načina:</p>
                                        <p>1. Pregledom kategorija iz menija "Kategorije proizvoda"</p>
                                        <p>2. Pretragom</p>
                                        <p>1. Pregled kategorija podrazumeva izbor kategorija iz glavnog menija
                                            proizvoda. Na primer, ako želite da kupite saksiju iz menija
                                            "Saksije i bašta" kada naiđete mišom na navedenu kategoriju otvoriće vam se niz
                                            podkategorija gde možete odabrati željeni tip saksije.
                                        </p>
                                        <p>2. Pretraga podrazumeva pronalaženja proizvoda na osnovu karakteristične ključne
                                            reči - najčešće naziv, model ili robna marka. Upišite ključne reči u predviđeno
                                            polje za pretragu i kliknite dugme za pretragu sa gornje desne strane. Dobićete
                                            listu proizvoda koji
                                            odgovaraju zadatim ključnim rečima.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseTwo" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseTwo" data-toggle="collapse">
                                            {{__('messages.how.to.buy')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="collapseTwo">
                                    <div class="card-body">
                                        <p>1. Registrujte se</p>
                                        <p>2. Izaberite proizvode koje želite da kupite</p>
                                        <p>3. Popunite i pošaljite narudžbenicu</p>
                                        <p>Da biste mogli da naručujete proizvode morate biti registrovani korisnik.
                                            Registracija podrazumeva ispravno popunjavanje odgovarajućeg formulara. Klik
                                            ovde da se registrujete</p>
                                        <p>Izaberite proizvode koje želite da kupite, tako što ćete ih ubaciti u korpu.
                                            Proizvode ubacujete u korpu klikom na dugme 'Dodaj u korpu' ispod željenog
                                            proizvoda. (vidi Šta je korpa?)</p>
                                        <p>Kada završite sa izborom proizvoda, otvorite stranu za pregled korpe i kliknite
                                            dugme 'Završi kupovinu'.</p>
                                        <p>Popunite formular za naručivanje i kliknite dugme 'Potvrdi kupovinu'. Nakon toga
                                            će Vam stići mejl sa podacima o porudžbini i informacijama o dostavi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseThree" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseThree" data-toggle="collapse">
                                            {{__('messages.what.is.cart')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="collapseThree">
                                    <div class="card-body">
                                        <p>Korpa predstavlja Internet servis za kupovinu, koji Vam omogućava da kupujete po
                                            istom principu kao i sa 'pravom korpom' u prodavnici. Korpa služi da izaberete
                                            proizvode koje želite da kupite. Dok pregledate proizvode na sajtu možete ih
                                            ubaciti u korpu klikom na dugme 'Dodaj u korpu'. Na taj način izabrani proizvodi
                                            biće zapamćeni dok pregledate sajt. Ubacivanje proizvoda u korpu Vas ne
                                            obavezuje da
                                            taj proizvod kupite, a moguće je i izbacivanje proizvoda iz korpe. U svakom
                                            trenutku možete pregledati sadržaj svoje korpe klikom na ikonicu korpa koje
                                            se gornje desne strane sajta. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseFour" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseFour" data-toggle="collapse">{{__('messages.how.to.pay')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingFour" class="collapse" data-parent="#accordion" id="collapseFour">
                                    <div class="card-body">
                                        <p>Prilikom naručivanja možete izabrati način plaćanja. Imate tri mogućnosti:</p>
                                        <p>1. Pouzećem - proizvode koje ste naručili plaćate kuriru kada Vam ih donese.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseFive" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseFive" data-toggle="collapse">
                                            {{__('messages.how.to.receive')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingFive" class="collapse" data-parent="#accordion"
                                     id="collapseFive">
                                    <div class="card-body">
                                        <p>U zavisnosti od raspoložive količine određenog artikla i mogućnosti njegovog
                                            nabavljanja, a u skladu sa našom poslovnom politikom, očekivani rok isporuke
                                            proizvoda iz naše ponude je do 7 radnih dana. Detaljan opis uslova isporuke pogledajte
                                            <a href="{{route('show.selling.terms')}}">ovde</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSix">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseSix" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseSix" data-toggle="collapse">
                                            {{__('messages.how.to.check')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingSix" class="collapse" data-parent="#accordion" id="collapseSix">
                                    <div class="card-body">
                                        <p>Ulogujte se na svoj nalog i kliknite link 'Moj nalog', a potom na 'Moje porudzbine' gde možete videti status vaše porudžbine.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSeven">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseSeven" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseSeven" data-toggle="collapse">{{__('messages.what.is.registration')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingSeven" class="collapse" data-parent="#accordion" id="collapseSeven">
                                    <div class="card-body">
                                        <p>Registracijom kreirate svoj nalog za kupovinu u našoj Internet prodavnici.
                                            Registracija podrazumeva popunjevanje formulara sa osnovnim kontakt podacima
                                            koji služe za potvrdu i slanje narudžbe. Tom prilikom birate i lozinku koju ćete
                                            koristiti za pristup svom nalogu. Privatnost podataka je zagarantovana. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingEight">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseEight" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseEight" data-toggle="collapse">
                                            {{__('messages.how.to.change.pswd')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingEight" class="collapse" data-parent="#accordion" id="collapseEight">
                                    <div class="card-body">
                                        <p>Ulogujte se na svoj nalog i kliknite link 'Moj nalog', a zatim na link
                                            'Korisnički podaci'. U formular koji Vam
                                            se pojavi potrebno je da upišite novu lozinku i potvrdite je tako što ćete je
                                            ponovo upisati u predviđeno polje ispod. Zatim kliknite dugme 'Sačuvaj promene'
                                            kako biste trajno sačuvali izmenu. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingNine">
                                    <h5 class="mb-0">
                                        <button aria-controls="collapseNine" aria-expanded="false" class="btn btn-link collapsed" data-target="#collapseNine" data-toggle="collapse">
                                            {{__('messages.forgot.pswd')}}
                                            <span> <i class="fa fa-chevron-down"></i><i class="fa fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div aria-labelledby="headingNine" class="collapse" data-parent="#accordion" id="collapseNine">
                                    <div class="card-body">
                                        <p>Na stranici za prijavu na sajt postoji link za zaboravljenu lozinku.
                                            Klikom na link otvara Vam se forma za unos email adrese na koju će biti poslat
                                            link za unos nove šifre.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
