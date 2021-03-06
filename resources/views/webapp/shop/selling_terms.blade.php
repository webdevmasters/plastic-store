@extends('webapp.layouts.main')
@section('title','Uslovi kupovine')
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
                                <li>{{__('messages.selling.terms')}}</li>
                            </ul>
                        </nav>
                    </div>
                    <!--=======  End of breadcrumb container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!-- About Section Start -->
    <div class="selling_terms_section mb-50">
        <div class="container">

            <div class="row row-30">
                <div class="col-sm-12" id="content">
                    <h1>{{__('messages.selling.terms')}}</h1>
                    <p><br></p>
                    <p><span>Na osnovu odredbe čl.13. i čl.27. Zakona o zaštiti potrošača (Sl.glasnikRS 62/2014)
                    firma&nbsp;Plastika Drašković iz Kraljeva, svoje cenjene potrošače koji
                    robu kupuju putem internet sajta www.plastikadrašković.rs</span></p>
                    <p><br></p>
                    <p><span><strong>OBAVEŠTAVA</strong></span></p>
                    <p><br></p>
                    <ul>
                        <li>da se prodaja robe putem internet sajta <strong>www.plastikadrašković.rs</strong>
                            obavlja u okviru registrovane delatnosti preduzeća Plastika Drašković iz Kraljeva, Vojvode Stepe
                            148, PIB 109390298, TEL: +381 62 464 406 i email
                            adrese za rekalmacije plastika.draskovic@gmail.com
                        </li>
                        <li>da se osnovna obeležja robe mogu pronaći na sajtu&nbsp;<strong style="font-size: 13px;">www.plastikadrašković.rs</strong>
                        </li>
                        <li>da se prema Zakonu o zaštiti potrošača (Službeni glasnik RS, 62/2014) kupovina preko naše online
                            prodavnice www.plastikadrašković.rs , smatra se prodajom na daljinu.
                        </li>
                        <li>da se saobraznost robe ugovorom isključivo utvrđuje prema svojstvima i nameni robe&nbsp;</li>
                        <li>da je prodajna cena istaknuta uz svaki artikal</li>
                        <li>da je usluga isporuke robe 290 din po porudžbini za manje pakete do 5 kg, od 5 do 15kg cena
                            dostave je 590 din i 980 din za baštenske setove, stolice i stolove (sto i stolice zajedno)
                            kategorija od 15 do 30kg.
                        </li>
                        <li>da kupljenu robu isporučujemo u roku od najviše 7 radnih dana kurirskom službom AKS ili BEX
                            (više informacija o preuzimanju pošiljke pogledajte ispod)
                        </li>
                        <li>da se mogućnost kupovine robe uz posebne cenovne pogodnosti odvijaju u skladu sa uslovima koji
                            su objavljeni na našem sajtu www.plastikadrašković.rs
                        </li>
                        <li>da se prilikom kupovine na našem sajtu maksimalno vodi računa o privatnosti podataka (više
                            informacija o privatnosti podataka pogledajte ispod)
                        </li>
                        <li>da potrošač robu može da plati pozećem (gotovinom na licu mesta kad kurir donese paket).</li>
                        <li>da potrošač prilikom kreiranja porudžbenice pritiskom na taster POTVRDI KUPOVINU preuzima
                            obavezu&nbsp;plaćanja naručene robe
                        </li>
                        <li>da u slučaju prijema robe ukoliko potrošač ustanovi da pristigli artikli nisu odgovarajući ili
                            očekivani, potrošač ima pravo da artikal zameni u roku od 14 dana za&nbsp;drugi artikal (više
                            informacija o proceduri zamene artikla pogledajte ispod)
                        </li>
                    </ul>
                    <p><br></p>
                    <p>Plastika Drašković zadržava pravo promene cena ukoliko isti artikli poskupe ili pojeftine od strane
                        proizvođača. Takođe zadržavamo pravo promene cena ako je došlo do neke grube greške npr 100 rsd
                        umesto 1.000 rsd i slično.</p>
                    <p><b>Dokumenta</b> (kliknite na njih) : </p>
                    <p><a target="_blank" href="{{asset('static/pdf/Reklamacioni-list-plastika-draskovic.pdf')}}">Reklamacioni list, </a></p>
                    <p><a target="_blank" href="{{asset('static/pdf/Predugovorno-obaveštenje-Plastika-Draskovic.pdf')}}">Predugovorno obaveštenje, </a></p>
                    <p><a target="_blank" href="{{asset('static/pdf/Izjava-o-odustajanju-od-ugovora-plastika draskovic.pdf')}}">Izjava o odustajanju od ugovora,</a><br><br><strong>Reklamacije:</strong></p>
                    <p>Mogućnost reklamacije je jedino moguća 24<strong>&nbsp;časa</strong>&nbsp;nakon preuzmanja paketa!</p>
                    <p>Molimo sve kupce da detaljno pregledaju
                        svoje poručene artikle čim stignu, jer kasnije reklamacije iza
                        24&nbsp;časa&nbsp;nećemo moći da uvažimo. Stoga vas molimo da nas u&nbsp;slučaju
                        reklamacije odmah kontaktirate putem telefona ili napišete mejl na
                        plastika.draskovic@gmail.com&nbsp;- naslov: Reklamacija po broju vaše porudžbine.</p>
                    <p>Ako ste dobili paket i po otvaranju zaključili da je proizvod
                        vidljivo oštećen, Molimo Vas da odmah, a najkasnije 24 h od trenutka
                        prijema pozovete kurirsku službu, koja Vam je isporučila paket i
                        obavestite ih da je paket oštećen. Kurir će uraditi zapisnik o oštećenju
                        i preuzeti oštećeni paket. Po prijemu paketa Plastika Drašković će Vam
                        poslati drugi proizvod. AKS Reklamacije kontakt: 015/600 617 ili informacije o paketu 015/600 600;&nbsp;
                        BEX kontakt: 011 6 555 000 ili besplatan telefon
                        0800 3 555 000 ili&nbsp;<a href="http://www.bex.rs/kontaktpodaci.php">http://www.bex.rs/kontaktpodaci.php</a>.&nbsp;&nbsp;Potrošač
                        reklamaciju može izvršiti usmeno telefonom, pisanim putem, elektronskim
                        putem isključivo uz dostavu računa o kupljenj robi, ili drugog dokaza o
                        kupovini (kopija računa) Trgovac je dužan da potrošaču izda
                        reklamacioni list kojim će potvrditi prijem reklamacije, Trgovac je
                        dužan da bez odlaganja, a najkasnije u roku od 8 dana od dana prijema
                        reklamacije pisanim putem ili elektronski, odgovori potrošaču na
                        izjavljenu reklamaciju pisanim ili elektronskim putem. Odgovor trgovca
                        na reklamaciju potrošača mora da sadrži odluku da li prihvata
                        reklamaciju, izjašnjenje o zahtevu potrošača i konkretan predlog i rok
                        za rešavanje reklamacije koji ne može biti duži od 15 dana (dobijanje
                        odgovora na koji način će reklamacija biti rešena). Ukoliko trgovac iz
                        objektivnih razloga nije u mogućnosti da udovolji zahtevu potrošača u
                        navedenom roku, dužan je da o produženju roka za rešavanje reklamacije
                        obavesti potrošača i navede rok u kome će je rešiti, kao i da dobije
                        njegovu saglasnost, što je u obavezi da evidentira u evidenciju
                        primljenih reklamacija. Produžavanje roka za rešavanje reklamacija
                        moguće je samo jednom. Potrošač koji je obavestio trgovca o
                        nesaobraznosti robe, ima pravo da zahteva od trgovca da otkloni
                        nesaobraznost bez naknade, opravkom ili zamenom, odnosno da zahteva
                        odgovarajuće umanjenje cene ili da raskine ugovor tj.da traži povraćaj
                        novca. 30 dana rok u kome je prodavac dužan da vam isporuči robu
                        (ukoliko nije drugačije ugovoreno).</p>
                    <p><strong>Preuzimanje pošiljke</strong></p>
                    <p>Kuriri AKS-a i Bex-a (ekserna firma koja vrši uslugu dostave paketa za
                        Plastika Online) pošiljke donosi uglavnom na adresu u terminu od 08 do
                        16h svaki radni dan. Molimo vas da u tom periodu obezbedite da
                        na adresi bude osoba koja će moći da preuzme paket . Prilikom
                        preuzimanja paketa neophodno je da ga prethodno vizuelno pregledate da
                        slučajno ne postoje vidljiva oštećenja paketa. Ukoliko primetite da je
                        paket / kutija oštećena i da bi artikal takođe mogao biti oštećen, takav
                        paket odbijte da primite i platite i odmah o istom nas obavestite putem
                        email plastika.draskovic@gmail.com ili putem telefona 062 464 406. Ukoliko je
                        paket u ispravnom stanju, preuzmite ga i potpišite kuriru priznanicu
                        (izvršite plaćanje ukoliko roba nije prethodno plaćena). Kurir pokušava
                        svaki paket dva puta da dostavi . Praksa je ako vas kurir ne nađe na
                        adresi da vas pozove na vaš kontakt telefon koji ste nam prethodno
                        ostavili. Ukoliko se ne javite na telefon ili niste na adresi za
                        preuzimanje pošiljke, kurir paket vraća nama nazad.</p>
                    <p>Postoji mogućnost da se paket preuzme i direktno iz regionalnih centara AKS-a. Gde se regionalni
                        centri AKS-a nalaze kao i njihovi kontakt telefoni, možete pogledati detaljno na linku: <a
                            href="http://www.aks-sabac.com/regionalni-centri/">http://www.aks-sabac.com/regionalni-centri/</a>
                    </p>
                    <p><strong>Napomena:
                            Ukoliko primite oštećen paket, a potpisali ste da ste paket primili u
                            ispravnom stanju, kasnije reklamacije se ne mogu nažalost zakonski
                            uvažiti.</strong></p>
                    <p><strong>Politika privatnosti</strong></p>
                    <p>Mi brinemo o vašim podacima. Kako bi vam isporučli robu neophodno je
                        da nam ostavite vaše ime i prezime, adresu, kontakt telefon i email
                        adresu. Prilikom završene kupovine dobijate na vaš email obaveštenje o
                        izršenoj kupovini. Plastika Drašković će vaše podatke koristiti samo u
                        svrhu administriranja vaše porudžbenice, vaše podatke nećemo
                        zloupotrebljavati time što ćemo ih prosleđivati trećim licima (osim
                        kurirskoj službi za dostavu paketa), trgovati sa njima, javno
                        objavljivati. Podatke možemo samo proslediti državnim institucijama koje
                        Zakonom imaju prava u uvid istih.</p>
                    <p>Plastika Drašković sve prikupljene podatke od kupca (adresa dostave, ime i
                        prezime kupca, broj telefona) prosleđuje kurirskoj službi sa kojom ima
                        ugovor o poslovno-tehničkoj saradnji (kurirska služba BEX i AKS), kako
                        bi vam paket mogao biti dostavljen na željenu lokaciju. Email adrese
                        kupaca ne prosleđujemo kurirskim službama.</p>
                    <p>Kupac pristankom o uslovima kupovine daje dozvolu da se njegovi
                        podaci&nbsp; (ime i prezime kupca, adresa za dostavu, broj telefona) mogu
                        proslediti kurirskoj službi na dalju obradu.</p>
                    <p>Plastika Drašković se obavezuje da sa podacima kupaca neće vršiti (osim prosleđivanja kurirskoj
                        službi sa
                        kojom ima ugovor):
                        <span>prepisivanje,umnožavanje, kopiranje, prenošenje na druge nepoznate lokacije,&nbsp;
                            razdvajanje, ukrštanje, objedinjavanje, upodobljavanje, menjanje,
                            korišćenje u razne druge svrhe osim za dostavu paketa, stavljanje na
                            uvid trećim licima, otkrivanje, javno objavljivanje, širenje, čuvanje na
                            nebezbednim lokacijama, prilagođavanje drugim svrhama koje nisu dostava
                            paketa.</span></p>
                    <p><span style="color: rgb(51, 51, 51); font-size: 12.6px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Plastika Drašković se takođe obavezuje da će upotrebiti ili obraditi podatke kupca u sledećim slučajevima:</span>
                    </p>
                    <p class="normal" style="box-sizing: border-box; margin: 0px 0px 10px; font-size: 12.6px; font-weight: 400; font-style: normal; font-variant: normal; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">1) da bi se ostvarili ili
                        zaštitili životno važni interesi lica ili drugog lica, a posebno život i fizički integritet;</p>
                    <p class="normal" style="box-sizing: border-box; margin: 0px 0px 10px; font-size: 12.6px; font-weight: 400; font-style: normal; font-variant: normal; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
                        2) u svrhu izvršenja obaveza
                        određenih zakonom, aktom donetim u skladu sa zakonom ili ugovorom zaključenim između lica i
                        rukovaoca, kao i radi pripreme zaključenja ugovora;</p>
                    <p class="normal" style="box-sizing: border-box; margin: 0px 0px 10px; font-size: 12.6px; font-weight: 400; font-style: normal; font-variant: normal; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">Kupac ima pravo i na
                        opoziv pristanka obrade podataka, nakon što je svojevoljno ostavio tražene podatke na našem sajtu.</p>
                    <p class="normal" style="box-sizing: border-box; margin: 0px 0px 10px; font-size: 12.6px; font-weight: 400; font-style: normal; font-variant: normal; color: rgb(51, 51, 51); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
                        Pristanak se može opozvati.
                        Punovažan opoziv lice može dati pismeno ili usmeno na
                        zapisnik. U slučaju opoziva, lice koje je dalo pristanak dužno je da
                        rukovaocu naknadi opravdane troškove i štetu, u skladu sa propisima koji
                        uređuju odgovornost za štetu. Obrada podataka je nedozvoljena posle
                        opoziva pristanka.</p>
                    <p><strong>Pravo na odustajanje (ili zamene artikla)</strong></p>
                    <p><span>Zakon
                         za slučaj prodaje na daljinu ustanovljava pravo kupca, koji se smatra
                        potrošačem (fizičko lice koje proizvod kupuje radi namirenja svojih
                        individualnih potreba, a ne radi obavljanja profesionalne delatnosti),
                        da odustane od ugovora u roku od 14 dana od dana kada mu je proizvod
                        predat. Prilikom odustanka kupac može, ali ne mora da navede razloge
                        zbog kojih odustaje.
                        </span></p>
                    <ul>
                        <li><span>Obrazac/Izjava o odustanku od ugovora proizvodi pravno dejstvo od dana kada je poslata trgovcu.</span></li>
                        <li style="margin-top: 0rem; margin-bottom: 2.1rem;">U slučaju odustaka od ugovora, potrošač ima
                            pravo na povraćaj novca ili na zamenu za drugi proizvod. Cena se kupcu vraća po prijemu
                            proizvoda, i nakon što se utvrdi da je proizvod neoštećen,&nbsp;ispravan i ne korišćen.
                        </li>
                        <li style="margin-top: 0rem; margin-bottom: 2.1rem;">Kupac je dužan da proizvod vrati bez odlaganja,
                            a najkasnije u roku od 14 dana od dana kada je poslao obrazac za odustanak. Po isteku roka od 14
                            dana od dana kada je poslao odustanak, proizvod se više ne moze vratiti.
                        </li>
                        <li style="margin-top: 0rem; margin-bottom: 2.1rem;">Prilikom povraćaja robe obavezno je vratiti u
                            ispravnom i nekorišćenom stanju i originalno neoštećenom pakavanju, pri čemu se mora priložiti i
                            originalni račun ili slip od kurirske službe po kojoj ste platili
                        </li>
                        <li style="margin-top: 0rem; margin-bottom: 2.1rem;">
                            Po
                            prijemu proizvoda, utvrdiće se da li je proizvod ispravan i neoštećen.
                            Kupac odgovara za neispravnost ili oštećenje proizvoda koji su rezultat
                            neadekvatnog rukovanja proizvodom, tj. kupac je isključivo odgovoran za
                            umanjenu vrednost proizvoda koja nastane kao posledica rukovanja robom
                            na način koji nije adekvatan, odnosno prevazilazi ono što je neophodno
                            da bi se ustanovili njegova priroda, karakteristike i funkcionalnost.
                            Ukoliko se utvrdi da je nastupila neispravnost ili oštećenje proizvoda
                            krivicom kupca, odbiće se vraćanje cene i proizvod će mu biti vraćen na
                            njegov trošak.
                        </li>
                        <li style="margin-top: 0rem; margin-bottom: 2.1rem;">
                            Trgovac
                            je dužan da potrošaču bez odlaganja vrati iznos koji je potrošač platio
                            po osnovu ugovora ukoliko je proizvod stigao neoštećen, a najkasnije u
                            roku od 14 dana od dana prijema izjave o odustanku, a nakon prijema
                            proizvoda. Troškove vraćanja robe i novca snosi kupac, sem u slučajevima
                            kada kupac dobije neispravan ili pogrešan artikal.
                        </li>
                    </ul>
                    <p style="margin-top: 0rem; margin-bottom: 2.1rem;"><strong>Pravo na zamenu</strong></p>
                    <p style="margin-top: 0rem; margin-bottom: 2.1rem;"><span>- broj računa - šifru artikla i naziv koji se menja - šifru artikla i naziv proizvoda za koji se menja.</span></p>
                    <p>Rok za zamenu je 14 dana od dana pristizanja proizvoda na adresu
                        kupca. Troškove dostave, pakovanja snosi kupac. Procedura zamene se može
                        izvršiti putem mejla plastika.draskovic@gmail.com. Rok za isporuku drugog
                        artikla je 14 dana od dana prijema paketa koji se vratio trgovcu /
                        prodavcu.</p>
                    <p><br></p>
                    <p><strong>Primer:</strong></p>
                    <p><br></p>
                    <p><strong>&nbsp;Ugovor o prodaji na daljinu</strong></p>
                    <p><br></p>
                    <p>Zaključen dana __________ godine u _______________ između:</p>
                    <p><br></p>
                    <ol>
                        <li>Firme Plasstika Drašković, koja zastupa brend “Plastika Drašković” adresa
                            Vojvode Stepe 148, 36000 Kraljevo, PIB 109390298, matični broj&nbsp;64139096
                            kao Prodavac, i
                        </li>
                        <li>_____________________________________,kao kupca na sledeći način</li>
                    </ol>
                    <p align="center"><strong>Član 1.</strong></p>
                    <p>&nbsp;Ovim ugovorom Prodavac prodaje, a Kupac kupuje _______________
                        (dalje: roba, broj porudžbine). Prodavac je obavezan da Kupcu preda robu
                        tako da Kupac postane njen vlasnik, dok se Kupac obavezuje da za to
                        isplati cenu i preuzme robu. Ovaj ugovor zaključen je kao ugovor o
                        prodaji na daljinu u smislu člana 27. Zakona o zaštiti potrošača („Sl.
                        glasnik RS“ br. 73/2010) jer je zaključen posredstvom interneta kao
                        sredstva komunikacija.</p>
                    <p align="center"><strong>Član 2.</strong></p>
                    <p>Kupac zaključenjem ovog ugovora potvrđuje da ga je Prodavac pre
                        njegovog zaključenja obavestio o: 1. osnovnim obeležjima robe; 2. adresi
                        i drugim podacima koji su od značaja za utvrđivanje identiteta
                        Prodavca; 3. prodajnoj ceni kao i o svim dodatnim poštanskim troškovima i
                        troškovima transporta i isporuke i mogućnosti da se ti troškovi mogu
                        staviti potrošaču na teret; 4. načinu plaćanja, načinu i roku isporuke,
                        načinu izvršenja drugih ugovornih obaveza, kao i načinu na koji se
                        postupa po pritužbama potrošača; 5. pravu potrošača na jednostrani
                        raskid ugovora pod uslovima koji su propisani zakonom; 6. vremenu na
                        koje se ovakvi ugovori zaključuju; 7. obavezi Kupca da pruži određeni
                        oblik obezbeđenja na zahtev Prodavca i o uslovima pod kojima ta obaveza
                        postoji; 8. uslovima za jednostrani raskid ugovora; 9. adresi na kojoj
                        Prodavac posluje i adresi na koju može da uputi pritužbe; &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <p align="center"><strong>Član 3.</strong></p>
                    <p>Prodavac je dužan da Kupcu isporuči robu u roku od 7 dana od dana
                        zaključenja ovog ugovora s tim da rok za isporuku&nbsp;ne može biti duži od
                        30 dana. Isporuka robe izvršiće se na sledeći način: kurirskom službom AKS ili
                        BEX (Balkan Express), a troškove isporuke snosi kupac. Isporuka će biti
                        izvršena Kupcu ili licu koje je on ovlastio ili prevozniku&nbsp;a po nalogu
                        Kupca.</p>
                    <p align="center"><strong>Član 4.</strong></p>
                    <p>Kupac je dužan da prilikom prijema robe pregleda robu i proveri njenu
                        saobraznost sa naručenom, te da ukoliko ima primedbi odmah istakne
                        postojanje nedostataka koji se mogu uočiti pregledom. Momenat prelaska
                        rizika sa Prodavca na Kupca je momenat predaje robe Kupcu ili licu koje
                        je Kupac ovlastio za prijem robe u njegovo ime. U slučaju postojanja
                        nedostataka za koje Prodavac odgovara, na prava Kupca i postupak
                        ostvarivanja prava primenjuju se odredbe Zakona, osim ako je ugovoreno
                        drugačije.</p>
                    <p align="center"><strong>Član 5.</strong></p>
                    <p>Kupac se obavezuje da za robu koje je predmet ovog ugovora isplati Prodavcu iznos od __________ __________dinara.</p>
                    <p align="center"><strong>Član 6.</strong></p>
                    <p>Kupac je odgovoran za štetu koja nastane propuštanjem da preuzme robu
                        koju mu je poslao Prodavac u skladu sa ovim ugovorom. Pod štetom se
                        podrazumeva oštećenje na robi, kao i troškovi koje Prodavac ima zbog
                        propuštanja Kupca da preuzme robu, kao što su: troškovi čuvanja,
                        prepakivanja, vraćanja robe i slično.</p>
                    <p align="center"><strong>Član 7.</strong></p>
                    <p>U slučaju spora, ugovarači su saglasni da se pokuša njegovo rešavanje vansudskim sredstvima u skladu sa Zakonom.</p>
                    <p align="center"><strong>Član 8.</strong></p>
                    <p>Ugovor je zaključen posredstvom sredstava komunikacija i to: emailom u
                        jednom originalnom primerku na osnovu koga je napravljeno 4 kopije, od
                        kojih jedna za Kupca, a ostale za Prodavca.</p>
                    <p><br></p>
                    <p>Prodavac&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kupac</p>
                    <p><br></p>
                    <p>__________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________</p>
                    <p><br></p>
                    <p><span><br></span></p>
                    <div class="page-title" style="">
                        <h2 style="margin-top: 20px; margin-bottom: 10px; orphans: 3; widows: 3; break-after: avoid;">
                            <div class="static-contain" style="color: rgb(51, 51, 51); font-family: Abel, sans-serif; font-size: 13px; orphans: 2; widows: 2;"><p style="margin-bottom: 10px; orphans: 3; widows: 3;"></p></div>
                        </h2>
                    </div>
                    <p></p></div>
            </div>
        </div>
    </div>
@endsection
