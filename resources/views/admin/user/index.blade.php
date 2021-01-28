@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h4 data-type="header" id="header">PRIKAZ KORISNIKA </h4>
        <hr>
        <div class="row" id="category1">
            <div class="col-md-12 col-lg-12 col-xl-12 offset-md-0" id="rightColumn">
                <br>
                <table class="table table-striped table-bordered table-hover" id="customers_table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Korisničko ime</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Registrovan od</th>
                        <th>Broj porudžbina</th>
                        <th>Opcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td style="text-align: center">{{$user->name}}</td>
                            <td style="text-align: center">{{$user->email}}</td>
                            <td style="text-align: center">{{$user->phone}}</td>
                            <td style="text-align: center">{{\Carbon\Carbon::parse($user->date_created)->format('d/m/Y')}}</td>
                            <td style="text-align: center">{{count($user->orders()->get())}}</td>
                            <td style="text-align: center">
                                <a class="btn btn-info btn-sm" href="{{route('admin.users.details',$user->id)}}"><i class="fa fa-bars"></i></a>
                                <a class="btn btn-danger btn-sm" href="#" onclick=showWarningDialog("{{$user->id}}")><i class="fa fa-times"></i></a>
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
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function showWarningDialog(customerID) {
            bootbox.dialog({
                title: 'Upozorenje!',
                message: 'Da li želite da obrišete korisnika?',
                size: 'medium',
                onEscape: false,
                buttons: {
                    ok: {
                        label: "Potvrdi",
                        className: 'btn-success',
                        callback: function () {
                            window.location = '{{url('/admin/users/delete_user')}}' + '/' + customerID;
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
    </script>
@endpush
