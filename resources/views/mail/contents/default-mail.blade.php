@extends('mail.templates.default-template')

@section('main')
    <table>
        <tr>
            <td>
                <h4>Hi {{ $mailData['recipient_name'] }}</h4>
                <p class="callout">
                    {!! $mailData['message'] !!}
                </p>
            </td>
        </tr>
    </table>
@endsection
