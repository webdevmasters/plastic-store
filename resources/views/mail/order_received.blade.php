<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plastika Drašković - obaveštenje o primljenoj porudžbini</title>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
</head>
<body style="margin: 0; padding: 0;">

<div>
    <table bgcolor="#edebeb" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td align="center" style="padding:50px 20px">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="700">
                    <tbody>
                    <tr>
                        <td colspan="2" height="35" style="line-height:0;padding:0;background:#fff;border:solid 1px #c5c3c3;border-bottom:0">
                            &nbsp;
                        </td>
                    </tr>
                    <tr style="width:550px">
                        <td align="left" height="45" style="padding:0;background:#fff;border-left:solid 1px #c5c3c3;padding-left:30px" width="210">
                            <h1 style="font-size:28px;margin:0">
                                <a style="color:#fff" target="_blank" href="{{url('/')}}">
                                    <img alt="Logo" border="0" class="CToWUd" src="{{ $message->embed(public_path().'/static/images/shop/logo.png') }}">
                                </a>
                            </h1>
                        </td>
                        <td align="right" style="color:#3b3b3b;font-size:12px;line-height:1.5;background:#fff;border-right:solid 1px #c5c3c3" valign="bottom"><p style="text-align:right;width:320px;height:20px;margin:0">&nbsp;</p></td>
                    </tr>
                    <tr>
                        <td align="left" colspan="2" style="color:#3b3b3b;font-family:'Roboto',sans-serif;font-size:12px;line-height:1.5;padding:35px;padding-top:10px;background:#fff;border:solid 1px #c5c3c3;border-top:0">
                            <p style="margin:0;margin-bottom:15px">Poštovani/a,</p>
                            <p style="margin:0">Vaša porudžbenica je uspešno kreirana!</p>
                            <p style="margin:0;margin-bottom:15px">Trenutni status Vaše porudžbenice je – <strong>na čekanju</strong>.</p>
                            <p style="margin:0">Broj Vaše porudžbenice je:<strong>{{$order->order_number}}</strong></p>
                            <p style="margin:0">Način placanja: <strong>Plaćanje gotovinski prilikom preuzimanja</strong></p>
                            <p style="margin:0;margin-bottom:15px">Datum naručivanja:<strong>{{\Carbon\Carbon::parse($order->date_created)->format('d/m/Y')}}</strong></p>
                            <p style="margin:0;margin-bottom:15px">
                                U zavisnosti od raspoložive količine određenog artikla i mogućnosti njegovog
                                nabavljanja, pod uslovom da artikla imamo u dovoljnoj količini, obavestićemo vas o
                                očekivanom roku isporuke proizvoda iz naše ponude, koji nije duži od 7 radnih dana, od
                                trenutka potvrde.
                            </p>

                            <p style="margin:0;margin-bottom:15px">Status Vaše porudžbenice možete proveriti kroz Vaš nalog na
                                <a style="text-decoration:underline" target="_blank" href="{{url('/')}}">sajtu</a>.
                            </p>

                            <div style="clear:both"></div>
                            <p style="margin:15px 0">Podaci o kupcu:</p>
                            <div style="width:130px;float:left">
                                <p style="margin:0;height:29px"></p>
                                <p style="font-size:12px;height:24px;line-height:24px;margin:0;border:1px solid #ccc;padding:0px 3px;box-sizing:border-box;font-weight:bold;background-color:rgba(0,0,0,0.1)">Ime i prezime:</p>
                                <p style="height:24px;line-height:24px;margin:0;border:1px solid #ccc;border-top:0;padding:0px 3px;box-sizing:border-box;font-weight:bold;background-color:rgba(0,0,0,0.1)">Broj telefona:</p>
                                <p style="height:24px;line-height:24px;margin:0;border:1px solid #ccc;border-top:0;padding:0px 3px;box-sizing:border-box;font-weight:bold;background-color:rgba(0,0,0,0.1)">Email:</p>
                                <p style="height:24px;line-height:24px;margin:0;border:1px solid #ccc;border-top:0;padding:0px 3px;box-sizing:border-box;font-weight:bold;background-color:rgba(0,0,0,0.1)">Adresa:</p>
                                <p style="height:24px;line-height:24px;margin:0;border:1px solid #ccc;border-top:0;padding:0px 3px;box-sizing:border-box;font-weight:bold;background-color:rgba(0,0,0,0.1)">Grad:</p>
                            </div>
                            <div style="width:250px;margin-bottom:15px;float:left">
                                <h4 style="font-size:12px;margin:0;background-color:#9acf6a;padding:5px 8px;border:1px solid #ccc;border-bottom:none;border-right:1px solid transparent;text-align:center">Podaci o kupcu</h4>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;border-top:1px solid #ccc;padding-left:8px">{{$order->first_name.' '.$order->last_name}}</p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px">{{$order->phone}}</p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px"><a target="_blank" href="'mailto:{{$order->email}}'">{{$order->email}}</a></p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px">{{$order->address}}</p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px">{{$order->zip_code.', '.$order->city}}</p>
                            </div>

                            <div style="width:250px;margin-bottom:15px;float:left">
                                <h4 style="font-size:12px;margin:0;background-color:#9acf6a;padding:5px 8px;border:1px solid #ccc;border-bottom:none;border-right:1px solid transparent;text-align:center">Podaci o isporuci</h4>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;border-top:1px solid #ccc;padding-left:8px">{{$order->first_name.' '.$order->last_name}}</p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px">{{$order->phone}}</p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px"><a target="_blank" href="'mailto:{{$order->email}}'">{{$order->email}}</a></p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px">{{$order->address}}</p>
                                <p style="box-sizing:border-box;margin:0;height:24px;line-height:24px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:8px">{{$order->zip_code.', '.$order->city}}</p>
                            </div>

                            <div style="clear:both"></div>

                            <p style="margin:15px 0">Podaci o porudžbenici:</p>
                            <table border="0" cellpadding="0" cellspacing="0" style="font-size:12px;margin-bottom:15px;border:solid 1px #ccc" width="630">
                                <tbody>
                                <tr style="background-color:#9acf6a">
                                    <th align="center" style="padding:5px;font-size:12px;font-weight:bold;border-right:solid 1px #ccc;width:120px;box-sizing:border-box">Šifra</th>
                                    <th align="center" style="padding:5px;font-size:12px;font-weight:bold;border-right:solid 1px #ccc;width:280px;box-sizing:border-box">Naziv</th>
                                    <th align="center" style="padding:5px;font-size:12px;font-weight:bold;border-right:solid 1px #ccc;width:280px;box-sizing:border-box">Veličina</th>
                                    <th align="center" style="padding:5px;font-size:12px;font-weight:bold;border-right:solid 1px #ccc;width:280px;box-sizing:border-box">Boja</th>
                                    <th align="center" style="padding:5px;font-size:12px;font-weight:bold;border-right:solid 1px #ccc;width:30px;box-sizing:border-box">Kom.</th>
                                    <th align="center" style="padding:5px;font-size:12px;font-weight:bold;width:100px;box-sizing:border-box">Cena</th>
                                </tr>
                                @foreach($order->items()->get() as $item)
                                    <tr>
                                        <td align="center" style="padding:5px;width:120px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top">{{$item->product->code}}</td>
                                        <td align="center" style="padding:5px;width:280px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top">{{$item->product->name}}</td>
                                        <td align="center" style="padding:5px;width:30px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top">{{$item->size}}</td>
                                        <td align="center" style="padding:5px;width:30px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top">{{$item->color_name}}</td>
                                        <td align="center" style="padding:5px;width:30px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top">{{$item->quantity}}</td>
                                        <td align="center" style="padding:5px;width:100px;box-sizing:border-box;border-bottom:1px solid #ccc" valign="top">{{$item->price.' RSD'}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td align="center" style="padding:5px;width:120px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top">&nbsp;</td>
                                    <td align="center" style="padding:5px;width:280px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top"></td>
                                    <td align="center" style="padding:5px;width:280px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top"></td>
                                    <td align="center" style="padding:5px;width:30px;box-sizing:border-box;border-right:1px solid #ccc;border-bottom:1px solid #ccc" valign="top"></td>
                                    <td align="center" style="padding:5px;width:100px;box-sizing:border-box;border-bottom:1px solid #ccc" valign="top"></td>
                                    <td align="center" style="padding:5px;width:100px;box-sizing:border-box;border-bottom:1px solid #ccc" valign="top"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding:5px;border-right:1px solid #ccc;border-top:0;text-align:right">Dostava:</td>
                                    <td align="center" colspan="2" style="padding:5px;border-top:0">{{$order->total>5000?'Besplatna isporuka': '/'}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding:5px;border-right:1px solid #ccc;text-align:right;border-top:1px solid #ccc">
                                        <strong>Ukupna vrednost porudžbenice:</strong></td>
                                    <td align="center" colspan="2" style="padding:5px;border-top:1px solid #ccc"><strong>{{$order->total.' RSD'}}</strong></td>
                                </tr>
                                </tbody>
                            </table>

                            <p style="margin:0;margin-bottom:15px">
                                Ukoliko je naručena roba dostupna i spremna za isporuku, dobićete e-mail sa potvrdom da je roba poslata.
                            </p>

                            <p style="margin:0;margin-bottom:15px">
                                U svakom slučaju, ukoliko roba nije dostupna u celosti kontaktiraćemo Vas u najkraćem roku, a ne dužem od tri dana radi korekcije porudžbine:
                            </p>

                            <table border="0" cellpadding="0" cellspacing="0" style="font-size:12px;border-collapse:collapse;margin-bottom:15px" width="630">
                                <tbody>
                                <tr style="background-color:#9acf6a;font-weight:bold">
                                    <td colspan="4" style="padding:5px;border:1px solid #ccc;border-bottom:0">Podaci o prodavcu</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Adresa:</td>
                                    <td style="width:185px;padding:5px;border:1px solid #ccc">Vojvode Stepe 148</td>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Mesto:</td>
                                    <td style="padding:5px;border:1px solid #ccc">36000, Kraljevo</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Telefon:</td>
                                    <td style="width:185px;padding:5px;border:1px solid #ccc">062 464 406</td>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Email:</td>
                                    <td style="padding:5px;border:1px solid #ccc"><a href="mailto:plastika.draskovic@gmail.com" target="_blank"><span class="il">plastika.draškovic@gmail.com</span></a></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Web adresa:</td>
                                    <td style="width:185px;padding:5px;border:1px solid #ccc"><a target="_blank" href="{{url('/')}}">www.<span class="il">plastikadraskovic</span>.rs</a></td>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">PIB:</td>
                                    <td style="padding:5px;border:1px solid #ccc">109390298</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Broj računa:</td>
                                    <td style="width:185px;padding:5px;border:1px solid #ccc">205-229647-41</td>
                                    <td style="font-weight:bold;padding:5px;border:1px solid #ccc">Matični broj:</td>
                                    <td style="padding:5px;border:1px solid #ccc">64139096</td>
                                </tr>
                                </tbody>
                            </table>

                            <p style="margin-top:15px">Hvala na ukazanom poverenju.<br></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="yj6qo"></div>
    <div class="adL">
    </div>
</div>

</body>
</html>
