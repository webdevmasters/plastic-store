@extends('webapp.layouts.main')
@section('title','Informacije o dostavi')
@section('content')
    <div class="breadcrumb-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb container  =======-->

                    <div class="breadcrumb-container">
                        <nav>
                            <ul>
                                <li class="parent-page"><a href="{{url('/')}}">{{__('messages.home')}}</a></li>
                                <li>{{__('messages.delivery.info')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>
    <div class="shipping_info_section mb-50">
        <div class="container">
            <div class="row row-30">
                <h1>{{__('messages.delivery.info')}}</h1>
                <div class="page-title">
                    <h2 style="font-family: Montserrat; color: rgb(81, 81, 81); margin-top: 20px; margin-bottom: 10px; font-size: 30px; orphans: 3; widows: 3; break-after: avoid;">
                        <span style="color: rgb(51, 51, 51); text-align: justify; font-family: Abel, sans-serif; font-size: 16px;">Prodaja proizvoda od plastike se vrši tako što kupac putem našeg sajta pregleda i odabere svoje proizvode, ostavi svoje podatke i naš operater ga kontaktira putem telefona tj daje kupcu informaciju o statusu njegove porudžbenice.</span>
                    </h2>
                </div>
                <div class="static-contain" style="text-align: justify"><p>Da bi prodaja plastičnih proizvoda bila efikasna,
                        neophodno je da kupac
                        ostavi sve svoje validne podatke (adresu i broj mob telefona) kako bi dostava bila brza i sigurna.
                        Prodaja plastičnih proizvoda je jedino moguća samo na teritoriji Srbije. Zbog mogućnosti greške prilikom
                        telefonskih poručivanja proizvoda, molimo sve kupce da svoje
                        proizvode poruče isključivo preko našeg sajta. Samo za greške prilikom internet poručivanja, mi
                        snosimo odgovornost!
                    </p>
                    <p style="text-align: justify"><strong>Boje proizvoda</strong>: Ne možemo uvek garantovati za tačno
                        stanje artikala po bojama. Zbog
                        velikog izbora boja naših proizvoda od plastike, uvek se prvo konsultujemo sa kupcem ukoliko
                        određene boje nema na stanju, da li želi drugu boju ili odustaje od porudžbenice. Zato možemo
                        sigurno garantovati da nikad na svoju ruku nećemo slati proizvode kupcima ukoliko nisu određenih
                        boja koje su prvo bile poručene.</p>
                    <p><span style="line-height: 1.6em;">Postoji mogučnost da pojedine artikle nemamo trenutno na stanju i da su u procesu poručivanja!!! Stoga molimo sve kupce za strepljenje kako bi proizvodi mogli nesmetano doći do njih.</span></p>
                    <p>Isporuku vršimo kuriskom službom BEX/AKS i drugi. Cena dostave je od 290,00 RSD po paketu do 5kg. Od
                        5 do 15kg cena dostave je 590 din Za baštenske setove dostava je 980 din (sto i stolice) kategorija
                        od 15 do 30kg.</p>
                    <p><strong>REKLAMACIJE:</strong></p>
                    <p><strong>Rok za reklamaciju</strong>&nbsp;od trenutka preuzimanja pošiljke je 24h (proizvod nije onaj koji ste poručili, drugi model, nije upakovano po dogovoru i sl).</p>
                    <p>- broj porudžbine</p>
                    <p>- ime i prezime na koga je glasila pošiljka</p>
                    <p>- razlog reklamacije&nbsp;</p>
                    <p>Rok za odgovor reklamacije je 8 radnih dana.&nbsp;</p>
                    <p>Preuzmite - <a target="_blank" href="{{asset('static/pdf/Reklamacioni-list-plastika-draskovic.pdf')}}">Reklamacioni list</a>&nbsp;</p>
                    <p><strong>Oštećenja / lom u transportu:</strong>&nbsp;Ukoliko je paket polomljen, oštećen, izgreban, u
                        roku od 24h treba da kontaktirate reklamacije brze pošte koja vam je dostavila paket!&nbsp;Stoga sve
                        kupce molimo da čim prime pošiljku da dobro prekontrolišu svoj paket. &nbsp;Reklamacije šaljete na
                        plastika.draskovic@gmail.com zajedno sa priloženim slikama:</p>
                    <p>Ukoliko je došlo do loma molimo sve kupce da sačuvaju sva pakovanja u kojima je bio paket.</p>
                    <p>Ukoliko kupac želi da zameni svoj proizvod za drugi (predomisli se), zakonski rok je 14 dana, stim da
                        kupac snosi troškove dostave. Proizvod ne sme biti korišćen i mora se vratiti u istom pakovanju kako
                        je stigao do vas, kako se ne bi polomio prilikom transporta.</p>
                    <p>Pri reklamaciji, kupac prvo treba da vrati proizvod na uvid u naše prostorije (Vojvode Stepe 148,
                        36000 Kraljevo). Ukoliko je sve u redu i reklamacija bude uvažena, mi tek onda šaljemo novi
                        proizvod.&nbsp;</p>
                    <p>Hvala vam na razumevanju.</p>
                    <p><br></p>
                    <p><strong>Status porudžbine:</strong></p>
                    <p>Objašnjenje statusa porudžbine:<br>1. Vaša porudžbina je data na spremanje Očekujte da vas uskoro
                        kontaktira naš operater oko dostave i provere identiteta kupca. Ukoliko se ne budete javljali na
                        telefon, udžbenik/knjige nećemo isporučivati. Ukoliko se niste javili, operate će vas opet pozvati.
                        Operater će nakon drugog telefonskog pokušaja da vam pošalje SMS/VIBER poruku na vaš ostavljeni broj
                        mobilnog telefona. Ukoliko niste u prilici da se javite, možete porudžbinu potvrditi i putem
                        SMS/VIBER poruke. Napomena: Postoji mogućnost da je artikal poručen istovremeno od strane drugog
                        kupca i da vašeg artikla ne bude više na stanju u datom trenutku. Takođe o ovoj promeni ćemo vas
                        izvestiti telefonski ili putem imejla. Rok za isporuku je najkasnije do 7 dana!)<br>2. Nema na
                        stanju! (Žao nam je! Trenutno artikla više nema na stanju. Ukoliko želite da vas obavestimo pri
                        njegovom dolasku, potvrdite nam na naš imejl sa vašim brojem porudžbine info@plastikaonline.rs). Ovu
                        poruku dobijate kada artikala iz nekog razloga više ne bude u datom trenutku.<br>3. Vaša porudžbina
                        je poslata! (Poštovani, očekujte artikal uskoro na vašoj adresi. Napomena: javite se kuriru brze
                        pošte kad vas bude zvao na telefon kako bi mogao da prema proceduri izvrši dostavu artikala)<br>4.Porudžbina
                        je otkazana! (Kupac je otkazao porudžbinu!) Uvek vam je omogućeno da otkažete vašu porudžbinu sve
                        dok ne dobijete poruku da je vaša porudžbina poslata.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
