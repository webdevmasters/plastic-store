@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h4 data-type="header" id="header">PRIKAZ PORUKA </h4>
        <hr>
        <div class="row" id="category1">
            <div class="col-md-12 col-lg-12 col-xl-12 offset-md-0" id="rightColumn">
                <table class="table table-striped table-bordered table-hover" id="messages_table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Ime</th>
                        <th>Naslov</th>
                        <th>Vreme</th>
                        <th>Opcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td data-id="{{$message->id}}">{{$message->id}}</td>
                            <td style="text-align: center">{{$message->email}}</td>
                            <td style="text-align: center">{{$message->name}}</td>
                            <td style="text-align: center">{{$message->subject}}</td>
                            <td hidden data-text="{{$message->message}}">{{$message->message}}</td>
                            <td style="text-align: center">{{\Carbon\Carbon::parse($message->date_created)->format('d/m/Y')}}</td>
                            <td style="text-align: center">
                                @if(!$message->answered)
                                    <a class="btn btn-light btn-sm" href="#"
                                       onclick=showReplyDialog(this.getAttribute('data-id'),this.getAttribute('data-name'))
                                       style="background-color:white;"
                                       data-id="{{$message->id}}"
                                       data-name="{{$message->name}}"><i class="fa fa-reply" style="color: #00CC00"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info btn-sm" href="#"
                                   onclick=showInfoDialog(this.getAttribute('data-name'),this.getAttribute('data-text'))
                                   data-name="{{$message->name}}"
                                   data-text="{{$message->message}}"><i class="fa fa-bars"></i></a>
                                <a class="btn btn-danger btn-sm" href="#" onclick=showWarningDialog("{{$message->id}}")><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="gutter">
                            <div class="line number1 index0 alt2" style="display: none;">1</div>
                        </td>
                        <td class="code">
                            <div class="container" style="display: none;">
                                <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <label for="question"></label><textarea id="question"></textarea>
                    </div>
                    <div class="modal-body">
                        <label for="answer"></label><textarea id="answer"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-default" name="update" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loader-wrap d-none">
        <div class="loader">
            <div class="holder">
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
                <span class="loader-item"></span>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">

        function showWarningDialog(msg_id) {
            bootbox.dialog({
                title: 'Upozorenje!',
                message: 'Da li želite da obrišete poruku?',
                size: 'medium',
                onEscape: false,
                buttons: {
                    ok: {
                        label: "Potvrdi",
                        className: 'btn-success',
                        callback: function () {
                            window.location = '{{url('/admin/messages/delete_message')}}'+'/' + msg_id;
                        }
                    },
                    cancel: {
                        label: "Odustani",
                        className: 'btn-danger',
                        callback: function () {
                        }
                    }
                }
            });
        }

        function showInfoDialog(sender, message) {
            bootbox.alert({
                size: "medium",
                title: "Pitanje postavio " + sender,
                message: message,
                callback: function () {
                }
            })
        }

        function showReplyDialog(msg_id, sender) {
            $('.loader').attr('data-after', 'Slanje vašeg odgovora u toku, molimo sačekajte...');

            var locale = {
                OK: 'Odgovori',
                CONFIRM: 'Odgovori',
                CANCEL: 'Odustani'
            };

            bootbox.addLocale('custom', locale);

            bootbox.prompt({
                title: "Odgovor korisniku " + sender,
                inputType: 'textarea',
                locale: 'custom',
                callback: function (result) {
                    $('.loader-wrap').removeClass('d-none');
                    if (result!=="") {
                        $.ajax({
                            type: "GET",
                            url: '{{url('/admin/messages/answer_message')}}' + '/' + msg_id + '/' + result,
                            success: function () {
                                $('.loader-wrap').addClass('d-none');
                                window.location = '{{route('admin.messages.index')}}';
                            }
                        });
                    }
                }
            });
        }
    </script>
@endpush

