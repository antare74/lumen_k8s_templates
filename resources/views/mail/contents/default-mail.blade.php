@extends('mail.templates.default-template')

@section('main')
    <table>
        <tr>
            <td>
                <h4>Hi {{ $mailData['recipient_name'] }}</h4>

                <div class="callout">
                    {!! $mailData['message'] !!}
                </div>
            </td>
        </tr>
    </table>
@endsection
